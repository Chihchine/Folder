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
?>

<link href="base/css/profile.css" rel="stylesheet" id="css">
<script src="base/js/profile.js"></script>

<?php /*<-- DEBUT - Popup modification de groupe -->*/ ?>
<div class="modal fade" id="creationGroupe" tabindex="-1" role="dialog" aria-labelledby="creationGroupeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="creationGroupeLabel">Modifier le groupe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="createGroupe" class="form-proposition-groupe" action="groupes.php" method="post">
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
          <div class="input-group image-preview">
            <input type="text" class="form-control image-preview-filename" disabled="disabled">
            <span class="input-group-btn">
              <!-- image-preview-clear button -->
              <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                <span class="glyphicon glyphicon-remove"></span> Annuler
              </button>
              <!-- image-preview-input -->
              <div class="btn btn-default image-preview-input">
                <span class="glyphicon glyphicon-folder-open"></span>
                <span class="image-preview-input-title">Ajoutez une image</span>
                <input type="file" accept="image/png, image/jpeg, image/gif" id="groupeImage" name="groupeImage"/>
              </div>
            </span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" onclick="document.forms['createGroupe'].submit();">Créer</button>
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
                                <img src="<?php echo Image::Show($groupe['ID_IMAGE_GROUPE'])['LIEN']; ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                <div class="middle">
                                    <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                    <input type="file" style="display: none;" id="profilePicture" name="file" />
                                </div>
                            </div>
                            <div class="userData ml-3">
                                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);"><?php echo $groupe['NOM']; ?></a></h2>
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
