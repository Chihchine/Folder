<?php 
require("base/class/main.php");

//$request = Main::Database()->prepare("SELECT * FROM UTILISATEURS WHERE ID = :id");
//$request->execute(['id' => "1"]);

//$request = Main:DataBase()->prepare("SELECT * FROM UTILISATEURS WHERE ID = :id");
//$request->execute(["id" => 1])


$result = Main::DataBase()->prepare("SELECT * FROM UTILISATEURS WHERE ID = id");
$result->execute(["id" => 1]);

echo $result["id"];


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: ";
    }
} else {
    echo "0 results";
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