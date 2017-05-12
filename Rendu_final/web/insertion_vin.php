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
                        <h1>Ajouter un nouveau vin</h1>

                    </div>

                     <form method="POST" action="requetes/inserer_vin.php">
                      <div class="form-group">
                        <label for="nom">Nom du vin :</label>
                        <input type="text" class="form-control" id="nom" name="nom">
                      </div>
                      <div class="form-group">
                        <label for="annee">Annee :</label>
                        <input type="int" min="0" class="form-control" id="annee" name="annee">
                      </div>
                      <div class="form-group">
                        <label for="couleur">Couleur :</label>
                        <input type="text" class="form-control" id="couleur" name="couleur">
                      </div>
                      <div class="form-group">
                        <label for="quantite">Quantité en L :</label>
                        <input type="number" min="0" class="form-control" id="quantite" name="quantite">
                      </div>
                    <div class="form-group">
                        <label for="qualite">Note de qualite (sur 10) :</label>
                        <input type="number" min="0" max ="10" class="form-control" id="qualite" name="qualite">
                      </div>

                      <div class = "form-group">
                        <label for="culture"> Culture principale du vin : </label> <i> (Vous pourrez ajouter d'autres cultures pour ce vin dans la fiche-vin qui lui sera associée, une fois celui-ci créé) </i>

                          <select class = "form-control" name="culture">
                            <?php
                                require_once("requetes/select_all_parcelles_select_parsed.php");
                            ?>
                          </select>
                       </div>

                       <div class="form-group">
                        <label for="proportion">Proportion du cépage (sur 100) : </label>
                        <input type="number" min="0" max ="100" class="form-control"  name="proportion">
                      </div>

                      <button type="submit" class="btn btn-default">Valider</button>


                    </form>



                </div>
            </div>
        </div>
</html>
