<?php
$pageTitle = "Profil";
include("base/include/header.php");

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

    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
        echo "yo";
        $extension  = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $idimage = Image::Upload($extension, $_FILES['avatar']['tmp_name'], $_FILES['avatar']['error']);
        $modifavatar = Main::DataBase()->prepare("UPDATE UTILISATEURS SET ID_IMAGE_PROFIL = ? WHERE ID = ?");
        $modifavatar->execute(array($idimage, $id));

        echo '<SCRIPT LANGUAGE="JavaScript"> document.location.href="modifprofil.php?id=' . $_SESSION["id_utilisateur"] . '"</SCRIPT>';
        die;
      }
?>
?>

<link href="base/css/profile.css" rel="stylesheet" id="css">
<script src="base/js/profile.js"></script>


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                <img src="<?php echo $profilimage; ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />

                                <?php 

                                if($_SESSION["id_utilisateur"]){
                                echo '
                                <div class="middle">
                                <form method="post" class="needs-validation form-signin" novalidate enctype="multipart/form-data"> 
                                    <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                    <input type="file" style="display: none;" id="profilePicture" name="avatar" />
                                </div><button class="btn btn-primary d-none" id="btnDiscard" type="submit" name="btnInscrire">Sauvegarder</button></form>';}

                                ?>
                            </div>
                            <div class="userData ml-3">
                                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);"><?php echo $userinfo["NOM"] . " " . $userinfo["PRENOM"]?></a></h2>
                                <h6 class="d-block"><?php echo $userinfo["ECOLE"]?></h6>
                                <h6 class="d-block"><?php echo $userinfo["PROMOTION"]?></h6>
                            </div>
                            <div class="ml-auto">
                                <button class="btn btn-primary d-none" id="btnDiscard" type="submit" name="btnInscrire">Sauvegarder</button>
                                <!--<input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Changer" />-->
                            </div> 
                        </div>
                    </div>
                

                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Informations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Présentation</a>
                                </li>
                            </ul>
                            <div class="tab-content ml-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">


                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Nom</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?php echo $userinfo["NOM"]?>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Prénom</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?php echo $userinfo["PRENOM"]?>
                                        </div>
                                    </div>
                                    <hr />


                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Date d'inscription</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?php if(!is_null($userinfo['DATE_INSCRIPTION'])){
                                             $olddate = $userinfo['DATE_INSCRIPTION']; $newDate = date("d-m-Y", strtotime($olddate)); echo $newDate;
                                            } else {
                                                echo "Inconnue";
                                            }?>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Ecole</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?php echo $userinfo["ECOLE"]?>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Promotion</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?php echo $userinfo["PROMOTION"]?>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Groupes</label>
                                        </div>
                                        <div class="col-md-8 col-6">
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
                                        </div>
                                    </div>
                                    <hr />

                                </div>
                                <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                    <?php echo $userinfo["PRESENTATION"]?>
                                </div>
                            </div>
                        </div>


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