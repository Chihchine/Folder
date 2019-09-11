<?php
$pageTitle = "Groupes";
require("base/include/header.php");
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
        <form class="form-proposition-club" action="#" method="post">
          <div class="form-group">
            <label for="clubName">Nom du groupe</label>
            <input type="text" name="clubName" id="clubName" class="form-control" placeholder="Nom du club choisi...">
          </div>
          <div class="form-group">
            <label for="clubDesc">Description du groupe</label>
            <textarea class="col-12" id="clubDesc" name="clubDesc" rows="3" placeholder="Une description simple du club avec ses objectifs, pour qui, quand, etc..."></textarea>
          </div>
          <div class="input-group image-preview">
            <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
            <span class="input-group-btn">
              <!-- image-preview-clear button -->
              <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                <span class="glyphicon glyphicon-remove"></span> Clear
              </button>
              <!-- image-preview-input -->
              <div class="btn btn-default image-preview-input">
                <span class="glyphicon glyphicon-folder-open"></span>
                <span class="image-preview-input-title">Browse</span>
                <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
              </div>
            </span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary">Créer</button>
      </div>
    </div>
  </div>
</div>
<?php /*<-- FIN - Popup création de groupe -->*/ ?>

<div class="fil-arianne container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#" onClick="setActivePage('home')">Tableau de bord</a></li>
      <li class="breadcrumb-item active" aria-current="page">Clubs</li>
    </ol>
  </nav>
</div>

<div class="container">
  <div class="card clubs-crées">
    <div class="card-header">
      <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Clubs créés</a>
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
<div id="createdClubs">
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
        <a class="navbar-brand">Propositions de clubs</a>
        <form class="form-inline">
          <input class="form-control" type="search" placeholder="Mot clé" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Rechercher</button>
        </form>
      </nav>
    </div>
    <div id="onVoteClubs">
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
