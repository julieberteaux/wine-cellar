<?php
//###########################   select   ##############################

$result = pg_query($connexion,"selectVin", 'SELECT * FROM Vin order by nom_vin');
var_dump(pg_fetch_all($result));

$result = pg_query($connexion,"selectParcelle", 'SELECT * FROM Parcelle order by surface');
var_dump(pg_fetch_all($result));

$result = pg_query($connexion,"selectCulture", 'SELECT * FROM Culture order by annee_cult');
var_dump(pg_fetch_all($result));

$result = pg_prepare($connexion, "selectQualite", 'SELECT * FROM Vin WHERE note_qualite > $1');
$result = pg_execute($connexion, "selectQualite", 8);

$result = pg_prepare($connexion, "selectCouleur", 'SELECT * FROM Vin WHERE couleur == $1');
$result = pg_execute($connexion, "selectCouleur ", ‘blanc’);


$result = pg_prepare($connexion, "selectQuantite", 'SELECT * FROM Vin WHERE quantite_restante > $1');
$result = pg_execute($connexion, "selectQuantite", 50);


$result = pg_prepare($connexion, "selectCompo", 'SELECT * FROM Composer WHERE nom_compo = $1 AND pourcentage_l > $2');
$result = pg_execute($connexion, "selectCompo", ‘ethanol’, 10);


//#########################   select jointure  #####################

$result = pg_prepare($connexion, "ParcellesTouchees", 'SELECT Parcelle .*, type, intensite FROM Toucher NATURAL JOIN Parcelle NATURAL JOIN Evt_climat WHERE annee_cult = $1');
$result = pg_execute($connexion, "ParcellesTouchees", 2016);


$result = pg_prepare($connexion, "nbTraitement", 'SELECT Parcelle.* FROM Culture NATURAL JOIN Parcelle WHERE nb_traitement >= $1 AND Culture.id_cadastre=Parcelle.id_cadastre');
$result = pg_execute($connexion, "nbTraitement",2);


$result = pg_prepare($connexion, "nbTraitement", 'SELECT Assembler.nom_vin, Culture.cepage FROM Culture NATURAL JOIN Assembler WHERE Assembler.id_cadastre=Culture.id_cadastre AND Assembler.annee_cult=Culture.annee_cult AND nom_vin=$1');
$result = pg_execute($connexion, "nbTraitement",'bon vin');



$result = pg_query($connexion, "nbTraitement", 'SELECT Assembler.nom_vin, Culture.cepage FROM Culture NATURAL JOIN Assembler WHERE Assembler.id_cadastre=Culture.id_cadastre AND Assembler.annee_cult=Culture.annee_cult ORDER BY nom_vin');
var_dump(pg_fetch_all($result));


$result = pg_query($connexion, "prixCulture", 'SELECT  Vin.nom_vin, Vin.annee_vin, Vente.prix_unitaire, Culture.cepage ,Culture.annee_cult, Culture.tonte, Culture.taille  FROM Etre_vendu NATURAL JOIN Vin NATURAL JOIN Vente NATURAL JOIN Assembler NATURAL JOIN Culture ORDER BY Culture.tonte');
var_dump(pg_fetch_all($result));


$result = pg_prepare($connexion, "qualiteCepage", 'SELECT Vin.nom_vin, Vin.annee_vin, Vin.note_qualite, Culture.cepage, Assembler.proportion FROM ((Vin NATURAL JOIN Assembler) NATURAL JOIN Culture)
WHERE Vin.note_qualite = $1;');
$result = pg_execute($connexion, "qualiteCepage",8);


$result = pg_prepare($connexion, "climatPrix", 'SELECT Evt_climat.type, Evt_climat.intensite, Vin.nom_vin, Vin.prix_unitaire, Etre_vendu.id_vente FROM  Vente NATURAL JOIN Etre_vendu NATURAL JOIN Assembler NATURAL JOIN Toucher WHERE Evt_climat.id_evt=$1');
$result = pg_execute($connexion, "climatPrix",3);
$result = pg_prepare($connexion, "cultureCepageVin", 'SELECT Vin.note_qualite, Vin.nom_vin, Culture.cepage, Culture.tonte, Culture.taille FROM Culture NATURAL JOIN Assembler NATURAL JOIN Vin WHERE Assembler.proportion=(Select MAX(proportion) FROM Assembler) AND Vin.note_qualite =$1');
$result = pg_execute($connexion, "cultureCepageVin",8);

;



//#########################  insertions   ###########################


$result = pg_prepare($connexion, "insertVin", 'INSERT INTO Vin VALUES($1, $2, $3, $4, $5)');
$result = pg_execute($connexion, "insertVin",'Vin de Compi', 1987,53,'rose',8);

$result = pg_prepare($connexion, "insertParcelle", 'INSERT INTO Parcelle VALUES($1, $2, $3, $4)');
$result = pg_execute($connexion, "insertParcelle",1, 'argile',34.6, 'sud');

$result = pg_prepare($connexion, "insertVente", 'INSERT INTO Vente VALUES($1, $2, $3)');
$result = pg_execute($connexion, "inserVente",1, 45, 'direct');

$result = pg_prepare($connexion, "insertCulture", 'INSERT INTO Culture VALUES($1, $2, $3, $4, $5, $6)');
$result = pg_execute($connexion, "insertCulture",1,1985,3,'tonte fine',12,'raisin blanc');

$result = pg_prepare($connexion, "insertEvt_climat", 'INSERT INTO Evt_climat VALUES($1, $2)');
$result = pg_execute($connexion, "inserEvt_climat",1, 'grele');

$result = pg_prepare($connexion, "insertComposant", 'INSERT INTO Composant VALUES($1, $2)');
$result = pg_execute($connexion, "insertComposant",'eau', 90);



?>

//prepared requests
PREPARE Vinplan (text, int, real, text, int) AS
INSERT INTO Vin VALUES($nom_vin, $annee_vin, $quantite_restante, $couleur, $note_qualite);
EXECUTE Vinplan('vin de Compi',1987,53,'rose',8);

PREPARE Parcelleplan (int, text, float, text) AS
INSERT INTO Parcelle VALUES($id_cadastre, $sol, $surface, $exposition);
EXECUTE Parcelleplan(1, 'argile',34.6, 'sud');

PREPARE Venteplan (int,real, text) AS
INSERT INTO Vente VALUES($id_vente, $prix_unitaire, $circuit);
EXECUTE Venteplan(1, 45, 'direct');

PREPARE Cultureplan (int, int, int, text, text, text) AS
INSERT INTO Culture VALUES($id_cadastre, $annee_cult, $nb_traitement, $tonte, $taille, $cepage);
EXECUTE Cultureplan(1,1985,3,'tonte fine',12,'raisin blanc');

PREPARE Evt_climatplan (int,text) AS
INSERT INTO Evt_climat VALUES($id_evt, $type);
EXECUTE Evt_climatplan(1, 'grele');

PREPARE Composantplan (text, int) AS
INSERT INTO Composant VALUES($nom_compo, $unite);
EXECUTE Composantplan('eau', 90);

PREPARE selectVin (text, int, real, text, int) AS
SELECT * FROM Vin v order by v.nom_vin;
EXECUTE selectVin();
