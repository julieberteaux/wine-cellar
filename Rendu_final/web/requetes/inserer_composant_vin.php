<?php
require_once "../connect.php";
$connexion = fConnect();

$nom = $_POST['nom'];
$annee = $_POST['annee'];
$composant = $_POST['composant'];
$pourcentage= $_POST['pourcentage'];

//Check if the pourcetage is ok
$sql = "SELECT SUM(pourcentage_l) FROM Vin NATURAL JOIN Composer WHERE nom_vin=$1 AND annee_vin=$2 GROUP BY nom_vin, annee_vin ";
$result = pg_prepare($connexion, "getProportionsVin", $sql);
$result = pg_execute($connexion, "getProportionsVin", array($nom ,$annee));

if ($result){
    $sum=0;
    while ($proportion = pg_fetch_array($result)) {
        $sum = $sum+$proportion[0];
    }
    // echo "sum =".$sum;
    if($sum+$pourcentage>100){
        $restant = 100-$sum;
        echo "Desole le pourcentage est trop important. Avec une composition deja de ".$sum.", vous n'auriez pu ajouter que ".$restant."% du composant ".$composant;
        echo "<br>Veuillez reessayer.";
    }
    else{
        $result = pg_prepare($connexion, "insertComposer", 'INSERT INTO Composer (nom_vin,annee_vin,nom_compo,pourcentage_l) VALUES  ($1, $2, $3, $4)');
        $result = pg_execute($connexion, "insertComposer", array($nom ,$annee, $composant, $pourcentage));

        if ($result){
            pg_close($connexion);
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
        else{
            echo pg_last_error($connexion);
            pg_close($connexion);
        }
    }
}
else{
	echo pg_last_error($connexion);
	pg_close($connexion);
}
