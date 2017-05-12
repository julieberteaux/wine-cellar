<?php

require_once "connect.php";
$connexion = fConnect();

$nom_vin=$_GET["nom_vin"];
$annee_vin=$_GET["annee_vin"];

$sql = "SELECT Culture.cepage, Culture.annee_cult, Culture.id_cadastre, Culture.tonte, Culture.nb_traitement, Assembler.proportion FROM Vin NATURAL JOIN Assembler NATURAL JOIN Culture WHERE Vin.nom_vin=$1 AND Vin.annee_vin=$2";
$result = pg_prepare($connexion, "afficheCult", $sql);
$display_cult = pg_execute($connexion, "afficheCult",array($nom_vin, $annee_vin));

if ($display_cult){
    while ($result = pg_fetch_array($display_cult)) {
        echo "<tr>";
            echo "<td>$result[0]</td>";
            echo "<td>$result[1]</td>";
            echo "<td>$result[2]</td>";
            echo "<td>$result[3]</td>";
            echo "<td>$result[4]</td>";
            echo "<td>$result[5]</td>";
        echo "</tr>";
    }
    pg_close($connexion);
}
else{
    echo pg_last_error($connexion);
    pg_close($connexion);
}
