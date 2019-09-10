<?php
// if (!isset($_SESSION['id_utilisateur'])) {
// 	Header('Location: index.php');
// 	die;
// }

require_once(__DIR__ . "/../class/main.php");

?>
<head>
  <title>myCampus - <?php echo $pageTitle ?></title>
  <!-- <link rel="shortcut icon" type="image/x-icon" href="<?php echo Settings::sitePathRoot; ?>base/img/favicon.ico"/> -->
  <link rel="stylesheet" type="text/css" href="<?php echo Settings::sitePathRoot; ?>base/css/main.css"/>
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <script src="<?php #echo Settings::sitePathRoot; ?>base/js/jQuery.min.js"></script>
  <script src="<?php #echo Settings::sitePathRoot; ?>base/js/bootstrap.min.js"></script> -->
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="<?php echo Settings::sitePathRoot; ?>base/js/script.js"></script>

  <meta charset="utf-8">
</head>
<body onload="">
