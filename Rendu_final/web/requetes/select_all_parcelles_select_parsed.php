<?php

    require_once "connect.php";
    $connexion = fConnect();

    $sql = 'SELECT * FROM Culture order by id_cadastre';
    $query = pg_query($connexion, $sql);
    if ($query){
        while ($result = pg_fetch_array($query)) {
          echo " <option value = '$result[0]-$result[1]'> ";
              echo "$result[0]-$result[1]-$result[2]-$result[3]-$result[5]";
          echo "</option>";
        }
        pg_close($connexion);
    }
    else{
        echo pg_last_error($connexion);
        pg_close($connexion);
    }
