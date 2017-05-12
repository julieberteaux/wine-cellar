<?php

require_once "connect.php";
$connexion = fConnect();

$nom_vin=$_GET["nom_vin"];
$annee_vin=$_GET["annee_vin"];

$sql="SELECT Etre_vendu.nombre_l, Vente.prix_unitaire, Vente.circuit FROM Vin NATURAL JOIN Etre_vendu NATURAL JOIN Vente WHERE Vin.nom_vin=$1 AND Vin.annee_vin=$2";
$result = pg_prepare($connexion, "afficheVente", $sql);
$display_vente = pg_execute($connexion, "afficheVente",array($nom_vin, $annee_vin));

if ($display_vente){
    while ($result = pg_fetch_array($display_vente)) {
        echo "<tr>";
            echo "<td>$result[0]</td>";
            echo "<td>$result[1]</td>";
            echo "<td>$result[2]</td>";
        echo "</tr>";
    }

    pg_close($connexion);
}
else{
    echo pg_last_error($connexion);
    pg_close($connexion);
}
