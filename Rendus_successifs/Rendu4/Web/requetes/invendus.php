<?php
    require_once "connect.php";
    $connexion = fConnect();

    $sql = "SELECT * FROM Vin WHERE nom_vin NOT IN (SELECT nom_vin FROM Vin NATURAL JOIN Etre_vendu) OR annee_vin NOT IN (SELECT annee_vin FROM Vin NATURAL JOIN Etre_vendu) ORDER BY nom_vin";
    //TODO a mettre sur le drive
    $query = pg_query($connexion, $sql);
    if ($query){
        while ($result = pg_fetch_array($query)) {
                echo "<tr>";
                    echo "<td>$result[0]</td>";
                    echo "<td>$result[1]</td>";
                    echo "<td>$result[2]</td>";
                    echo "<td>$result[3]</td>";
                    echo "<td>$result[4]</td>";
                echo "</tr>";
        }
        pg_close($connexion);
    }
    else{
        echo pg_last_error($connexion);
        pg_close($connexion);
    }
