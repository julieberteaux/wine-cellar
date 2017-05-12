<?php

    require_once "connect.php";
    $connexion = fConnect();

    $sql = "SELECT * FROM Vin ORDER BY note_qualite DESC, nom_vin ";
    $query = pg_query($connexion, $sql);
    if ($query){
        $i = 0;
        while ($result = pg_fetch_array($query)) {
            if($i<=9){
                echo "<tr>";
                    echo "<td><a href=\"fiche_vin.php?nom_vin=$result[0]&annee_vin=$result[1]\">$result[0]</a></td>";
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
