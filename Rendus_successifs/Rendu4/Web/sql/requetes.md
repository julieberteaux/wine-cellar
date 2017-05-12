Sélectionne toutes les infos relatives à la composition du vin:

`SELECT Composer.nom_compo, Composer.pourcentage_l, Composant.unite 
FROM Vin NATURAL JOIN Composer NATURAL JOIN Composant 
WHERE Vin.nom_vin=$1 AND Vin.annee_vin=$2;`


Sélectionne toutes les infos relatives aux cultures dont est issu le vin:

`SELECT Culture.cepage, Culture.annee_cult, Culture.id_cadastre, Culture.tonte, Culture.nb_traitement, Assembler.proportion 
FROM Vin NATURAL JOIN Assembler NATURAL JOIN Culture 
WHERE Vin.nom_vin=$1 AND Vin.annee_vin=$2;`


Sélectionne toutes les infos relatives aux évènements climatiques ayant touchés les cultures dont est issu le vin:

`SELECT Evt_climat.type, Toucher.intensite, Toucher.annee_cult, Toucher.id_cadastre 
FROM Vin NATURAL JOIN Assembler NATURAL JOIN Culture NATURAL JOIN Toucher NATURAL JOIN Evt_climat 
WHERE Vin.nom_vin=$1 AND Vin.annee_vin=$2;`


Sélectionne toutes les infos relatives aux parcelles dont est issu le vin:

`SELECT Culture.id_cadastre, Parcelle.sol, Parcelle.exposition, Parcelle.surface 
FROM Assembler NATURAL JOIN Culture NATURAL JOIN Parcelle 
WHERE Assembler.nom_vin=$1 AND Assembler.annee_vin=$2;`


Sélectionne toutes les infos relatives à la vente du vin:

`SELECT Etre_vendu.nombre_l, Vente.prix_unitaire, Vente.circuit 
FROM Vin NATURAL JOIN Etre_vendu NATURAL JOIN Vente 
WHERE Vin.nom_vin=$1 AND Vin.annee_vin=$2;`


Renvoie la qualité moyenne des vins contenant les différents cépages :

`SELECT Culture.cepage, AVG(Vin.note_qualite) as moy_qualite 
FROM  Vin NATURAL JOIN Culture NATURAL JOIN Assembler 
GROUP BY Culture.cepage 
ORDER BY moy_qualite DESC;`


Renvoie le mode de culture et le prix de vente pour chaque vin :

`SELECT Culture.cepage ,Culture.annee_cult, Culture.tonte, Culture.taille, Vente.prix_unitaire 
FROM Etre_vendu NATURAL JOIN Vin NATURAL JOIN Vente NATURAL JOIN Assembler NATURAL JOIN Culture 
ORDER BY Culture.cepage, Vente.prix_unitaire DESC;`


Renvoie le mode de culture et la quantité vendue pour chaque vin :

`SELECT nom_vin, annee_vin, SUM(nombre_l) AS nb_l_total 
FROM Vin NATURAL JOIN Etre_vendu 
GROUP BY nom_vin, annee_vin 
ORDER BY nb_l_total DESC;`


Renvoie les évènements climatiques ayant apparu lors de la culture de cépages ayant servi pour les vins, ainsi que les prix unitaires des vins
dont les cultures ont été touchées :

`SELECT Evt_climat.type, Toucher.intensite, Vente.prix_unitaire 
FROM  Vente NATURAL JOIN Etre_vendu NATURAL JOIN Assembler NATURAL JOIN Toucher NATURAL JOIN Evt_climat NATURAL JOIN Vin 
ORDER BY type, prix_unitaire;`


Renvoie le nombre de traitements moyen reçu pour l'ensemble des cultures ayant servies
pour la création du vin. On renvoie aussi la qualité du vin pour une comparaison :

`SELECT Vin.note_qualite, AVG(Culture.nb_traitement) AS moy_nb_traitement 
FROM Culture NATURAL JOIN Assembler NATURAL JOIN Vin 
GROUP BY note_qualite 
ORDER BY note_qualite DESC;`


Suppression d'un vin :

`DELETE FROM Etre_vendu WHERE nom_vin = $1 AND annee_vin = $2;`
`DELETE FROM Composer WHERE nom_vin = $1 AND annee_vin = $2;`
`DELETE FROM Assembler WHERE nom_vin = $1 AND annee_vin = $2;`
`DELETE FROM Vin WHERE nom_vin = $1 AND annee_vin = $2;`


Insertion d'un vin :

`INSERT INTO Vin (nom_vin,annee_vin,quantite_restante,couleur,note_qualite)
VALUES  ($1, $2, $3, $4, $5);`
`INSERT INTO Assembler ( nom_vin, annee_vin, id_cadastre, annee_cult, proportion)     
VALUES  ($1, $2, $3, $4, $5);`


Renvoie tous les vins qui n'ont jamais été vendus : 

`SELECT * 
FROM Vin 
WHERE nom_vin NOT IN (SELECT nom_vin FROM Vin NATURAL JOIN Etre_vendu) OR annee_vin NOT IN (SELECT annee_vin FROM Vin NATURAL JOIN Etre_vendu) 
ORDER BY nom_vin;`


Renvoie les vins triés selon leur note de qualité, de la meilleure à la moins bonne :

`SELECT * 
FROM Vin 
ORDER BY note_qualite DESC, nom_vin;`


Renvoie les vins triés selon le nombre de litres vendus :

`SELECT nom_vin, annee_vin, SUM(nombre_l) AS nb_l_total 
FROM Vin NATURAL JOIN Etre_vendu 
GROUP BY nom_vin, annee_vin 
ORDER BY nb_l_total DESC;`


Renvoie toutes les cultures triées selon leur année :

`SELECT * 
FROM Culture 
ORDER BY annee_cult;`


Renvoie toutes les parcelles triées selon leur surface :

`SELECT * 
FROM Parcelle 
ORDER BY surface;`


Renvoie tous les vins triés par ordre alphabétique et par note de qualité décroissante : 

`SELECT * 
FROM Vin 
ORDER BY nom_vin, note_qualite DESC;`


Renvoie des vins de nom $1 et datant de l'année $2 :

`SELECT * 
FROM Vin 
WHERE Vin.nom_vin=$1 AND Vin.annee_vin=$2;`


Modification de la note de qualité d'un vin :

`UPDATE Vin 
SET note_qualite = $1 
WHERE nom_vin = $2 AND annee_vin = $3;`