<?php 
require("base/class/main.php");

//$request = Main::Database()->prepare("SELECT * FROM UTILISATEURS WHERE ID = :id");
//$request->execute(['id' => "1"]);

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