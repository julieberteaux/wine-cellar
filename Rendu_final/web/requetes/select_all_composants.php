<?php

    require_once "connect.php";
    $connexion = fConnect();

    $nom_vin=$_GET['nom_vin'];
    var_dump($nom_vin);
    $annee_vin=$_GET['annee_vin'];
    var_dump($annee_vin);

    // $sql = 'SELECT * FROM Composant WHERE nom_compo NOT IN (SELECT nom_compo FROM Composer WHERE nom_vin=\''.$nom_vin.'\' AND annee_vin =\''.$annee_vin.'\' ) ORDER BY nom_compo  ';
    // $query = pg_query($connexion, $sql);
    $sql = "SELECT * FROM Composant WHERE nom_compo NOT IN (SELECT nom_compo FROM Composer WHERE nom_vin=$1 AND annee_vin=$2) ORDER BY nom_compo  ";
    $result = pg_prepare($connexion, "SelectComposant", $sql);
    $query = pg_execute($connexion, "SelectComposant", array($nom_vin ,$annee_vin));



    if ($query){
        while ($result = pg_fetch_array($query)) {
          echo " <option value = $result[0]> ";
              echo "$result[0] ($result[1])";
          echo "</option>";
        }
        pg_close($connexion);
    }
    else{
        echo pg_last_error($connexion);
        pg_close($connexion);
    }
