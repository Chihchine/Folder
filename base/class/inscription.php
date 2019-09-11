<?php
Class Inscription {

  public static function signin($nom, $prenom, $mail, $mdp, $ecole, $promotion) {
    $request = Main::Database()->prepare('INSERT INTO UTILISATEURS(NOM, PRENOM, MAIL, MDP, ECOLE, PROMOTION, DATE_INSCRIPTION) VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)');
    $result = $request->execute(array($nom, $prenom, $mail, $mdp, $ecole, $promotion));
    return $result;
  }

  public static function mailExists($mail) {
    $request = Main::Database()->prepare('SELECT MAIL FROM UTILISATEURS WHERE MAIL = ?');
    $request->execute(array($mail));
    $result = $request->fetch();
    return $result;
  }
}
 ?>
