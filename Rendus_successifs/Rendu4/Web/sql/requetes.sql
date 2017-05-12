SELECT *
FROM Vin
WHERE note_qualite >= 8;

SELECT Parcelle.*
FROM Culture NATURAL JOIN Parcelle 
WHERE nb_traitement >= 2 AND Culture.id_cadastre=Parcelle.id_cadastre;            

SELECT Parcelle .*, type, intensite
FROM Toucher NATURAL JOIN Parcelle NATURAL JOIN Evt_climat
WHERE annee_cult = 2016;

SELECT Assembler.nom_vin, Culture.cepage
FROM Culture NATURAL JOIN Assembler
WHERE Assembler.id_cadastre=Culture.id_cadastre AND Assembler.annee_cult=Culture.annee_cult AND nom_vin='bon vin';

SELECT Assembler.nom_vin, Culture.cepage
FROM Culture NATURAL JOIN Assembler
WHERE Assembler.id_cadastre=Culture.id_cadastre AND Assembler.annee_cult=Culture.annee_cult ORDER BY nom_vin;

SELECT *
FROM Vin
WHERE couleur='blanc';

SELECT *
FROM Vin
WHERE quantite_restante>50 ;

SELECT *
FROM Composer
WHERE nom_compo = 'ethanol' AND pourcentage_l > 10 ;

SELECT  Vin.nom_vin, Vin.annee_vin, Vente.prix_unitaire, Culture.cepage ,Culture.annee_cult, Culture.tonte, Culture.taille  
FROM Etre_vendu NATURAL JOIN Vin NATURAL JOIN Vente NATURAL JOIN Assembler NATURAL JOIN Culture
ORDER BY Culture.tonte;


SELECT Vin.note_qualite, Vin.nom_vin, Culture.cepage, Culture.tonte, Culture.taille
FROM Culture NATURAL JOIN Assembler NATURAL JOIN Vin
WHERE Assembler.proportion=(Select MAX(proportion) FROM Assembler) AND Vin.note_qualite =8;

SELECT  Vin.nom_vin, Vin.annee_vin, Vente.prix_unitaire, Etre_vendu.id_vente, Evt_climat.type, Toucher.intensite
FROM  Vente NATURAL JOIN Etre_vendu NATURAL JOIN Assembler NATURAL JOIN Toucher NATURAL JOIN Evt_climat NATURAL JOIN Vin 
WHERE Evt_climat.id_evt=3;

SELECT Vin.nom_vin, Vin.note_qualite, Culture.nb_traitement, Culture.id_cadastre, Culture.annee_cult
FROM Culture NATURAL JOIN Assembler NATURAL JOIN Vin;
