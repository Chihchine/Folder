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
    $result = $request->execute();
    return $result;
  }

  public static function eventCalendar() {
      while ($event = Calendrier::eventsDataBase()->fetch()) {
        $test1 = substr($event['DATE_DEBUT'], 0, 10).'T'.substr($event['DATE_DEBUT'], 11, 19);
        $test2 = substr($event['DATE_FIN'], 0, 10).'T'.substr($event['DATE_FIN'], 11, 19);
        echo $test1;
        echo $test2;
        // $dataEvent[] = array(
        //   'title'     => $event['NOM'],
        //   'start'     => substr($event['DATE_DEBUT'], 0, 10).'T'.substr($event['DATE_DEBUT'], 11, 19),
        //   'end'       => substr($event['DATE_FIN'], 0, 10).'T'.substr($event['DATE_FIN'], 11, 19),
        //   'color'     => '#2ca8ff'
        // );
      }
  }
}

 ?>
