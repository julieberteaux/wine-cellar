<?php
    require_once "connect.php";
    $connexion = fConnect();

    $sql = 'SELECT * FROM Parcelle order by surface';
    $query = pg_query($connexion, $sql);
    if ($query){
    while ($result = pg_fetch_array($query)) {
        echo "<tr>";
            echo "<td>$result[0]</td>";
            echo "<td>$result[1]</td>";
            echo "<td>$result[2]</td>";
            echo "<td>$result[3]</td>";
        echo "</tr>";
    }
    pg_close($connexion);
    }
    else{
        echo pg_last_error($connexion);
        pg_close($connexion);
    }
