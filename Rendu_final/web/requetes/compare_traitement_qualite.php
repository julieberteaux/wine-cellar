<?php
    require_once "connect.php";
    $connexion = fConnect();

    $sql = "SELECT Vin.note_qualite, AVG(Culture.nb_traitement) AS moy_nb_traitement FROM Culture NATURAL JOIN Assembler NATURAL JOIN Vin GROUP BY note_qualite ORDER BY note_qualite DESC ";
    $query = pg_query($connexion, $sql);
    if ($query){
        while ($result = pg_fetch_array($query)) {
                echo "<tr>";
                    echo "<td>$result[0]</td>";
                    echo "<td>".number_format($result[1], 2)."</td>";
                echo "</tr>";
        }
        pg_close($connexion);
    }
    else{
        echo pg_last_error($connexion);
        pg_close($connexion);
    }
