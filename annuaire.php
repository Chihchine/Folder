<?php require("base/include/header.php"); ?>

<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
<script src="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.js"></script>
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
    data-sort-name="devis"
    data-sort-order="asc"
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
          <th data-field="mail">Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Gauthier</td>
          <td>Mairot</td>
          <td>EPSI</td>
          <td>B2</td>
          <td>gauthier.mairot@epsi.fr</td>
        </tr>
        <tr>
          <td>Thomas</td>
          <td>Coche</td>
          <td>EPSI</td>
          <td>B2</td>
          <td>thomas.coche@epsi.fr</td>
        </tr>
      </tbody>
  </div>
</div>
