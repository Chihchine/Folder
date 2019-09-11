<?php
require("base/include/header.php");

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $id = $_GET['id'];



	$result = Main::DataBase()->prepare("SELECT * FROM UTILISATEURS WHERE ID = ?");
	$result->execute(array($id));

	$image = Main::DataBase()->prepare("SELECT * FROM PHOTOS WHERE ID = ?");

	$userexist = $result->rowCount();
	$userinfo = $result->fetch();

	$imageid = $userinfo["ID_PHOTO_PROFIL"];
	$image->execute(array($imageid));
	$imageinfo = $image->fetch();
	$imageexist = $image->rowCount();

	if (isset($_SESSION['id_utilisateur'])) {
		if($_SESSION['id_utilisateur'] == $id){
			echo "Worked";
		} else {
			header("Location: profil.php?id=".$_GET['id']);
			die;
		}
	}
	else
	{
		header("Location: profil.php?id=".$_GET['id']);
		die;
	}



	if($userexist == 1){
		//$userinfo = $result->fetch();
	} else
	{
		header("Location: index.php");
		die;
	}


	$profilimage = "";

	if($imageexist==1){
		$profilimage = "images/uploads/" .$imageinfo['LIEN'];
	} else {
		$profilimage = "images/basicprofil.png";
	}
?>

<html> 
	<body>
	    <!--<div class="fil_arianne container">
	    <nav aria-label="breadcrumb">
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item"><a href="?p=dashboard">Tableau de bord</a></li>
	            <li class="breadcrumb-item active" aria-current="page">Mon profil</li>
	        </ol>
	    </nav>
	</div>-->

	<div class="container-fluid profil-content">
	  <h1>Profil</h1>
	  <div class="row">
	    <div class="col-md-3">
	      <div class="card">
	        <div class="card-body card-body-left">
	          <img class="rounded" height="400px" src="<?php echo $profilimage; ?>" alt="Image du compte" style="width:100%">
	          <h5>
	          </h5>
	          <h6>
	          </h6>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-9">
	      <div class="card">
	        <div class="card-header">
	          Vous regardez le profil de: <?php echo $userinfo['NOM'] . " " . $userinfo['PRENOM'] ?>
	        </div>
	        <div class="card-body card-body-right">
	          <table class="table">
	            <tbody>
	              <tr>
	                <th class="colonnes-gauches" scope="row">Identité</th>
	                <td class="colonnes-droites">
	                	<?php echo $userinfo['NOM'] . " " . $userinfo['PRENOM'] ?>
	                </td>
	              </tr>
	              <tr>
	                <th class="colonnes-gauches" scope="row">Ecole</th>
	                <td class="colonnes-droites">
	                	<?php echo $userinfo['ECOLE']; ?>
	                </td>
	              </tr>
	              <tr>
	                <th class="colonnes-gauches" scope="row">Date d'inscription</th>
	                <td class="colonnes-droites">           </td>
	              </tr>
	              <tr>
	                <th class="colonnes-gauches" scope="row">Groupes</th>
	                <td class="colonnes-droites">
	               		<?php
	                		$membrede = Main::DataBase()->prepare("SELECT * FROM MEMBRES_GROUPE WHERE ID_UTILISATEUR = ?");
	                		$membrede->execute(array($id));
	                		$membredeinfo = $membrede->fetchAll();

							//echo $membredeinfo['ID_GROUPE'];

							foreach($membredeinfo as $valeur){
								$groupe = Main::DataBase()->prepare("SELECT * FROM GROUPES WHERE ID = ?");
								$groupe->execute(array($valeur["ID_GROUPE"]));

								$groupeinfo = $groupe->fetch();
		
								echo '<a href="'.'groupe.php?id=' .$valeur["ID_GROUPE"].'">' .$groupeinfo["NOM"]. '</a>';
								echo "</br>";
							}

	                	?>
	                </td>
	              </tr>
	              <tr>
	                <th class="colonnes-gauches" scope="row">Promotion</th>
	                <td class="colonnes-droites"> <?php echo $userinfo['PROMOTION']; ?> </td>
	              </tr>
	              <tr>
	                <th class="colonnes-gauches" scope="row">Oof</th>
	                <td class="colonnes-droites">X commentaires</td>
	              </tr>
	            </tbody>
	          </table>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>


	  

	</body>
</html>


<?php
}
else{
	header("Location: index.php");
	die;
}
?>
