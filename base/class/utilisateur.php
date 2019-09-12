<?php

Class Utilisateur {

  public static function Show($id) {
    $request = Main::DataBase()->prepare("SELECT * FROM UTILISATEURS WHERE ID = ?");
    $request->execute([$id]);
    return $request->fetch();
  }

  public static function onGroup($idUtilisateur, $idGroupe) {
    $request = Main::DataBase()->prepare("SELECT * FROM MEMBRES_GROUPE WHERE ID_UTILISATEUR = :idUtilisateur AND ID_GROUPE = :idGroupe");
    $request->execute(["idUtilisateur" => $idUtilisateur, "idGroupe" => $idGroupe]);
    if (!empty($request->fetch())) {
      return 1;
    } else {
      return 0;
    }
  }

}

?>
