INSERT INTO Vente (id_vente, prix_unitaire, circuit)
VALUES  (1, 45, 'direct'),
        (2, 67, 'grossiste'),
        (3, 67, 'detaillant');


INSERT INTO Vin (nom_vin,annee_vin,quantité_restante,couleur,note_qualite)
    VALUES  ('bon vin',1985,52,'rose',8),
            ('vin de table',1980,52,'rose',8),
            ('vin diousse',1955,52,'rose',8),
            ('vin et un',1885,52,'rose',8),
            ('vin pas trop trop cher',1985,52,'rose',8);


INSERT INTO Parcelle (id_cadastre, sol, surface, exposition)
    VALUES  (1, 'argile',34.6, 'sud'),
            (2, 'terre',56.3, 'nord'),
            (3, 'cailloux',42.9, 'est'),
            (4, 'grais',89.5, 'ouest');


INSERT INTO Culture (id_cadastre,annee_cult,nb_traitement,tonte,taille,cepage)
    VALUES  (1,1985,3,'tonte fine',12,'raisin blanc'),
            (2,1980,3,'tonton',18,'raison rouge'),
            (3,1955,3,'tonte naturelle',55,'raisin noir');


INSERT INTO  Evt_climat (id_evt,  type)
    VALUES  (1, 'grele'),
            (2, 'ouragan'),
            (3, 'tsunami'),
            (4, 'tempete');


INSERT INTO  Composant ( nom_compo,  unite)
    VALUES  ('eau', 90),
            ('ethanol', 30),
            ('methane', 27),
            ('sodium', 56);
