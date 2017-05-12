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
                    <h2><?php echo $_GET["nom_vin"] ."(".$_GET["annee_vin"].")" ; ?></h2>
                    <div class="col-lg-12">
                        <h3> Infos générales : </h3><br>
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
                                    <?php
                                        require_once "requetes/single_vin_info.php";
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3> Culture(s) associée(s) : </h3><br>
                        <div id="loadpartial" class="fh-fixedHeader col-md-10 col-sm-8 main-content">
                  			<table id="schedule" class="display table-condensed table table-hover table-bordered dt-responsive responsive-display" style="width:100%">
                  				<thead style="height: ">
                                    <tr>
                              <th>Cépage</th>
                  						<th>Année de la culture</th>
                  						<th>Id cadastre</th>
                  						<th>Tonte</th>
                  						<th>Nombre de traitements</th>
                  						<th>Proportion dans le vin (%)</th>
                  					</tr>
                  				</thead>
                  				<tbody>
                                    <?php
                                        require_once "requetes/all_info_vin_cult.php";
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3> Parcelle(s) associée(s) : </h3><br>
                        <div id="loadpartial" class="fh-fixedHeader col-md-10 col-sm-8 main-content">
                  			<table id="schedule" class="display table-condensed table table-hover table-bordered dt-responsive responsive-display" style="width:100%">
                  				<thead style="height: ">
                                    <tr>
                                        <th>Identifiant cadastre</th>
                  						<th>Type de sol</th>
                                        <th>Exposition</th>
                  						<th>Surface</th>
                  					</tr>
                  				</thead>
                  				<tbody>
                                    <?php
                                        require_once "requetes/all_info_vin_parcelles.php";
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3> Evenements climatiques survenus : </h3><br>
                        <div id="loadpartial" class="fh-fixedHeader col-md-10 col-sm-8 main-content">
                  			<table id="schedule" class="display table-condensed table table-hover table-bordered dt-responsive responsive-display" style="width:100%">
                  				<thead style="height: ">
                                    <tr>
                  						<th>Type d'événement</th>
                  						<th>Intensité</th>
                  						<th>Année de la culture</th>
                  						<th>Identifiant du cadastre</th>
                  					</tr>
                  				</thead>
                  				<tbody>
                                    <?php
                                        require_once "requetes/all_info_vin_evt.php";
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3> Ventes : </h3><br>
                        <div id="loadpartial" class="fh-fixedHeader col-md-10 col-sm-8 main-content">
                  			<table id="schedule" class="display table-condensed table table-hover table-bordered dt-responsive responsive-display" style="width:100%">
                  				<thead style="height: ">
                                    <tr>
                  						<th>Nombre de litres vendus</th>
                  						<th>Prix unitaire</th>
                  						<th>Circuit de vente</th>
                  					</tr>
                  				</thead>
                  				<tbody>
                                    <?php
                                        require_once "requetes/all_info_vin_vente.php";
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3> Composition : </h3><br>
                        <div id="loadpartial" class="fh-fixedHeader col-md-10 col-sm-8 main-content">
                  			<table id="schedule" class="display table-condensed table table-hover table-bordered dt-responsive responsive-display" style="width:100%">
                  				<thead style="height: ">
                                    <tr>
                  						<th>Nom du composant</th>
                  						<th>Pourcentage</th>
                  						<th>Unité</th>
                  					</tr>
                  				</thead>
                  				<tbody>
                                    <?php
                                        require_once "requetes/all_info_vin_compo.php";
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <h3>Changer la qualité du vin ?</h3><br>
                        <form method="POST" action="requetes/update.php">
                          <div class="form-group">
                            <label for="qualite">Note de qualite (sur 10) :</label>
                            <input type="number" min="0" max =10 class="form-control" id="qualite" name="qualite" >
                            <input type="hidden" name="nom" value="<?php echo $_GET['nom_vin']; ?>">
                            <input type="hidden" name="annee" value="<?php echo $_GET['annee_vin']; ?>">
                          </div>
                        <button type="submit" class="btn btn-default">Valider</button>
                        </form>
                    </div>
                </div>
                <form method="POST" action="requetes/inserer_composant_vin.php">
                    <div class="row">
                    <h3>Ajouter un composant ?</h3><br>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label for="qualite">Proportion (/100) :</label>
                            <input type="number" min="0" max =100 class="form-control" id="pourcentage" name="pourcentage" >
                            <input type="hidden" name="nom" value="<?php echo $_GET['nom_vin']; ?>">
                            <input type="hidden" name="annee" value="<?php echo $_GET['annee_vin']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="culture">Composant</label>
                            <select class = "form-control" name="composant">
                                <?php
                                require_once("requetes/select_all_composants.php");
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-default">Ajouter</button>
                    </div>
                    </form>
                <div class="row">
                    <div class="col-lg-4">
                        <h3>Ajouter une culture ?</h3><br>
                        <p>To come...</p><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <h3>Supprimer ce vin ?</h3><br>
                        <a <?php echo "href=\"requetes/delete_vin.php?nom_vin=".$_GET['nom_vin']."&annee_vin=".$_GET['annee_vin']."\""; ?> class="btn btn-danger" role="button">Supprimer</a>
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
