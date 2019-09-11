<?php
require_once("base/class/main.php");
require("base/include/header.php"); ?>

<script src="base/js/bootstrap-table.min.js"></script>
<script src="base/js/bootstrap-table-fr-FR.js"></script>
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
<script src="https://unpkg.com/bootstrap-table@1.14.2/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>


<div class="card">
  <div class="card-tittle">
    <h5>Annuaire des apprenants</h5>
  </div>
  <div class="card-body">
    <table
    data-toggle="table"
    data-search="true"
    data-sortable="true"
    data-filter-control="true"
    data-sort-name="nom"
    data-sort-order="asc"
    data-show-toggle="true"
    data-filter-show-clear="true"
    data-pagination="true"
    data-page-size="10"
    data-page-list="[5, 10, 25, 50, Toutes]">
      <thead>
        <tr>
          <th data-filter-control="input" data-field="prenom" data-sortable="true">Prénom</th>
          <th data-filter-control="input" data-field="nom" data-sortable="true">Nom</th>
          <th data-filter-control="select" data-field="ecole" data-sortable="true">Ecole</th>
          <th data-filter-control="select" data-field="promotion" data-sortable="true">Promotion</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while $utilisateur = Annuaire::displayUsers()->fetch() { ?>
        <tr>
          <td><?php echo $utilisateur['prenom'] ?></td>
          <td><?php echo $utilisateur['nom'] ?></td>
          <td><?php echo $utilisateur['ecole'] ?></td>
          <td><?php echo $utilisateur['promotion'] ?></td>
          <td><i class="fas fa-user-plus"></i><i class="fas fa-envelope"></i></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
