<?php
require("base/include/header.php");

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
	//echo $imageinfo['LIEN'];


	if (isset($_SESSION['id_utilisateur'])) {
		//echo $_SESSION['id_utilisateur'];
		echo "<a href='modifprofil.php?id=" . $_SESSION["id_utilisateur"] . "'> Modifier votre profil </a>";
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
?>

<?php
require("base/include/header.php");
?>

<link rel="stylesheet" href="base/css/sidebar.css">

<html>
	<body>
      <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
          <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
          <div class="sidebar-content">
            <div class="sidebar-brand">
              <a href="#">My campus</a>
              <div id="close-sidebar">
                <i class="fas fa-times"></i>
              </div>
            </div>
            <div class="sidebar-header">
              <div class="user-pic">
                <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                alt="User picture">
              </div>
              <div class="user-info">
                <span class="user-name">Alexy
                  <strong>DEFORGE</strong>
                </span>
                <span class="user-role">B2G1</span>
                <span class="user-status">
                  <i class="fa fa-circle"></i>
                  <span>Actif</span>
                </span>
              </div>
            </div>
            <!-- sidebar-header  -->
            <div class="sidebar-search">
              <div>
                <div class="input-group">
                  <input type="text" class="form-control search-menu" placeholder="Rechercher...">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <!-- sidebar-search  -->
            <div class="sidebar-menu">
              <ul>
                <li class="header-menu">
                  <span>Général</span>
                </li>
                <li class="sidebar-button">
                  <a href="index.php">
                    <i class="fa fa-tachometer-alt"></i>
                    <span>Tableau de bord</span>
                  </a>
                </li>
                <li class="sidebar-button">
                  <a href="messages.php">
                    <i class="fa fa-book"></i>
                    <span>Messages</span>
                    <span class="badge badge-pill badge-primary">4</span>
                  </a>
                </li>
                <li class="sidebar-button">
                  <a href="groupes.php">
                    <i class="fa fa-book"></i>
                    <span>Groupes</span>
                    <span class="badge badge-pill badge-primary">2</span>
                  </a>
                </li>
                <li class="sidebar-button">
                  <a href="annuaire.php">
                    <i class="fa fa-globe"></i>
                    <span>Annuaire</span>
                  </a>
                </li>
                <li class="header-menu">
                  <span>Extra</span>
                </li>
                <li>
                  <a href="contact.php">
                    <i class="fa fa-book"></i>
                    <span>Nous contacter</span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- sidebar-menu  -->
          </div>
          <!-- sidebar-content  -->
          <div class="sidebar-footer">
            <a href="#">
              <i class="fa fa-bell"></i>
              <span class="badge badge-pill badge-warning notification">7</span>
            </a>
            <a href="#">
              <i class="fa fa-envelope"></i>
              <span class="badge badge-pill badge-success notification">4</span>
            </a>
            <a href="#">
              <i class="fa fa-cog"></i>
              <span class="badge-sonar"></span>
            </a>
            <a href="#">
              <i class="fa fa-power-off"></i>
            </a>
          </div>
        </nav>
        <main class="page-content">
          <div class="container-fluid">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            <!-- Contenu à droite -->
          </div>

        </main>

      </div>

      <script type="text/javascript">
      jQuery(function ($) {

        $(".sidebar-dropdown > a").click(function() {
          $(".sidebar-submenu").slideUp(200);
          if (
            $(this)
            .parent()
            .hasClass("active")
          ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
            .parent()
            .removeClass("active");
          } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
            .next(".sidebar-submenu")
            .slideDown(200);
            $(this)
            .parent()
            .addClass("active");
          }
        });

        $("#close-sidebar").click(function() {
          $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
          $(".page-wrapper").addClass("toggled");
        });




      });
      </script>

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
	                <td class="colonnes-droites"> <?php
	                	if(!is_null($userinfo['DATE_INSCRIPTION'])){
	                	 $olddate = $userinfo['DATE_INSCRIPTION']; $newDate = date("d-m-Y", strtotime($olddate)); echo $newDate;
	                	} else {
	                		echo "Inconnue";
	                	}


	                 ?></td>
	              </tr>
	              <tr>
	                <th class="colonnes-gauches" scope="row">Groupes</th>
	                <td class="colonnes-droites">
	               		<?php
	                		$membrede = Main::DataBase()->prepare("SELECT * FROM MEMBRES_GROUPE WHERE ID_UTILISATEUR = ?");
	                		$membrede->execute(array($id));
	                		$membredeinfo = $membrede->fetchAll();
	                		$nombremembre = $membrede->rowCount();
							//echo $membredeinfo['ID_GROUPE'];
	                		if($nombremembre > 0){
								foreach($membredeinfo as $valeur){
									//echo $valeur["ID_GROUPE"];

									$groupe = Main::DataBase()->prepare("SELECT * FROM GROUPES WHERE ID = ?");
									$groupe->execute(array($valeur["ID_GROUPE"]));

									$groupeinfo = $groupe->fetch();

									echo '<a href="'.'groupe.php?id=' .$valeur["ID_GROUPE"].'">' .$groupeinfo["NOM"]. '</a>';
									echo "</br>";
								}
							} else {
								echo "Membre de aucun groupe";
							}
	                	?>
	                </td>
	              </tr>
	              <tr>
	                <th class="colonnes-gauches" scope="row">Promotion</th>
	                <td class="colonnes-droites"> <?php echo $userinfo['PROMOTION']; ?> </td>
	              </tr>
	              <tr>
	                <th class="colonnes-gauches" scope="row">Presentation</th>
	                <td class="colonnes-droites"><?php echo $userinfo['PRESENTATION'];?></td>
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
