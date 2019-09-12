<?php
require_once(__DIR__ . "/../class/main.php");

if (!isset($_SESSION['id_utilisateur'])) {
	Header('Location: connexion.php');
	die;
}

$utilisateur = Utilisateur::Show($_SESSION['id_utilisateur']);

$imageProfil = Image::Show($utilisateur['ID_IMAGE_PROFIL'])['LIEN'];
if (empty($imageProfil)) {
  $imageProfil = Image::Show("1")['LIEN'];
}

?>
<!DOCTYPE HTML>
<html>
<head>
  <title>myCampus - <?php echo $pageTitle ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo Settings::sitePathRoot; ?>base/img/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="<?php echo Settings::sitePathRoot; ?>base/css/main.css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
	<link rel="stylesheet" href="<?php echo Settings::sitePathRoot; ?>base/css/sidebar.css">
	<link rel="stylesheet" href="<?php echo Settings::sitePathRoot; ?>base/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?php echo Settings::sitePathRoot; ?>base/css/ionicons.css">
	<link rel="stylesheet" href="<?php echo Settings::sitePathRoot; ?>base/css/typicons.css">
	<link rel="stylesheet" href="<?php echo Settings::sitePathRoot; ?>base/css/flag-icon.min.css">
	<link rel="stylesheet" href="<?php echo Settings::sitePathRoot; ?>base/css/vendor.bundle.base.css">
	<link rel="stylesheet" href="<?php echo Settings::sitePathRoot; ?>base/css/vendor.bundle.addons.css">
	<link rel="stylesheet" href="<?php echo Settings::sitePathRoot; ?>base/css/style.css">
	<link rel="stylesheet" href="<?php echo Settings::sitePathRoot; ?>base/css/style0.css">
	<link rel="stylesheet" href="<?php echo Settings::sitePathRoot; ?>base/css/bootstrap.min.css">
	<link rel="shortcut icon" href="<?php echo Settings::sitePathRoot; ?>base/css/favicon.png">

	<script src="<?php echo Settings::sitePathRoot; ?>base/js/jQuery.min.js"></script>
	<script src="<?php echo Settings::sitePathRoot; ?>base/js/popper.js"></script>
	<script src="<?php echo Settings::sitePathRoot; ?>base/js/bootstrap.min.js"></script>
	<script src="<?php echo Settings::sitePathRoot; ?>base/js/vendor.bundle.base.js"></script>
	<script src="<?php echo Settings::sitePathRoot; ?>base/js/vendor.bundle.addons.js"></script>
	<script src="<?php echo Settings::sitePathRoot; ?>base/js/off-canvas.js"></script>
	<script src="<?php echo Settings::sitePathRoot; ?>base/js/misc.js"></script>
	<script src="<?php echo Settings::sitePathRoot; ?>base/js/dashboard.js"></script>
  <script src="base/js/bootstrap-table.min.js"></script>
  <script src="base/js/bootstrap-table-fr-FR.js"></script>
  <script src="https://unpkg.com/bootstrap-table@1.14.2/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
  <script src="<?php echo Settings::sitePathRoot; ?>base/js/script.js"></script>

  <meta charset="utf-8">
</head>
<body onload="">

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
						<img class="img-responsive img-rounded" src="<?php echo Settings::sitePathRoot . $imageProfil; ?>" alt="User picture">
					</div>
					<div class="user-info">
						<a href="profil.php?id=<?php echo $_SESSION['id_utilisateur']?>">
							<span class="user-name"><?php echo $utilisateur['PRENOM']; ?>
								<strong><?php echo $utilisateur['NOM']; ?></strong>
							</span>
						</a>
						<span class="user-role"><?php echo $utilisateur['ECOLE'] . " " . $utilisateur['PROMOTION']; ?></span>
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
						<li>
							<a href="profil.php?id=<?php echo $_SESSION['id_utilisateur']?>">
								<i class="fas fa-user"></i>
								<span>Profil</span>
							</a>
						</li>
						<li class="sidebar-button">
							<a href="index.php">
								<i class="fa fa-tachometer-alt"></i>
								<span>Tableau de bord</span>
							</a>
						</li>
						<li class="sidebar-button">
							<a href="messages.php">
								<i class="fas fa-envelope"></i>
								<span>Messages</span>
								<span class="badge badge-pill badge-primary">4</span>
							</a>
						</li>
						<li class="sidebar-button">
							<a href="groupes.php">
								<i class="fas fa-users"></i>
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
						<li class="sidebar-button">
							<a href="calendrier.php">
								<i class="fas fa-calendar-alt"></i>
								<span>Calendrier</span>
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
