<?php

require_once "../connect.php";
$connexion = fConnect();

$result = pg_prepare($connexion, "deleteVinVendu", 'DELETE FROM Etre_vendu WHERE nom_vin = $1 AND annee_vin = $2');
$result = pg_execute($connexion, "deleteVinVendu", array($_GET['nom_vin'] ,$_GET['annee_vin']));

if ($result){
    $result = pg_prepare($connexion, "deleteVinComposer", 'DELETE FROM Composer WHERE nom_vin = $1 AND annee_vin = $2');
    $result = pg_execute($connexion, "deleteVinComposer", array($_GET['nom_vin'] ,$_GET['annee_vin']));

    if ($result){
        $result = pg_prepare($connexion, "deleteVinAssembler", 'DELETE FROM Assembler WHERE nom_vin = $1 AND annee_vin = $2');
        $result = pg_execute($connexion, "deleteVinAssembler", array($_GET['nom_vin'] ,$_GET['annee_vin']));

        if ($result){
            $result = pg_prepare($connexion, "deleteVin", 'DELETE FROM Vin WHERE nom_vin = $1 AND annee_vin = $2');
            $result = pg_execute($connexion, "deleteVin", array($_GET['nom_vin'] ,$_GET['annee_vin']));

            if ($result){
                pg_close($connexion);
                header("Location: ../lesvins.php");
            }
            else{
                echo pg_last_error($connexion);
                pg_close($connexion);
            }
        }
        else{
            echo pg_last_error($connexion);
            pg_close($connexion);
        }
    }
    else{
        echo pg_last_error($connexion);
        pg_close($connexion);
    }
}
else{
    echo pg_last_error($connexion);
    pg_close($connexion);
}
