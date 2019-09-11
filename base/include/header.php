<?php
// if (!isset($_SESSION['id_utilisateur'])) {
// 	Header('Location: index.php');
// 	die;
// }

require_once(__DIR__ . "/../class/main.php");

?>
<head>
  <title>myCampus - <?php echo $pageTitle ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo Settings::sitePathRoot; ?>base/img/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="<?php echo Settings::sitePathRoot; ?>base/css/main.css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">

  <script src="<?php echo Settings::sitePathRoot; ?>base/js/jQuery.min.js"></script>
  <script src="<?php echo Settings::sitePathRoot; ?>base/js/popper.js"></script>
  <script src="<?php echo Settings::sitePathRoot; ?>base/js/bootstrap.min.js"></script>
  <script src="base/js/bootstrap-table.min.js"></script>
  <script src="base/js/bootstrap-table-fr-FR.js"></script>
  <script src="https://unpkg.com/bootstrap-table@1.14.2/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
  <script src="<?php echo Settings::sitePathRoot; ?>base/js/script.js"></script>

  <meta charset="utf-8">
</head>
<body onload="">
