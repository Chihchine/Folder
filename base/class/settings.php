<?php
/* Classe de sauvegarde des paramètres du site
 * Auteur : COCHE Thomas <contact@thomas-coche.fr>
 * Version : 0.0.1 (22/06/2019) -- PHP 7.3
 * Description Complète :
 *  - Informations de connexion à la base de donnée
 *  - stockage du mot de passe administrateur
 *  - URL d'accès au site et fichier ou sont téléversés les images
 *  - Limites de taille et de dimmension des images téléversés.
 */
 class Settings {
    //Informations de connexion base de donnée
    public const dbHost = "localhost";
    public const dbName = "djtnxoby_mycampus";
    public const dbUser = "djtnxoby_mycamp";
    public const dbPassword = "Jh7^4q2e";

    //Informations globales
    public const sitePathRoot = "https://mycampus.epsi.tk/.git/"; //Racine web du site internet
    public const imageFolder = "/images/uploads/"; //Dossier d'upload des images

    //Paramètre d'upload d'image
    public const imageMaxSize = "5242880";    // Taille max en octets du fichier
    public const imageMaxWidth = "999999";    // Largeur max de l'image en pixels
    public const imageMaxHeight = "999999";    // Hauteur max de l'image en pixels
  }
?>
