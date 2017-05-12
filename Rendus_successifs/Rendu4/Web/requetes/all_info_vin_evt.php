<?php

require_once "connect.php";
$connexion = fConnect();

$nom_vin=$_GET["nom_vin"];
$annee_vin=$_GET["annee_vin"];

$sql = "SELECT Evt_climat.type, Toucher.intensite, Toucher.annee_cult, Toucher.id_cadastre FROM Vin NATURAL JOIN Assembler NATURAL JOIN Culture NATURAL JOIN Toucher NATURAL JOIN Evt_climat WHERE Vin.nom_vin=$1 AND Vin.annee_vin=$2";
$result = pg_prepare($connexion, "afficheEvt", $sql);
$display_evt = pg_execute($connexion, "afficheEvt",array($nom_vin, $annee_vin));


if ($display_evt){
    while ($result = pg_fetch_array($display_evt)) {
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
