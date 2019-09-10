<?php

Class Connexion {

  public static function verif($mail, $mdp) {
    $request = Main::Database()->prepare('SELECT ID, MAIL, MDP FROM utilisateurs WHERE MAIL = ? AND MDP = ?');
    $request->execute(array($mail, $mdp));
    $result = $request->fetch();
    return $result;
  }

}

?>
