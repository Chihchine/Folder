<?php
require("base/include/header.php");
?>

    <div class="container-scroller">
      <div class="main-panel">
        <div class="content-wrapper">
                    <div class="row page-title-header">
                        <div class="col-12">
                            <div class="page-header">
                                <h4 class="page-title">Tableau de bord</h4>
                                <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                                    <ul class="quick-links">
                                        <li><a href="#">Actualités</a></li>
                                        <li><a href="#">Nouveautés</a></li>
                                    </ul>
                                    <ul class="quick-links ml-auto">
                                        <li><a href="#">Paramètres</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-toolbar">
                                <div class="btn-group toolbar-item" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-left"></i></button>
                                    <button type="button" class="btn btn-secondary">09/09/2019 - 13/09/2019</button>
                                    <button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-right"></i></button>
                                </div>
                                <div class="filter-wrapper">
                                    <a href="#" class="advanced-link toolbar-item">Options avancées</a>
                                </div>
                                <div class="sort-wrapper">
                                    <button type="button" class="btn btn-primary toolbar-item">Nouveaux posts</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page Title Header Ends-->
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <p>
                                            <h4>Bienvenue sur Mycampus, nous vous souhaitons une agréable visite.</h4>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="title mb-0">Actualités</h2>
                                    <div class="d-flex flex-column flex-lg-row">
                                        <p>Posts Récents</p>
                                        <ul class="nav nav-tabs sales-mini-tabs ml-lg-auto mb-4 mb-md-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="sales-statistics_switch_1" data-toggle="tab" role="tab" aria-selected="true">1 jour</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="sales-statistics_switch_2" data-toggle="tab" role="tab" aria-selected="false">5 jours</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="sales-statistics_switch_3" data-toggle="tab" role="tab" aria-selected="false">1 mois</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="sales-statistics_switch_4" data-toggle="tab" role="tab" aria-selected="false">1 an</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4> Il n'y a encore aucune actualité</h4>
                                    <canvas class="mt-5" height="120" id="sales-statistics-overview"></canvas>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12 grid-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-0">Nouveautés</h4>
                                                <div class="d-flex align-items-center justify-content-between w-100">
                                                    <p class="mb-0">Ce qu'il ne faut pas louper !</p>
                                                    <div class="dropdown">
                                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dateSorter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ce mois-ci</button>
                                                        <div class="dropdown-menu" aria-labelledby="dateSorter">
                                                            <div class="dropdown-item" id="market-overview_1">Journalier</div>
                                                            <div class="dropdown-item" id="market-overview_2">Cette semaine</div>
                                                            <div class="dropdown-item" id="market-overview_3">Mensuel</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <canvas class="mt-4" height="100" id="market-overview-chart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 grid-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="card-title mb-0">Groupes principaux</h4>
                                                    <a href="#"><small>Voir l'ensemble des groupes</small></a>
                                                </div>
                                                <p>Voici les 5 groupes les plus populaires.</p>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Nom du groupe</th>
                                                                <th>Créateur</th>
                                                                <th>Sujet</th>
                                                                <th>Date de creation</th>
                                                                <th>nombres d'adhérents</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Vitality</td>
                                                                <td>Loic</td>
                                                                <td>E-sport</td>
                                                                <td>20 Janvier 2019</td>
                                                                <td>755</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lyonnais</td>
                                                                <td>Alexy</td>
                                                                <td>Culture</td>
                                                                <td>23 Fevrier 2019</td>
                                                                <td>702</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Epsien</td>
                                                                <td>Thomas</td>
                                                                <td>Etudes</td>
                                                                <td>25 Mars 2019</td>
                                                                <td>663</td>
                                                            </tr>
                                                            <tr>
                                                                <td>ScieFish</td>
                                                                <td>Aurélien</td>
                                                                <td>Developpement</td>
                                                                <td>27 Mars 2019</td>
                                                                <td>335</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Club de Foot</td>
                                                                <td>Gauthier</td>
                                                                <td>Sport</td>
                                                                <td>1 Avril 2019</td>
                                                                <td>157</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="d-flex align-items-center pb-2">
                                                            <div class="dot-indicator bg-info mr-2"></div>
                                                            <h4 class="mb-0">Facebook</h4>
                                                        </div>
                                                        <h4 class="font-weight-semibold"></h4>
                                                        <div>
                                                            <div><a name="fb_share" type="button">Partager</a>
                                                                <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-4 mt-md-0">
                                                        <div class="d-flex align-items-center pb-2">
                                                            <div class="dot-indicator bg-primary mr-2"></div>
                                                            <h4 class="mb-0">Twitter</h4>
                                                        </div>
                                                        <h4 class="font-weight-semibold"></h4>
                                                        <div> <a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="InfoWebMaster">Tweet</a>
                                                            <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 grid-margin stretch-card average-price-card">
                                        <div class="card text-white">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between pb-2 align-items-center">
                                                    <h2 class="font-weight-semibold mb-0">4,624</h2>
                                                    <div class="icon-holder">
                                                        <i class="mdi mdi-briefcase-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="font-weight-semibold mb-0">Posts </h5>
                                                    <p class="text-white mb-0">Depuis les 2 derniers mois.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12 grid-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <h1 class="card-title mb-4">Communauté</h1>
                                                <div class="row">
                                                    <div class="col-5 col-md-5">
                                                        <div class="wrapper">
                                                            <h4 class="font-weight-semibold mb-0">54 personnes</h4>
                                                            <div class="d-flex align-items-center">
                                                                <p class="mb-0">Actives</p>
                                                                <div class="dot-indicator bg-primary ml-auto"></div>
                                                            </div>
                                                        </div>
                                                        <div class="wrapper border-bottom mb-2 pb-2">
                                                            <h4 class="font-weight-semibold mb-0">176 personnes</h4>
                                                            <div class="d-flex align-items-center">
                                                                <p class="mb-0">Inactives</p>
                                                                <div class="dot-indicator bg-secondary ml-auto"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-5 col-md-7 d-flex pl-4">
                                                        <div class="ml-auto">
                                                            <canvas height="100" id="realtime-statistics"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="icon-holder bg-primary text-white py-1 px-3 rounded mr-2">
                                                                <i class="icon ion-logo-buffer icon-sm"></i>
                                                            </div>
                                                            <h2 class="font-weight-semibold mb-0">230</h2>
                                                        </div>
                                                        <p>Inscrites</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mt-n3 ml-auto" id="dashboard-guage-chart"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 grid-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-0">Evénements Récents</h4>
                                                <div class="d-flex py-2 border-bottom">
                                                    <div class="wrapper">
                                                        <small class="text-muted">13-14 septembre 2019</small>
                                                        <p class="font-weight-semibold text-gray mb-0">Musique</p>
                                                    </div>
                                                    <small class="text-muted ml-auto">En savoir plus</small>
                                                </div>
                                                <div class="d-flex py-2 border-bottom">
                                                    <div class="wrapper">
                                                        <small class="text-muted">17 septembre 2019</small>
                                                        <p class="font-weight-semibold text-gray mb-0">Jeux-vidéos</p>
                                                    </div>
                                                    <small class="text-muted ml-auto">En savoir plus</small>
                                                </div>
                                                <div class="d-flex py-2 border-bottom">
                                                    <div class="wrapper">
                                                        <small class="text-muted">21 septembre 2019</small>
                                                        <p class="font-weight-semibold text-gray mb-0">Divertissement</p>
                                                    </div>
                                                    <small class="text-muted ml-auto">En savoir plus</small>
                                                </div>
                                                <div class="d-flex pt-2">
                                                    <div class="wrapper">
                                                        <small class="text-muted">29 septembre 2019</small>
                                                        <p class="font-weight-semibold text-gray mb-0">Football</p>
                                                    </div>
                                                    <small class="text-muted ml-auto">En savoir plus</small>
                                                </div>
                                                <a class="d-block mt-5" href="#">Voir tous les événements</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-0">Amis</h4>
                                <div class="d-flex mt-3 py-2 border-bottom">
                                    <img class="img-sm rounded-circle" src="../assets/images/faces/face3.jpg" alt="profile image">
                                    <div class="wrapper ml-2">
                                        <p class="mb-n1 font-weight-semibold">Gauthier Mairot</p>
                                        <small>EPSI B2G1</small>
                                    </div>
                                    <small class="text-muted ml-auto">Il y a 1 heure</small>
                                </div>
                                <div class="d-flex py-2 border-bottom">
                                    <span class="img-sm rounded-circle bg-warning text-white text-avatar">AR</span>
                                    <div class="wrapper ml-2">
                                        <p class="mb-n1 font-weight-semibold">Aurélien Reynard</p>
                                        <small>EPSI B2G1</small>
                                    </div>
                                    <small class="text-muted ml-auto">Il y a 4 heures</small>
                                </div>
                                <div class="d-flex py-2 border-bottom">
                                    <img class="img-sm rounded-circle" src="../assets/images/faces/face4.jpg" alt="profile image">
                                    <div class="wrapper ml-2">
                                        <p class="mb-n1 font-weight-semibold">Thomas Coche</p>
                                        <small>EPSI B2G1</small>
                                    </div>
                                    <small class="text-muted ml-auto">Il y a 7 heures</small>
                                </div>
                                <div class="d-flex pt-2">
                                    <span class="img-sm rounded-circle bg-success text-white text-avatar">LD</span>
                                    <div class="wrapper ml-2">
                                        <p class="mb-n1 font-weight-semibold">Loic Ducornetz</p>
                                        <small>EPSI B2G1</small>
                                    </div>
                                    <small class="text-muted ml-auto">Il y a 1 jour</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->

<?php
require("base/include/footer.php");
?>
