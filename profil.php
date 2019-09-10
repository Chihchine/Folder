<<<<<<< current
<?php
require("base/include/header.php");

$id = 1;
$nom = "Aurelien"

$result = Main::DataBase()->prepare("SELECT * FROM UTILISATEURS");
$result->execute(array($id));
$userexist = $result->rowCount();
if($userexist == 1){
	$userinfo = $result->fetch();
<<<<<<< HEAD
	echo $userinfo['NOM'];
} else
=======
	echo $userinfo['id'];
} else 
>>>>>>> 2a0f03d942ced6f6f2717e35ad13bcc16998fec7
{
	echo "Marche pas";
}
?>
chichine's
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
=======
<?php
require("base/include/header.php");

//$request = Main::Database()->prepare("SELECT * FROM UTILISATEURS WHERE ID = :id");
//$request->execute(['id' => "1"]);

//$request = Main:DataBase()->prepare("SELECT * FROM UTILISATEURS WHERE ID = :id");
//$request->execute(["id" => 1])


$result = Main::DataBase()->prepare("SELECT * FROM UTILISATEURS");
//$result->execute(["id" => 1]);

//echo $result["id"];

foreach($result as $utilisateur)
{
	echo $utilisateur["id"];
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
>>>>>>> before discard
