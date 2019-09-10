<?php
// if (!isset($_SESSION['id_utilisateur'])) {
// 	Header('Location: ../');
// 	die;
// }

require_once("../base/class/main.php");

?>
<head>
  <title>myCampus - <?php echo $pageTitle ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo Settings::sitePathRoot; ?>base/img/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="<?php echo Settings::sitePathRoot; ?>base/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo Settings::sitePathRoot; ?>base/css/style.css"/>
  <script src="<?php echo Settings::sitePathRoot; ?>base/js/jQuery.min.js"></script>
  <script src="<?php echo Settings::sitePathRoot; ?>base/js/bootstrap.min.js"></script>
  <script src="<?php echo Settings::sitePathRoot; ?>base/js/script.js"></script>

  <meta charset="utf-8">
</head>
<body onload="pageLoad()">
?>
