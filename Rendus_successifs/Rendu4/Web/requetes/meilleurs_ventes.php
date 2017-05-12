<?php
    require_once "connect.php";
    $connexion = fConnect();

    $sql = "SELECT nom_vin, annee_vin, SUM(nombre_l) AS nb_l_total FROM Vin NATURAL JOIN Etre_vendu GROUP BY nom_vin, annee_vin ORDER BY nb_l_total DESC";
    //TODO a mettre sur le drive
    $query = pg_query($connexion, $sql);
    if ($query){
        $i = 0;
        while ($result = pg_fetch_array($query)) {
            if($i<=9){
                echo "<tr>";
                    echo "<td>$result[0]</td>";
                    echo "<td>$result[1]</td>";
                    echo "<td>$result[2]</td>";
                echo "</tr>";
            }
            $i++;
        }
        pg_close($connexion);
    }
    else{
        echo pg_last_error($connexion);
        pg_close($connexion);
    }
