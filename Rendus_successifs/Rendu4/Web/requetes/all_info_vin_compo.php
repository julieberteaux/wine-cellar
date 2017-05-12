<?php

    require_once "connect.php";
    $connexion = fConnect();

    $nom_vin=$_GET["nom_vin"];
    $annee_vin=$_GET["annee_vin"];

    $sql="SELECT Composer.nom_compo, Composer.pourcentage_l, Composant.unite FROM Vin NATURAL JOIN Composer NATURAL JOIN Composant WHERE Vin.nom_vin=$1 AND Vin.annee_vin=$2";
    $result = pg_prepare($connexion, "afficheCompo", $sql);
    $display_compo = pg_execute($connexion, "afficheCompo",array($nom_vin, $annee_vin));

    if ($display_compo){
        while ($result = pg_fetch_array($display_compo)) {
            echo "<tr>";
                echo "<td>$result[0]</td>";
                echo "<td>$result[1]</td>";
                echo "<td>$result[2]</td>";
            echo "</tr>";
        }
        pg_close($connexion);
    }
    else{
        echo pg_last_error($connexion);
        pg_close($connexion);
    }
