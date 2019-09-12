<?php
Class Utilisateur {
  public static function Show($id) {
    $request = Main::DataBase()->prepare("SELECT * FROM UTILISATEURS WHERE ID = ?");
    $request->execute([$id]);
    return $request->fetch();
  }
}
?>
