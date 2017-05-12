<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="shortcut icon" type="image/x-icon" href="./static/img/favicon.png" />

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Gestion d'exploitation - Alphateam</title>

        <!-- Bootstrap Core CSS -->
        <link href="static/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="static/css/simple-sidebar.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper" class="toggled">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="./index.php">
                            La cave de Marcelin ♥
                        </a>
                    </li>
                    <li>
                        <a href="./lesvins.php">Les vins</a>
                    </li>
                    <li>
                        <a href="./lescultures.php">Les cultures</a>
                    </li>
                    <li>
                        <a href="./lesparcelles.php">Les parcelles</a>
                    </li>
                    <li>
                        <a href="./lescomparaisons.php">Les comparaisons utiles</a>
                    </li>
                    <li>
                        <a href="./gererexploitation.php">Gérer l'exploitation</a>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Les Comparaisons</h1>
                            <h3>Top 10 des meilleurs ventes</h3><br>
                            <div id="loadpartial" class="fh-fixedHeader col-md-10 col-sm-8 main-content">
                      			<table id="schedule" class="display table-condensed table table-hover table-bordered dt-responsive responsive-display" style="width:100%">
                      				<thead style="height: ">
                                        <tr>
                      						<th>Nom du vin</th>
                      						<th>Année</th>
                      						<th>Nombre de litres vendus</th>
                      					</tr>
                      				</thead>
                      				<tbody>
                                        <?php require_once("requetes/meilleurs_ventes.php") ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h3>Les invendus</h3><br>
                            <div id="loadpartial" class="fh-fixedHeader col-md-10 col-sm-8 main-content">
                      			<table id="schedule" class="display table-condensed table table-hover table-bordered dt-responsive responsive-display" style="width:100%">
                      				<thead style="height: ">
                                        <tr>
                                            <th>Nom</th>
                      						<th>Année</th>
                      						<th>Restant en cuve (L)</th>
                      						<th>Couleur</th>
                      						<th>Note (/10)</th>
                      					</tr>
                      				</thead>
                      				<tbody>
                                        <?php require_once("requetes/invendus.php") ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h3>Top 10 des vins de meilleur qualité (ordre décroissant)</h3><br>
                            <div id="loadpartial" class="fh-fixedHeader col-md-10 col-sm-8 main-content">
                      			<table id="schedule" class="display table-condensed table table-hover table-bordered dt-responsive responsive-display" style="width:100%">
                      				<thead style="height: ">
                                        <tr>
                      						<th>Nom</th>
                      						<th>Année</th>
                      						<th>Restant en cuve (L)</th>
                      						<th>Couleur</th>
                      						<th>Note (/10)</th>
                      					</tr>
                      				</thead>
                      				<tbody>
                                        <?php require_once("requetes/meilleurs_qualite.php") ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h3>Relation du mode de culture par rapport à son prix</h3><br>

                            <div id="loadpartial" class="fh-fixedHeader col-md-10 col-sm-8 main-content">
                                <table id="schedule" class="display table-condensed table table-hover table-bordered dt-responsive responsive-display" style="width:100%">
                                    <thead style="height: ">
                                        <tr>
                                            <th>cepage</th>
                                            <th>annee_cult</th>
                                            <th>tonte</th>
                                            <th>taille</th>
                                            <th>prix_unitaire</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php require_once("requetes/compare_culture_prix.php") ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <h3>Classement des meilleurs cépages en fonction de la qualité de leurs vins</h3><br>
                            <div id="loadpartial" class="fh-fixedHeader col-md-10 col-sm-8 main-content">
                                <table id="schedule" class="display table-condensed table table-hover table-bordered dt-responsive responsive-display" style="width:100%">
                                    <thead style="height: ">
                                        <tr>
                                            <th>Cépage</th>
                                            <th>Qualité moyenne des vins (/10)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php require_once("requetes/compare_cepage_qualite.php") ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <h3>Relation entre la qualité des vins et la moyenne du nombre de traitements qu'ils ont subi</h3><br>
                            <div id="loadpartial" class="fh-fixedHeader col-md-10 col-sm-8 main-content">
                                <table id="schedule" class="display table-condensed table table-hover table-bordered dt-responsive responsive-display" style="width:100%">
                                    <thead style="height: ">
                                        <tr>
                                            <th>Note qualité (/10)</th>
                                            <th>Moyenne de nombre de traitement</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php require_once("requetes/compare_traitement_qualite.php") ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <h3>Mise en parallèle des évènements climatiques et du prix unitaire de vente des vins (par type, puis par prix croissant)</h3><br>
                            <div id="loadpartial" class="fh-fixedHeader col-md-10 col-sm-8 main-content">
                                <table id="schedule" class="display table-condensed table table-hover table-bordered dt-responsive responsive-display" style="width:100%">
                                    <thead style="height: ">
                                        <tr>
                                            <th>Type de l'évenement climatique</th>
                                            <th>Intensité de l'évènement (/10)</th>
                                            <th>Prix de la vente du vin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php require_once("requetes/compare_evtclimat_prix.php") ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="static/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="static/js/bootstrap.min.js"></script>

        <!-- Menu Toggle Script -->
        <!-- <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        </script> -->

    </body>
</html>
