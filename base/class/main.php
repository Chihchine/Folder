<?php
/* Classe principale
 * Auteur : COCHE Thomas <contact@thomas-coche.fr>
 * Version : 0.0.5 (13/05/2019) -- PHP 7.2
 * Description Complète :
 *  - Inclusion de toutes les autres classes et des librairies
 *  - Initialisation des sessions et de la base de donnée
 */
 session_start();

 require_once(__DIR__ . "/settings.php");
 Class Main {

   public static function Database() {
     return $Database = new PDO(
       "mysql:host=".Settings::dbHost.
       ";dbname=".Settings::dbName,
       Settings::dbUser,
       Settings::dbPassword,
       array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
     );
   }

 }

require(__DIR__ . "/image.php");
require(__DIR__ . "/connexion.php");
require(__DIR__ . "/inscription.php");
require(__DIR__ . "/oublimdp.php");
require(__DIR__ . "/groupe.php");
require(__DIR__ . "/annuaire.php");
require(__DIR__ . "/utilisateurs.php");
?>
