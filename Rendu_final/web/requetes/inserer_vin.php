<?php
require_once "../connect.php";
$connexion = fConnect();

$nom = $_POST['nom'];
$annee =$_POST['annee'];
$qualite = $_POST['qualite'];
$couleur = $_POST['couleur'];
$quantite = $_POST['quantite'];
$culture = $_POST['culture'];
$proportion = $_POST['proportion'];


$id_cadastre="";
$annee_cult="";
$i=0;
//pour séparer l'id_cadastre de l'annee
while ($culture[$i] != '-')
{
	$id_cadastre.=$culture[$i];
	$i++;
}
$k=0;
$i++;
//on remplit l'annee
//for ($j=$i+1; $j<strlen($culture);$j++)
while ($i<strlen($culture))
{
	$annee_cult.=$culture[$i];
	$i++;
}


//insertion dans la table Vin
$result = pg_prepare($connexion, "insertVin", 'INSERT INTO Vin (nom_vin,annee_vin,quantite_restante,couleur,note_qualite) VALUES  ($1, $2, $3, $4, $5)');
$result = pg_execute($connexion, "insertVin", array($nom ,$annee, $quantite, $couleur,$qualite));

if ($result){
	//insertion dans la table Assembler
	$result = pg_prepare($connexion, "insertAssembler", 'INSERT INTO Assembler ( nom_vin, annee_vin, id_cadastre, annee_cult, proportion) VALUES  ($1, $2, $3, $4, $5)');
	$result = pg_execute($connexion, "insertAssembler", array($nom ,$annee, $id_cadastre, $annee_cult, $proportion));

	if ($result){
		pg_close($connexion);
		header('Location: ../lesvins.php');
	}
	else{
		echo pg_last_error($connexion);
		pg_close($connexion);
	}
}
else{
	echo pg_last_error($connexion);
	pg_close($connexion);
}
