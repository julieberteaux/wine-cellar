<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


 <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Modifier la qualité d'un vin</h1>
                        
                    </div>

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
                                        require_once "requetes/select_all_vin_modif.php";
                                    ?>
                                </tbody>
                            </table>


			
                   


                          
                    
                </div>
            </div>
        </div>
