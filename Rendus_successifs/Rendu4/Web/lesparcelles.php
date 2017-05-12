<!DOCTYPE html>
<html lang="en">

<head>

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
                        <h1>Les parcelles</h1>
                       
                    </div>
                </div>
            </div>
            <div id="loadpartial" class="fh-fixedHeader col-md-10 col-sm-8 main-content">
                <table id="schedule" class="display table-condensed table table-hover table-bordered dt-responsive responsive-display" style="width:100%">
                    <thead style="height: ">
                        <tr>
                            <th>Identifiant du cadastre</th>
                            <th>Type de sol</th>
                            <th>Surface</th>
                            <th>Exposition</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once "requetes/select_all_parcelles.php";
                        ?>
                    </tbody>
                </table>
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
