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

  public static function sendMail($mdp, $mail) {
    $to = $mail;
    $subject = 'Nom du site - Nouveau mot de passe';
    $message = '
    <html>
      <head>
        <tittle>Nouveau mot de passe</tittle>
      <head>
      <body>
        <p>Bonjour, à la suite de votre demande de réinitialisation de votre de mot de passe, nous vous en avons attribué un nouveau : <b>'.$mdp.'</b></p>
      </body>
    </html>
    ';
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    $headers[] = 'From: Support nom du truc <truc@example.com>';
    mail($to, $subject, $message, implode("\r\n", $headers));
  }
}
 ?>
