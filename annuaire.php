<?php
require_once("base/class/main.php");
require("base/include/header.php"); ?>

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

        <?php
        $utilisateurs = Annuaire::displayUsers();

        while ($utilisateur = $utilisateurs->fetch()) { ?>
        <tr>
          <td><a href="profil.php?id=<?php echo $utilisateur['ID'] ?>"><?php echo $utilisateur['PRENOM'] ?></a></td>
          <td><?php echo $utilisateur['NOM'] ?></td>
          <td><?php echo $utilisateur['ECOLE'] ?></td>
          <td><?php echo $utilisateur['PROMOTION'] ?></td>
          <td><i class="fas fa-user-plus"></i><i class="fas fa-envelope"></i></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php require("base/include/footer.php"); ?>
