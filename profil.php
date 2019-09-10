<?php
require("base/include/header.php");

$id = 1;
$nom = "Aurelien";

$result = Main::DataBase()->prepare("SELECT * FROM UTILISATEURS WHERE ID = ?");
$result->execute(array($id));

$image = Main::DataBase()->prepare("SELECT * FROM PHOTOS WHERE ID = ?");
$image->execute(array($id));

$userexist = $result->rowCount();

$imageinfo = $image->fetch();

if($userexist == 1){

} 
else
{
	header("Location: index.php");
}

?> 

<html> 
<head>
	<link rel="stylesheet" href = "base/css/profil.css" /> 
	<link rel="icon" href=""/>

</head>
<body>
	<div id="presentation"> 
		<img id="profil-image" src="images/profils/<?php echo $imageinfo['LIEN']; ?>" /> 
		<h4> Nom: <?php echo $userinfo['NOM'] ?> </h4> <!-- PHP "Nom" + Data.Name--> 
		<h4> Prénom: <?php echo $userinfo['PRENOM'] ?> </h4>
		<h4> Ecole: <?php echo $userinfo['ECOLE'] ?> </h4>
		<h4> Promotion: <?php echo $userinfo['PROMOTION'] ?> </h4>
	</div>

	<div id="description">
		<?php
			echo $userinfo['PRESENTATION'];
		?>
	</div>
</body>
</html>