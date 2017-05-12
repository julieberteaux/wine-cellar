<?php
    require_once "connect.php";
    $connexion = fConnect();

    $sql = "SELECT Culture.cepage, AVG(Vin.note_qualite) as moy_qualite FROM  Vin NATURAL JOIN Culture NATURAL JOIN Assembler GROUP BY Culture.cepage ORDER BY moy_qualite DESC";
    $query = pg_query($connexion, $sql);
    if ($query){
        $i = 0;
        while ($result = pg_fetch_array($query)) {
            if($i<=9){
                echo "<tr>";
                    echo "<td>$result[0]</td>";
                    echo "<td>".number_format($result[1], 2)."</td>";
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
