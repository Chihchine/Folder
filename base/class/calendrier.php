<?php

Class Calendrier {
  public static function addEvent($nom, $description, $dateDebut, $dateFin, $idCreateur) {
    $request = Main::Database()->prepare('INSERT INTO EVENEMENTS(NOM, DESCRIPTION, DATE_DEBUT, DATE_FIN, ID_UTILISATEUR_CREATEUR) VALUES (?,?,?,?,?)');
    $result = $request->execute(array($nom, $description, $dateDebut, $dateFin, $idCreateur));
    return $result;
  }

  public static function joinDateHour($date, $heure) {
    $date = $date . ' ' . $heure;
    return $date;
  }

  public static function eventsDataBase() {
    $request = Main::Database()->prepare('SELECT NOM, DESCRIPTION, DATE_DEBUT, DATE_FIN FROM EVENEMENTS');
    $request->execute();
    return $request;
  }
}

 ?>
