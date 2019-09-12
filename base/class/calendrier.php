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

  public static function eventCalendar() {
      $events = Calendrier::eventsDataBase();
      while ($event = $events->fetch()) {
        $debut = substr($event['DATE_DEBUT'], 0, 10).'T'.substr($event['DATE_DEBUT'], 11, 19);
        $fin = substr($event['DATE_FIN'], 0, 10).'T'.substr($event['DATE_FIN'], 11, 19);
        echo $debut;
        echo "<br>";
        echo $test2;
        $dataEvent[] = array(
          'title'     => $event['NOM'],
          'start'     => $debut,
          'end'       => $fin,
          'color'     => '#2ca8ff'
        );
      }
  }
  return $dataEvent;
}

 ?>
