<?php

Class Groupe {

  public static function Create($name, $desc, $imageExtension, $imageTmp_name, $imageFile_error) {
    // if (!empty($name) && !empty($desc) && !empty($imageExtension) && !empty($imageTmp_name)) {
      $imageID = Image::Upload($imageExtension, $imageTmp_name, $imageFile_error);

      $request = Main::Database()->prepare("INSERT INTO GROUPES(NOM, DESCRIPTION, ID_IMAGE_GROUPE, DATE_CREATION) VALUES(:nom, :description, :idPhoto, CURRENT_TIMESTAMP)");
      $request->execute(["nom" => $name, "description" => $desc, "idPhoto" => $imageID]);
    // }
  }

  public static function Show($id) {
    $request = Main::DataBase()->prepare("SELECT * FROM GROUPES WHERE ID = ?");
    $request->execute([$id]);
    return $request->fetch();
  }

  public static function List() {
    $request = Main::Database()->prepare("SELECT * FROM GROUPES");
    $request->execute();
    return $request->fetchAll();
  }

  public static function ListAll() {
    $request = Main::Database()->prepare("SELECT * FROM GROUPES WHERE VISIBLE=1");
    $request->execute();
    return $request->fetchAll();
  }

  public static function CountMember($id) {
    $request = Main::Database()->prepare("SELECT COUNT(*) AS NUMBER FROM MEMBRES_GROUPE WHERE ID_GROUPE = ?");
    $request->execute([$id]);
    return $request->fetch();
  }

  public static function Join($id) {
    $request = Main::Database()->prepare("INSERT INTO MEMBRES_GROUPE(ID_GROUPE, ID_UTILISATEUR) VALUES(:idGroupe, :idUtilisateur)");
    $request->execute(["idGroupe" => $id, "idUtilisateur" => $_SESSION["id_utilisateur"]]);
  }

  public static function Leave($id) {
    $request = Main::Database()->prepare("DELETE FROM MEMBRES_GROUPE WHERE ID_GROUPE = :idGroupe AND ID_UTILISATEUR = :idUtilisateur");
    $request->execute(["idGroupe" => $id, "idUtilisateur" => $_SESSION["id_utilisateur"]]);
  }

  public static function Edit($id, $nom, $description, $visible, $imageID) {
      $request = Main::Database()->prepare("UPDATE GROUPES SET NOM=:nom, DESCRIPTION=:description, VISIBLE=:visisble, ID_IMAGE_GROUPE=:imageID WHERE ID=:id");
      $request->execute(["id" => $id, "nom" => $nom, "description" => $description, "visisble" => $visible, "imageID" => $imageID]);
  }

}

?>
