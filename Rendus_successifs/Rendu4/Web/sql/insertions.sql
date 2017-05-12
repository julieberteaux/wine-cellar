INSERT INTO Vente (id_vente, prix_unitaire, circuit)
VALUES  (1, 45, 'direct'),
        (2, 67, 'grossiste'),
        (3, 67, 'detaillant'),
        (4, 20, 'detaillant');


INSERT INTO Vin (nom_vin,annee_vin,quantite_restante,couleur,note_qualite)
    VALUES  ('Haut-médoc',1985,12,'rouge',8),
	    ('Haut-médoc',1996,19,'rouge',6),
            ('Graves',1980,22,'rouge',8),
            ('Vin diousse',1955,23,'blanc',5),
            ('Vin et un',1885,25,'blanc',9),
            ('Givry',1985,50,'rouge',7),
            ('Chablis grand cru',1999,62,'blanc',8),
            ('Chambertin',2012,43,'rouge',5),
            ('Cabernet d Anjou',2014,56,'rose',7),
            ('Céron',2015,16,'blanc',4),
            ('Cadillac',2014,50,'blanc',9),
            ('Beaujolais',2014,50,'rose',7),
            ('Givry',2016,25,'rouge',6),
            ('Chablis grand cru',2014,19,'blanc',8),
            ('Chambertin',2016,50,'rouge',6),
            ('Cabernet d Anjou',2017,90,'rose',7),
            ('Beaujolais',2005,58,'rouge',8),
            ('Cadillac',2010,48,'blanc',9),
            ('Beaujolais',2003,69,'rose',7);


INSERT INTO Parcelle (id_cadastre, sol, surface, exposition)
    VALUES  (1, 'argile',34.6, 'sud'),
            (2, 'terre',56.3, 'nord'),
            (3, 'cailloux',42.9, 'est'),
            (4, 'grais',89.5, 'ouest');


INSERT INTO Culture (id_cadastre,annee_cult,nb_traitement,tonte,taille,cepage)
    VALUES  (1,1985,0,'tonte fine',12,'raisin blanc'),
    		(1,2000,6,'tonte fine',10,'raisin blanc'),
    		(1,2004,12,'tonte fine',18,'raisin rouge'),
    		(1,2008,0,'tonte fine',12,'raisin blanc'),
            (2,1980,4,'tonte fine',18,'raisin rouge'),
            (2,1999,8,'tonte naturelle',14,'raisin rouge'),
            (2,2004,4,'tonte fine',15,'raisin rouge'),
            (2,2012,4,'tonte fine',18,'raisin rouge'),
	    	(3,1980,2,'tata',15,'raisin rouge'),
	    	(3,2003,0,'tonte fine',12,'raisin blanc'),
	    	(3,2008,2,'tonte fine',12,'raisin blanc'),
	    	(3,2015,0,'tonte fine',12,'raisin blanc'),
	   	 	(4,2016,4,'tutu',15,'raisin bleu'),
	   	 	(4,2009,4,'tutu',15,'raisin noir'),
            (3,1256,50,'tonte naturelle',55,'raisin noir');


INSERT INTO  Evt_climat (id_evt, type)
    VALUES  (1, 'grele'),
            (2, 'ouragan'),
            (3, 'tsunami'),
            (4, 'tempete'),
	    (5, 'ouragan');


INSERT INTO  Composant ( nom_compo,  unite)
    VALUES  ('eau', 'g/l'),
            ('ethanol', 'g/l'),
            ('methane', 'g/l'),
            ('sucre', 'g/l'),
            ('sodium', 'mg/l');

INSERT INTO Toucher ( id_evt, id_cadastre, annee_cult, intensite)
    VALUES (1, 1, 1985, 5),
	   (2, 3, 2008, 10),
	   (3, 2, 1980, 4),
 	   (4, 3, 2003, 4),
 	   (5, 2, 1999, 6),
 	   (2, 2, 1980, 2),
	   (5, 3, 2015, 3),
	   (1, 4, 2009, 3),
	   (3, 1, 2000, 3);

INSERT INTO Assembler ( nom_vin, annee_vin, id_cadastre, annee_cult, proportion)
	VALUES	('Givry',2016, 2, 2012, 40),
		('Givry',2016, 3, 2015, 30),
		('Givry',2016, 1, 2008, 30),
		('Chablis grand cru',2014, 3, 2008, 10),
		('Chablis grand cru',2014, 1, 1985, 10),
		('Chablis grand cru',2014, 4, 2009,45),
		('Chablis grand cru',2014, 2, 1980,35),
		('Chambertin',2016, 1, 2000,55),
		('Chambertin',2016, 2, 2004,45),
		('Cadillac',2010, 3, 2008,60),
		('Cadillac',2010, 1, 2004,40),
		('Beaujolais',2005, 3, 2003,25),
		('Beaujolais',2005, 2, 1999,25),
		('Beaujolais',2005, 1, 2004,50);

INSERT INTO Composer (nom_vin, annee_vin, nom_compo, pourcentage_l)
	VALUES	('Beaujolais',2005, 'eau', 80),
		('Beaujolais',2005, 'ethanol', 14),
		('Beaujolais',2005, 'sucre', 6),
		('Vin diousse',1955, 'eau', 95),
		('Cadillac',2010, 'methane', 5),
		('Vin et un', 1885, 'sodium', 45);

INSERT INTO Etre_vendu ( nom_vin, annee_vin, id_vente, nombre_l)
	VALUES	('Beaujolais',2005, 1, 79),
		('Cadillac',2010, 2, 28),
		('Chablis grand cru',2014, 4, 55),
		('Vin diousse',1955, 3, 15),
		('Chambertin',2016, 2, 19);
