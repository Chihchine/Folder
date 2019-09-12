<?php
require("base/include/header.php");

if(!isset($_GET['id'])){
	header("Location: index.html");
}


if (isset($_SESSION['id_utilisateur'])) {
        //echo $_SESSION['id_utilisateur'];
        ?>
            <div class="fil-arianne container">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#" onClick="setActivePage('home')">Tableau de bord</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="profil.php?id=<?php echo $_SESSION['id_utilisateur']?>">Profil</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier votre profil</li>
                </ol>
              </nav>
            </div>
        <?php
    }

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $id = $_GET['id'];
	$result = Main::DataBase()->prepare("SELECT * FROM UTILISATEURS WHERE ID = ?");
	$result->execute(array($id));

	$image = Main::DataBase()->prepare("SELECT * FROM IMAGES WHERE ID = ?");

	$userexist = $result->rowCount();
	$userinfo = $result->fetch();

	$imageid = $userinfo["ID_IMAGE_PROFIL"];
	$image->execute(array($imageid));
	$imageinfo = $image->fetch();
	$imageexist = $image->rowCount();

	if (isset($_SESSION['id_utilisateur'])) {
		if($_SESSION['id_utilisateur'] == $id){
			   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $userinfo['MAIL']) {
			   	$newmail = htmlspecialchars($_POST['newmail']);
			    $insertmail = Main::DataBase()->prepare("UPDATE UTILISATEURS SET MAIL = ? WHERE ID = ?");
			    $insertmail->execute(array($newmail, $id));
			    echo '<SCRIPT LANGUAGE="JavaScript"> document.location.href="modifprofil.php?id=' . $_SESSION["id_utilisateur"] . '"</SCRIPT>';
			   }
			   if(isset($_POST['newmdp']) AND !empty($_POST['newmdp']) AND $_POST['newmdp'] != $userinfo['MDP']) {
				   	if($_POST['newmdp'] == $_POST['confirmMdp'])
				   	{
					   	$newmdp = htmlspecialchars($_POST['newmdp']);
					    $insertmdp = Main::DataBase()->prepare("UPDATE UTILISATEURS SET MDP = ? WHERE ID = ?");
					    $insertmdp->execute(array($newmdp, $id));
					    echo '<SCRIPT LANGUAGE="JavaScript"> document.location.href="modifprofil.php?id=' . $_SESSION["id_utilisateur"] . '"</SCRIPT>';
				   } else {
				   	// error handle: MDP pas le meme que Confirm MDP
				   }
				} else {
					// error handle: MDP is empty
				}
				if(isset($_POST['newecole']) AND !empty($_POST['newecole']) AND $_POST['newecole'] != $userinfo['ECOLE']) {
					$newecole = htmlspecialchars($_POST['newecole']);
					if($newecole != "Basic"){
						$insertecole = Main::DataBase()->prepare("UPDATE UTILISATEURS SET ECOLE = ? WHERE ID = ?");
					    $insertecole->execute(array($newecole, $id));
					    echo '<SCRIPT LANGUAGE="JavaScript"> document.location.href="modifprofil.php?id=' . $_SESSION["id_utilisateur"] . '"</SCRIPT>';
					}
				}
				if(isset($_POST['newpromotion']) AND !empty($_POST['newpromotion']) AND $_POST['newpromotion'] != $userinfo['PROMOTION']) {
					$newpromotion = htmlspecialchars($_POST['newpromotion']);
					if($newpromotion!="Basic"){
					$insertpromotion = Main::DataBase()->prepare("UPDATE UTILISATEURS SET PROMOTION = ? WHERE ID = ?");
				    $insertpromotion->execute(array($newpromotion, $id));
				    echo '<SCRIPT LANGUAGE="JavaScript"> document.location.href="modifprofil.php?id=' . $_SESSION["id_utilisateur"] . '"</SCRIPT>';
				}
				}
				if(isset($_POST['pres']) AND !empty($_POST['pres']) AND $_POST['pres'] != $userinfo['PRESENTATION']) {
					$newpres = htmlspecialchars($_POST['pres']);
					$insertpres = Main::DataBase()->prepare("UPDATE UTILISATEURS SET PRESENTATION = ? WHERE ID = ?");
				    $insertpres->execute(array($newpres, $id));
				    echo '<SCRIPT LANGUAGE="JavaScript"> document.location.href="modifprofil.php?id=' . $_SESSION["id_utilisateur"] . '"</SCRIPT>';
				}
		} else {
			echo '<SCRIPT LANGUAGE="JavaScript"> document.location.href="modifprofil.php?id=' . $_SESSION["id_utilisateur"] . '"</SCRIPT>';
			die;
		}
	}
	else
	{
		echo '<SCRIPT LANGUAGE="JavaScript"> document.location.href="modifprofil.php?id=' . $_SESSION["id_utilisateur"] . '"</SCRIPT>';
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
		$profilimage = Settings::sitePathRoot . $imageinfo['LIEN'];
	} else {
		$profilimage = "images/basicprofil.png";
	}



	if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
		//echo "debug";
		$extension  = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
		$idimage = Image::Upload($extension, $_FILES['avatar']['tmp_name'], $_FILES['avatar']['error']);
		$modifavatar = Main::DataBase()->prepare("UPDATE UTILISATEURS SET ID_IMAGE_PROFIL = ? WHERE ID = ?");
	    $modifavatar->execute(array($idimage, $id));

	    echo '<SCRIPT LANGUAGE="JavaScript"> document.location.href="modifprofil.php?id=' . $_SESSION["id_utilisateur"] . '"</SCRIPT>';
	    die;
	  }
?>


	<div class="container">
	  <div class="row">
	    <div class="col-md-3">
	      <div class="card">
	        <div class="card-body card-body-left">
	          <img class="rounded" height="150px" src="<?php echo $profilimage; ?>" alt="Image du compte" style="width:100%">
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
						<h2>Modification de votre profil</h2>
	        </div>
	        <div class="card-body card-body-right">
	        	<div class="row">
	             <form method="post" class="needs-validation form-signin" novalidate enctype="multipart/form-data">
					      <img class="mb-4">
					      <div class="form">
					        <div class="row">
					          <div class="form-group col-md-4">
					            <label for="">Nouvel Email</label>
					            <input class="form-control" type="email" name="newmail"  placeholder="<?php echo $userinfo["MAIL"] ?>" required>
					            <div class="invalid-feedback">Veuillez renseigner un email valide.</div>
					          </div>
					          <div class="form-group col-md-4">
					            <label for="">Nouveau Mot de passe</label>
					            <input class="form-control" type="password" name="newmdp"  placeholder="*********" required>
					            <div class="invalid-feedback">Minimum 6 caractères.</div>
					          </div>
					          <div class="form-group col-md-4">
					            <label for="">Confirmer votre nouveau mot de passe</label>
					            <input class="form-control" type="password" name="confirmMdp" placeholder="*********" required>
					            <div class="invalid-feedback">Veuillez confirmer votre nouveau mot de passe.</div>
					          </div>
					         <br/>
					        </div>
					        <div class="row">
					          <div class="form-group col-md-6">
					            <label for="">Nouvelle Ecole</label>
					            <select class="form-control" name="newecole">
					  				<option value="Basic">Votre école: <?php echo $userinfo["ECOLE"]?></option>
					              <option value="EPSI">EPSI</option>
					              <option value="IDRAC">IDRAC</option>
					              <option value="WIS">WIS</option>
					            </select>
					          </div>
					          <div class="form-group col-md-6">
					            <label for="">Niveau d'étude</label>
					            <select class="form-control" name="newpromotion">
					            	<option value = "Basic"> Votre niveau d'étude: <?php echo $userinfo["PROMOTION"]?></option>
					              <option value="B1">1ère année</option>
					              <option value="B2">2ème année</option>
					              <option value="B3">3ème année</option>
					              <option value="M1">4ème année</option>
					              <option value="M2">5ème année</option>
					            </select>
					          </div>
										<div class="form-group col-md-12">
												<textarea class="form-control" name="pres" value="<?php echo $userinfo["PRESENTATION"] ?>" required rows="6" placeholder="Une description de vous, sur vos intérêts, vos compétences, vos projets, etc" value="Actuellement en école d'informatique à l'EPSI, je suis disponible et intéressé par un projet novateur, j'aime aussi la musique pourquoi pas créer un groupe ? :)"></textarea>
						            <div class="invalid-feedback">Ne pas dépasser 150 caractères</div>
										</div>
										<div class="form-group col-md-12 download-img">
											<lalel> Téléverser un nouvel avatar:    </lalel>
						          <input type="file" name="avatar">
										</div>
					        </div>
					      </div>
					      <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnInscrire">Sauvegarder</button>
					    </form>
					</div>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>


<?php
include("base/include/footer.php");
}
else{
	echo '<SCRIPT LANGUAGE="JavaScript"> document.location.href="modifprofil.php?id=' . $_SESSION["id_utilisateur"] . '"</SCRIPT>';
	die;
}
?>
