<?php

Class Groupe {

  public static function Create($name, $desc, $imageExtension, $imageTmp_name, $imageFile_error) {
    if !empty($name) && !empty($desc) && !empty($imageExtension) && !empty($imageTmp_name) && !empty($imageFile_error) {
      $imageID = Image::Upload($imageExtension, $imageTmp_name, $imageFile_error);

      $request = Main::Database()->prepare("INSERT GROUPES(NOM, DESCRIPTION, ID_PHOTO_PROFIL, DATE_CREATION) VALUES(:nom, :description, :idPhoto, GETDATE())")
      $request->execute(["nom" => $name, "description" => $desc, "idPhoto" => $imageID])
    }
  }

}

?>
