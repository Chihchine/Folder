<?php
Class Annuaire {
  public static function displayUsers() {
    $request = Main::Database()->prepare('SELECT NOM, PRENOM, ECOLE, PROMOTION FROM UTILISATEURS');
    $request->execute();
    $result = $request;
    return $result;
  }
  public static function addEvent($nom, $description, $dateDebut, $dateFin, $idCreateur) {
    $request = Main::Database()->prepare('INSERT INTO EVENNEMENTS(NOM, DESCRIPTION, DATE_DEBUT, DATE_FIN, ID_UTILISATEUR_CREATEUR) VALUES (?,?,?,?,?)');
    $result = $request->execute(array($nom, $description, $dateDebut, $dateFin, $idCreateur));
    return $result;
  }

  public static function joinDateHour($date, $heure) {
    $date = $date . ' ' . $heure;
    return $date;
  }
}



 ?>
