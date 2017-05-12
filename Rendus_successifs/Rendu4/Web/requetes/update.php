<?php

    require_once "../connect.php";
    $connexion = fConnect();

    $nom = $_POST['nom'];
    $annee =$_POST['annee'];
    $qualite = $_POST['qualite'];


    $result = pg_prepare($connexion, "updateQual", 'UPDATE Vin SET note_qualite = $1 WHERE nom_vin = $2 AND annee_vin = $3');
    $result = pg_execute($connexion, "updateQual", array($qualite,$nom ,$annee));

    if ($result){
        header("Location: ".$_SERVER['HTTP_REFERER']);
        pg_close($connexion);
    }
    else{
        echo pg_last_error($connexion);
        pg_close($connexion);
    }
