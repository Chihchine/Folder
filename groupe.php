<?php
if (!isset($_GET['id'])) {
  header("Location: groupes.php");
}

$pageTitle = "Groupe";
include("base/include/header.php");

$groupe = Groupe::Show($_GET['id']);

if (empty($groupe)) {
  echo "erreur, groupe inconnu";
}

if (isset($_GET['r']) && $_GET['r']=="editInfo ") {
  if (isset($_POST['groupeVisible'])) {
    $visible = true;
  } else {
    $visible = false;
  }

  Groupe::Edit($_GET['id'], $_POST['groupeName'], $_POST['groupeDesc'], $visible, $groupe['IMAGE_ID_GROUPE']);

} elseif (isset($_GET['r']) && $_GET['r']=="editImage") {

    $extension  = pathinfo($_FILES['groupeImage']['name'], PATHINFO_EXTENSION);

    Groupe::Edit($_GET['id'], $groupe['NOM'], $groupe['DESCRIPTION'], $groupe['VISIBLE'], Image::Upload($extension, $_FILES['groupeImage']['tmp_name'], $_FILES['groupeImage']['error']));
}
?>

<link href="base/css/profile.css" rel="stylesheet" id="css">
<script src="base/js/profile.js"></script>

<?php /*<-- DEBUT - Popup modification de groupe -->*/ ?>
<div class="modal fade" id="modificationGroupe" tabindex="-1" role="dialog" aria-labelledby="modificationGroupeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modificationGroupeLabel">Modifier le groupe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="editInfo" class="form-proposition-groupe" action="groupe.php?id=<?php echo $groupe['ID']; ?>&r=editInfo" method="post">
          <div class="form-group">
            <label for="groupeName">Nom du groupe</label>
            <input type="text" name="groupeName" id="groupeName" class="form-control" placeholder="Nom du groupe choisi..." value="<?php echo $groupe['NOM']; ?>">
          </div>
          <div class="form-group">
            <label for="groupeDesc">Description du groupe</label>
            <textarea class="col-12" id="groupeDesc" name="groupeDesc" rows="3" placeholder="Une description simple du groupe avec ses objectifs, pour qui, quand, etc..."><?php echo $groupe['DESCRIPTION']; ?></textarea>
          </div>
          <div class="form-group">
            <label for="groupeDesc">Visible</label>
            <input type="checkbox" class="col-12" id="groupeVisible" name="groupeVisislbe" <?php if($groupe['VISIBLE']==true || $groupe['VISIBLE']==NULL) { echo "checked"; }?>>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" onclick="document.forms['editInfo'].submit();">Modifier</button>
      </div>
    </div>
  </div>
</div>
<?php /*<-- FIN - Popup modification de groupe -->*/ ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                <img src="<?php echo Settings::sitePathRoot . Image::Show($groupe['ID_IMAGE_GROUPE'])['LIEN']; ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                <div class="middle">
                                  <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Modifier" />
                                  <form enctype="multipart/form-data" id="editImage" class="form-proposition-groupe" action="groupe.php?id=<?php echo $groupe['ID']; ?>&r=editImage" method="post">
                                    <input type="file" style="display: none;" id="imageProfil" name="image" />
                                  </form>
                                </div>
                            </div>
                            <div class="userData ml-3">
                                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);"><?php echo $groupe['NOM']; ?></a></h2>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modificationGroupe">Créer un groupe</button>
                            </div>
                            <div class="ml-auto">
                                <input type="button" class="btn btn-warning d-none" id="btnDiscard" value="Annuler" />
                                <input type="button" class="btn btn-primary d-none" onclick="document.forms['editImage'].submit();" value="Sauvegarder" />
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
                                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Description</a>
                                </li>
                            </ul>
                            <div class="tab-content ml-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">


                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Nom</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?php echo $groupe['NOM']; ?>
                                        </div>
                                    </div>
                                    <hr />


                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Date de création</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?php echo substr($groupe['DATE_CREATION'], 0, 10); ?>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Visible</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?php
                                            if($groupe['VISIBLE']==true || $groupe['VISIBLE']==NULL) {
                                              echo "Oui";
                                            } else {
                                              echo "Non";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <hr />

                                </div>
                                <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                    <?php echo $groupe['DESCRIPTION']; ?>
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
?>
