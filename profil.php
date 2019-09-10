<?php
require("base/include/header.php");

$id = 1;
$nom = "Aurelien";

$result = Main::DataBase()->prepare("SELECT * FROM UTILISATEURS WHERE ID = ?");
$result->execute(array($id));

$userexist = $result->rowCount();
if($userexist == 1){
	$userinfo = $result->fetch();
	echo $userinfo['ID'];
} else 
{
	echo "Marche pas";
}
?> 

<html> 
<head>
	<link rel="stylesheet" href = "base/css/profil.css" /> 
	<link rel="icon" href=""/>

</head>
<body>
	<div id="presentation"> 
		<img id="profil-image" src="images/profils/profiltest.png" /> 
		<h4>Nom: Reynard </h4> <!-- PHP "Nom" + Data.Name--> 
		<h4> Prénom: Aurélien </h4>
	</div>
</body>
</html>