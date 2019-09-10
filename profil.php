<?php
require("base/include/header.php");

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $id = $_GET['id'];



	$result = Main::DataBase()->prepare("SELECT * FROM UTILISATEURS WHERE ID = ?");
	$result->execute(array($id));

	$image = Main::DataBase()->prepare("SELECT * FROM PHOTOS WHERE ID = ?");
	$image->execute(array($id));

	$userexist = $result->rowCount();
	$imageexist = $image->rowCount();

	$imageinfo = $image->fetch();
	$userinfo = $result->fetch();



	if($userexist == 1){
		//$userinfo = $result->fetch();
	} else
	{
		header("Location: index.php");
	}
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="<?php echo Settings::sitePathRoot; ?>base/css/main.css"/>
	<link rel="icon" href=""/>

</head>
<body>
	<div id="presentation">
		<img id="profil-image" src="images/uploads/<?php if($imageexist==1){echo $imageinfo['LIEN'];} ?>" />
		<h4> Nom: <?php echo $userinfo['NOM']; ?> </h4>
		<h4> Prénom: <?php echo $userinfo['PRENOM']; ?> </h4>
		<h4> Ecole: <?php echo $userinfo['ECOLE']; ?> </h4>
		<h4> Promotion: <?php echo $userinfo['PROMOTION']; ?> </h4>
	</div>

	<div id="description">
		<?php
			echo $userinfo['PRESENTATION'];
		?>
	</div>
</body>
</html>

<?php
}
else{
	header("Location: index.php");
}
?>
