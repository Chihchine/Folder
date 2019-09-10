<?php
function connexionBDD() {
  $servername = 'localhost';
  $bddname = 'workshop';
  $user = 'root';
  $pass = '';
  $bdd = new PDO("mysql:host=".$servername.";dbname=".$bddname, $user, $pass);
  // $bdd->exec("SET CHARACTER SET utf8");
  return $bdd;
}

 ?>
