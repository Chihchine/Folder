<?php

Class Groupe {

  public static function Create($name, $desc, $imageExtension, $imageTmp_name, $imageFile_error) {
    // if (!empty($name) && !empty($desc) && !empty($imageExtension) && !empty($imageTmp_name)) {
      $imageID = Image::Upload($imageExtension, $imageTmp_name, $imageFile_error);

      $request = Main::Database()->prepare("INSERT INTO GROUPES(NOM, DESCRIPTION, ID_IMAGE_GROUPE, DATE_CREATION) VALUES(:nom, :description, :idPhoto, CURRENT_TIMESTAMP)");
      $request->execute(["nom" => $name, "description" => $desc, "idPhoto" => $imageID]);
    // }
  }

}

?>
