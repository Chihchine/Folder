<?php
Class Connexion {
  
  public static function inscription($nom, $prenom, $mail, $mdp, $ecole, $promotion) {
    $request = Main::Database()->prepare('INSERT INTO utilisateurs(NOM, PRENOM, MAIL, MDP, ECOLE, PROMOTION) VALUES (?, ?, ?, ?, ?, ?)');
    $result = $request->execute(array($nom, $prenom, $mail, $mdp, $ecole, $promotion));
    return $result;
  }

  function mailExists($mail) {
    $request = Main::Database()->prepare('SELECT MAIL FROM utilisateurs WHERE MAIL = ?');
    $request->execute(array($mail));
    $result = $request->fetch();
    return $result;
  }
}
 ?>
