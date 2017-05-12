<?php
    require_once "connect.php";
    $connexion = fConnect();

    $sql = "SELECT Evt_climat.type, Toucher.intensite, Vente.prix_unitaire FROM  Vente NATURAL JOIN Etre_vendu NATURAL JOIN Assembler NATURAL JOIN Toucher NATURAL JOIN Evt_climat NATURAL JOIN Vin ORDER BY type, prix_unitaire";
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
