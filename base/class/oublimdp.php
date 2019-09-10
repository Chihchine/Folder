<?php

Class Oublimdp {

  public static function mailExists($mail) {
    $mailBDD = Main::Database()->prepare('SELECT MAIL FROM UTILISATEURS WHERE MAIL = ?');
    $mailBDD->execute(array($mail));
    $mailExists = $mailBDD->fetch();
    return $mailExists;
  }

  public static function generatePassword() {
  $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $longueurMax = strlen($caracteres);
  $chaineAleatoire = '';
  for ($i = 0; $i < 8; $i++)
  {
  $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
  }
  return $chaineAleatoire;
  }

  public static function modifyPassword($mdp, $mail) {
    $request = Main::Database()->prepare('UPDATE UTILISATEURS SET MDP = ? WHERE mail = ?');
    $request->execute(array($mdp, $mail));
    return $request;
  }
}
 ?>
