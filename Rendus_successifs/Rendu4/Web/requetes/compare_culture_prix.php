<?php
    require_once "connect.php";
    $connexion = fConnect();

    $sql = "SELECT Culture.cepage ,Culture.annee_cult, Culture.tonte, Culture.taille, Vente.prix_unitaire FROM Etre_vendu NATURAL JOIN Vin NATURAL JOIN Vente NATURAL JOIN Assembler NATURAL JOIN Culture ORDER BY Culture.cepage, Vente.prix_unitaire DESC";
    $query = pg_query($connexion, $sql);
    $i = 0;
    if ($query){
        while ($result = pg_fetch_array($query)) {
            if($i<=9){
                echo "<tr>";
                    echo "<td>$result[0]</td>";
                    echo "<td>$result[1]</td>";
                    echo "<td>$result[2]</td>";
                    echo "<td>$result[3]</td>";
                    echo "<td>$result[4]</td>";
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
