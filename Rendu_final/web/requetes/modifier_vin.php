<?php
    require_once "../connect.php";
    $connexion = fConnect();

    $nom = $_GET['nom_vin'];
    $annee = $_GET['annee_vin'];

    $result = pg_prepare($connexion, "insertVin", 'INSERT INTO Vin (nom_vin,annee_vin,quantite_restante,couleur,note_qualite) VALUES  ($1, $2, $3, $4, $5)');
    $result = pg_execute($connexion, "insertVin", array($nom ,$annee, $quantite, $couleur,$qualite));

    if ($query){
        pg_close($connexion);
        header('Location: ../lesvins.php');
    }
    else{
        echo pg_last_error($connexion);
        pg_close($connexion);
    }
