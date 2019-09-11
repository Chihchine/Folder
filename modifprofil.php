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
	              	<form method="post" class="needs-validation form-signin" novalidate>
					      <img class="mb-4">
					      <h1 class="h3 mb-3 font-weight-normal">Modification de votre profil</h1>
					      <div class="form">
					        <div class="form-row">
					          <!--<div class="form-group col-md-6">
					            <label for="">Prénom</label>
					            <input class="form-control" type="text" name="prenom"  placeholder="Prénom" required>
					            <div class="invalid-feedback">Veuillez-renseigner votre prénom.</div>
					          </div>
					          <div class="form-group col-md-6">
					            <label for="">Nom</label>
					            <input class="form-control" type="text" name="nom"  placeholder="Nom" required>
					            <div class="invalid-feedback">Veuillez-renseigner votre nom.</div>
					          </div>
					        </div>-->
					        <div class="form-row">
					          <div class="form-group col-md-4">
					            <label for="">Nouvel Email</label>
					            <input class="form-control" type="email" name="mail"  placeholder="<?php echo $userinfo["MAIL"] ?>" required>
					            <div class="invalid-feedback">Veuillez renseigner un email valide.</div>
					          </div>
					          <div class="form-group col-md-4">
					            <label for="">Presentation</label>
					            <input class="form-control" type="text" name="pres"  placeholder="<?php echo $userinfo["PRESENTATION"] ?>" required>
					            <div class="invalid-feedback">Ne pas dépasser 150 caractères</div>
					          </div>
					          <div class="form-group col-md-4">
					            <label for="">Nouveau Mot de passe</label>
					            <input class="form-control" type="password" name="mdp"  placeholder="*********" required>
					            <div class="invalid-feedback">Minimum 6 caractères.</div>
					          </div>
					          <div class="form-group col-md-4">
					            <label for="">Confirmer</label>
					            <input class="form-control" type="password" name="confirmMdp" placeholder="*********" required>
					            <div class="invalid-feedback">Veuillez confirmer votre nouveau mot de passe.</div>
					          </div>
					        </div>
					        <div class="form-row">
					          <div class="form-group col-md-6">
					            <label for="">Ecole</label>
					            <select class="form-control" name="ecole">
					              <option value="EPSI">EPSI</option>
					              <option value="IDRAC">IDRAC</option>
					              <option value="WIS">WIS</option>
					            </select>
					          </div>
					          <div class="form-group col-md-6">
					            <label for="">Niveau d'étude</label>
					            <select class="form-control" name="promotion">
					              <option value="B1">1ère année</option>
					              <option value="B2">2ème année</option>
					              <option value="B3">3ème année</option>
					              <option value="M1">4ème année</option>
					              <option value="M2">5ème année</option>
					            </select>
					          </div>
					        </div>
					      </div>
					      <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnInscrire">Sauvegarder</button>
					      <p class="text-muted">&copy; 2019 - Nom du site</p>
					    </form>

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
