<?php
Class Inscription {

  public function inscription($nom, $prenom, $mail, $mdp, $ecole, $promotion) {
    $request = Main::Database()->prepare('INSERT INTO UTILISATEURS(NOM, PRENOM, MAIL, MDP, ECOLE, PROMOTION) VALUES (?, ?, ?, ?, ?, ?)');
    $result = $request->execute(array($nom, $prenom, $mail, $mdp, $ecole, $promotion));
    return $result;
  }

  public function mailExists($mail) {
    $request = Main::Database()->prepare('SELECT MAIL FROM UTILISATEURS WHERE MAIL = ?');
    $request->execute(array($mail));
    $result = $request->fetch();
    return $result;
  }
}
 ?>
