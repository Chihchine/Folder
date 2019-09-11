<?php
Class Annuaire {
  public static function displayUsers() {
    $request = Main::Database()->prepare('SELECT NOM, PRENOM, ECOLE, PROMOTION FROM UTILISATEURS');
    $request->execute();
    return $request;
  }
}

 ?>
