<?php
Class Annuaire {
  public static function displayUsers() {
    $request = Main::Database()->prepare('SELECT NOM, PRENOM, ECOLE, PROMOTION FROM UTILISATEURS');
    $result = $request->execute();
    return $result;
  }
}

 ?>
