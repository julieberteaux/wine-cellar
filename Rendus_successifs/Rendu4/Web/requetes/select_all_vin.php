<?php
    require_once "connect.php";
    $connexion = fConnect();

    $sql = "SELECT * FROM Vin ORDER BY nom_vin, note_qualite DESC";
    $query = pg_query($connexion, $sql);

    if ($query){
        while ($result = pg_fetch_array($query)) {
            echo "<tr>";
            echo "<td><a href=\"fiche_vin.php?nom_vin=$result[0]&annee_vin=$result[1]\">$result[0]</a></td>";
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
