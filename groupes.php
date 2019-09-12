<?php
$pageTitle = "Groupes";
require("base/include/header.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if( !empty($_FILES['groupeImage']['name']) ) {
      $extension  = pathinfo($_FILES['groupeImage']['name'], PATHINFO_EXTENSION);
      Groupe::Create($_POST['groupeName'], $_POST['groupeDesc'], $extension, $_FILES['groupeImage']['tmp_name'], $_FILES['groupeImage']['error']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if($_GET['r']=="join") {
    Groupe::Join($_GET['id']);
  } elseif($_GET['r']=="leave") {
    Groupe::Leave($_GET['id']);
  }
}
?>
<?php /*<-- DEBUT - Popup création de groupe -->*/ ?>
<div class="modal fade" id="creationGroupe" tabindex="-1" role="dialog" aria-labelledby="creationGroupeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="creationGroupeLabel">Créer un groupe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="createGroupe" class="form-proposition-groupe" action="groupes.php" method="post">
          <div class="form-group">
            <label for="groupeName">Nom du groupe</label>
            <input type="text" name="groupeName" id="groupeName" class="form-control" placeholder="Nom du groupe choisi...">
          </div>
          <div class="form-group">
            <label for="groupeDesc">Description du groupe</label>
            <textarea class="col-12" id="groupeDesc" name="groupeDesc" rows="3" placeholder="Une description simple du groupe avec ses objectifs, pour qui, quand, etc..."></textarea>
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
<?php /*<-- FIN - Popup création de groupe -->*/ ?>

<div class="fil-arianne container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#" onClick="setActivePage('home')">Tableau de bord</a></li>
      <li class="breadcrumb-item active" aria-current="page">Groupes</li>
    </ol>
  </nav>
</div>

          <div class="card">
            <div class="card-tittle">
              <h5>Groupes</h5>
            </div>
            <div class="card-body">
              <table
              data-toggle="table"
              data-search="true"
              data-sortable="true"
              data-filter-control="true"
              data-sort-name="membres"
              data-sort-order="desc"
              data-show-toggle="true"
              data-filter-show-clear="true"
              data-pagination="true"
              data-page-size="10"
              data-page-list="[5, 10, 25, 50, Toutes]">
                <thead>
                <button class="btn btn-primary" data-toggle="modal" data-target="#creationGroupe">Créer un groupe</button>
                  <tr>
                    <th>Image</th>
                    <th data-filter-control="input" data-field="nom" data-sortable="true">Nom</th>
                    <th data-filter-control="input" data-field="description" data-sortable="true">Description</th>
                    <th data-field="date" data-sortable="true">Création</th>
                    <th data-field="membres" data-sortable="true">Membres</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $groupes = Groupe::ListAll();
                  foreach ($groupes as $groupe) { ?>
                  <tr>
                    <td><img class="groupe-image" src="<?php echo Settings::sitePathRoot . Image::Show($groupe['ID_IMAGE_GROUPE'])['LIEN']; ?>"></td>
                    <td><a href="groupe.php?id=<?php echo $groupe['ID']; ?>"><?php echo $groupe['NOM']; ?></a></td>
                    <td><?php echo $groupe['DESCRIPTION']; ?></td>
                    <td><?php echo substr($groupe['DATE_CREATION'], 0, 10); ?></td>
                    <td><?php echo Groupe::CountMember($groupe['ID'])['NUMBER']; ?></td>
                    <td><a href="?r=join&id=<?php echo $groupe['ID']; ?>"><button class="btn btn-primary">Rejoindre</button></a>
                        <a href="?r=leave&id=<?php echo $groupe['ID']; ?>"><button class="btn btn-danger">Quitter</button></a></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

<?php require("base/include/footer.php"); ?>
