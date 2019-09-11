<?php
$pageTitle = "Groupes";
require("base/include/header.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo 1;
    if( !empty($_FILES['groupeImage']['name']) ) {
      echo 2;
      $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
      Groupe::Create($_POST['groupeName'], $_POST['groupeDesc'], $extension, $_FILES['fichier']['tmp_name'], $_FILES['fichier']['error']);
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
        <form id="createGroupe" class="form-proposition-groupe" action="groupes.php" method="post">
          <div class="form-group">
            <label for="groupeName">Nom du groupe</label>
            <input type="text" name="groupeName" id="groupeName" class="form-control" placeholder="Nom du groupe choisi...">
          </div>
          <div class="form-group">
            <label for="groupeDesc">Description du groupe</label>
            <textarea class="col-12" id="groupeDesc" name="groupeDesc" rows="3" placeholder="Une description simple du groupe avec ses objectifs, pour qui, quand, etc..."></textarea>
          </div>
          <div class="input-group image-preview">
            <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
            <span class="input-group-btn">
              <!-- image-preview-clear button -->
              <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                <span class="glyphicon glyphicon-remove"></span> Annuler
              </button>
              <!-- image-preview-input -->
              <div class="btn btn-default image-preview-input">
                <span class="glyphicon glyphicon-folder-open"></span>
                <span class="image-preview-input-title">Ajoutez une image</span>
                <input type="file" accept="image/png, image/jpeg, image/gif" id="groupeImage" name="groupeImage"/> <!-- rename it -->
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

<div class="container">
  <div class="card groupes-crées">
    <div class="card-header">
      <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">groupes créés</a>
        <div class="form-inline">
          <select id="input-classement" class="form-control">
            <option selected>Trier par...</option>
            <option>A/Z</option>
            <option>Z/A</option>
            <option>Récent</option>
            <option>Ancien</option>
            <option>Membres</option>
          </select>
          <button class="btn btn-primary" data-toggle="modal" data-target="#creationGroupe">Créer un groupe</button>
        </div>
      </nav>
    </div>
<div id="createdgroupes">
    </div>
    <div class="card-body row justify-content-center">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
    </div>
  </div>
</div>

<div class="container">
  <div class="card">
    <div class="card-header">
      <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Propositions de groupes</a>
        <form class="form-inline">
          <input class="form-control" type="search" placeholder="Mot clé" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Rechercher</button>
        </form>
      </nav>
    </div>
    <div id="onVotegroupes">
</div>
  <div class="card-body row justify-content-center">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
  </div>

</div>
</div>
</body>
