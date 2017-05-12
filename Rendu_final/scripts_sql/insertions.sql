INSERT INTO Vente (id_vente, prix_unitaire, circuit)
    VALUES  (1, 45, 'direct'),
            (2, 67, 'grossiste'),
            (3, 67, 'detaillant'),
            (4, 20, 'detaillant');


INSERT INTO Vin (nom_vin,annee_vin,quantite_restante,couleur,note_qualite)
    VALUES  ('Haut-médoc',1985,12,'Rouge',8),
    	    ('Haut-médoc',1996,19,'Rouge',6),
            ('Graves',1980,22,'Rouge',8),
            ('Vin diousse',1955,23,'Blanc',5),
            ('Vin et un',1885,25,'Blanc',9),
            ('Givry',1985,50,'Rouge',7),
            ('Chablis grand cru',1999,62,'Blanc',8),
            ('Chambertin',2012,43,'Rouge',5),
            ('Cabernet d Anjou',2014,56,'Rose',7),
            ('Céron',2015,16,'Blanc',4),
            ('Cadillac',2014,50,'Blanc',9),
            ('Beaujolais',2014,50,'Rose',7),
            ('Givry',2016,25,'Rouge',6),
            ('Chablis grand cru',2014,19,'Blanc',8),
            ('Chambertin',2016,50,'Rouge',6),
            ('Cabernet d Anjou',2017,90,'Rose',7),
            ('Beaujolais',2005,58,'Rouge',8),
            ('Cadillac',2010,48,'Blanc',9),
            ('Beaujolais',2003,69,'Rose',7);


INSERT INTO Parcelle (id_cadastre, sol, surface, exposition)
    VALUES  (1, 'Argile',34.6, 'Sud'),
            (2, 'Terre',56.3, 'Nord'),
            (3, 'Cailloux',42.9, 'Est'),
            (4, 'Grais',89.5, 'Ouest');


INSERT INTO Culture (id_cadastre,annee_cult,nb_traitement,tonte,taille,cepage)
    VALUES  (1,1985,0,'Tonte fine',12,'Raisin Blanc'),
    		(1,2000,6,'Tonte fine',10,'Raisin Blanc'),
    		(1,2004,12,'Tonte fine',18,'Raisin Rouge'),
    		(1,2008,0,'Tonte fine',12,'Raisin Blanc'),
            (2,1980,4,'Tonte fine',18,'Raisin Rouge'),
            (2,1999,8,'Tonte naturelle',14,'Raisin Rouge'),
            (2,2004,4,'Tonte fine',15,'Raisin Rouge'),
            (2,2012,4,'Tonte fine',18,'Raisin Rouge'),
	    	(3,1980,2,'Tonte moyenne',15,'Raisin Rouge'),
	    	(3,2003,0,'Tonte fine',12,'Raisin Blanc'),
	    	(3,2008,2,'Tonte fine',12,'Raisin Blanc'),
	    	(3,2015,0,'Tonte fine',12,'Raisin Blanc'),
	   	 	(4,2016,4,'Tonte moyenne',15,'Raisin bleu'),
	   	 	(4,2009,4,'Tonte moyenne',15,'Raisin noir'),
            (3,1256,50,'Tonte naturelle',55,'Raisin noir');


INSERT INTO  Evt_climat (id_evt, type)
    VALUES  (1, 'Grele'),
            (2, 'Ouragan'),
            (3, 'Tsunami'),
            (4, 'Tempete'),
    	    (5, 'Ouragan');


INSERT INTO  Composant ( nom_compo,  unite)
    VALUES  ('Eau', 'g/l'),
            ('Ethanol', 'g/l'),
            ('Methane', 'g/l'),
            ('Sucre', 'g/l'),
            ('Sodium', 'mg/l'),
            ('Selsmineraux', 'g/l'),
            ('Vitamines', 'g/l');

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
	VALUES	('Beaujolais',2005, 'Eau', 80),
    		('Beaujolais',2005, 'Ethanol', 14),
    		('Beaujolais',2005, 'Sucre', 6),
    		('Vin diousse',1955, 'Eau', 95),
    		('Cadillac',2010, 'Methane', 5),
    		('Vin et un', 1885, 'Sodium', 45);

INSERT INTO Etre_vendu ( nom_vin, annee_vin, id_vente, nombre_l)
	VALUES	('Beaujolais',2005, 1, 79),
    		('Cadillac',2010, 2, 28),
    		('Chablis grand cru',2014, 4, 55),
    		('Vin diousse',1955, 3, 15),
    		('Chambertin',2016, 2, 19);
