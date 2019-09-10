<?php
$pageTitle = "Groupes";
require("base/include/header.php");
?>
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
        <div class="form-group">
          <select id="input-classement" class="form-control">
            <option selected>Trier par...</option>
            <option>A/Z</option>
            <option>Z/A</option>
            <option>Récent</option>
            <option>Ancien</option>
            <option>Membres</option>
          </select>
          <button>Créer un groupe</button>
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
