<?php
/* Classe image
 * Auteur : COCHE Thomas <contact@thomas-coche.fr>
 * Version : 0.0.1 (22/06/2019) -- PHP 7.3
 * Description Complète :
 *  - Upload une immage et l'insérer en base de donnée
 *  - Supprimer une image et sa correspondance en bdd

 */

 Class Image {

   public static function Upload($extension, $tmp_name, $file_error) {
     // Constantes
     $TARGET = __DIR__ . '/../..'.Settings::imageFolder;    // Repertoire cible

   // Tableaux de donnees
   $tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
   $infosImg = array();

   // Variables
   $message = '';
   $nomImage = '';

       // On verifie l'extension du fichier
       if(in_array(strtolower($extension),$tabExt))
       {
         // On recupere les dimensions du fichier
         $infosImg = getimagesize($tmp_name);

         // On verifie le type de l'image
         if($infosImg[2] >= 1 && $infosImg[2] <= 14)
         {
           // On verifie les dimensions et taille de l'image
           if(($infosImg[0] <= intval(Settings::imageMaxWidth)) && ($infosImg[1] <= intval(Settings::imageMaxHeight)) && (filesize($tmp_name) <= intval(Settings::imageMaxSize)))
           {
             // Parcours du tableau d'erreurs
             if(isset($file_error)
             && UPLOAD_ERR_OK === $file_error)
             {

               $uniqueId = md5(uniqid());
               $request = Main::Database()->prepare('INSERT INTO IMAGES(LIEN) VALUES(:hash)');
               $request->execute(['hash' => $uniqueId]);

               $request = Main::Database()->prepare('SELECT ID FROM IMAGES WHERE LIEN=:url');
               $request->execute(['url' => $uniqueId]);
               $result = $request->fetch();

               $id = $result['ID'];

               $request = Main::Database()->prepare('UPDATE IMAGES SET LIEN=:url WHERE ID=:id');
               $request->execute(['url' => Settings::imageFolder.$id.".".$extension, 'id' => $id]);

               // On renomme le fichier
               $nomImage = $id .'.'. $extension;

               // Si c'est OK, on teste l'upload
               if(move_uploaded_file($tmp_name, $TARGET.$nomImage))
               {
                 return $id;
               }
               else
               {
                 return 'Problème lors de l\'upload !';
               }
             }
             else
             {
               return 'Une erreur interne a empêché l\'uplaod de l\'image';
             }
           }
           else
           {
             return 'Erreur dans les dimensions de l\'image !';
           }
         }
         else
         {
           return 'Le fichier à uploader n\'est pas une image !';
         }
       }
       else
       {
         return 'L\'extension du fichier est incorrecte !';
       }
     }

     public static function List() {
       $request = Main::Database()->prepare('SELECT * FROM IMAGES');
       $request->execute();
       return $request;
     }

     public static function Show($id) {
       $request = Main::Database()->prepare('SELECT * FROM IMAGES WHERE ID = :id');
       $request->execute(['id' => $id]);
       $image = $request->fetch();

       return $image;
     }
   }
?>
