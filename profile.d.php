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
                                <img src="http://placehold.it/150x150" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                <div class="middle">
                                    <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                    <input type="file" style="display: none;" id="profilePicture" name="file" />
                                </div>
                            </div>
                            <div class="userData ml-3">
                                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);"><?php echo $userinfo["NOM"] . " " . $userinfo["PRENOM"]?></a></h2>
                                <h6 class="d-block"><?php echo $userinfo["ECOLE"]?></h6>
                                <h6 class="d-block"><?php echo $userinfo["PROMOTION"]?></h6>
                            </div>
                            <div class="ml-auto">
                                <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
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
                                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Autres</a>
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
                                            <?php echo $userinfo["DATE_INSCRIPTION"]?>
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
                                            <label style="font-weight:bold;">Classe</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?php echo $userinfo["PROMOTION"]?>
                                        </div>
                                    </div>
                                    <hr />

                                </div>
                                <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                    Facebook, Google et Twitter sont connectés à ce compte.
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