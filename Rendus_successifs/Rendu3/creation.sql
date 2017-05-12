/* creation.sql */

CREATE TABLE  Vente (
    id_vente integer PRIMARY KEY,
    prix_unitaire float,
    circuit varchar(25)
);

CREATE TABLE Vin (
    nom_vin varchar(25) ,
    annee_vin integer ,
    quantité_restante float,
    couleur varchar(25),
    note_qualite integer,
    PRIMARY KEY (nom_vin,  annee_vin)
);

CREATE TABLE Parcelle (
    id_cadastre integer  PRIMARY KEY,
    sol varchar(25),
    surface  float,
    exposition varchar(25)
);

CREATE TABLE Culture (
    id_cadastre integer,
    annee_cult integer,
    nb_traitement integer,
    tonte varchar(25),
    taille varchar(25),
    cepage varchar(25),
    PRIMARY KEY (id_cadastre, annee_cult),
    FOREIGN KEY (id_cadastre) REFERENCES Parcelle (id_cadastre)
);

CREATE TABLE Evt_climat (
    id_evt integer  PRIMARY KEY,
    type varchar(25)
);

CREATE TABLE Composant (
    nom_compo varchar (25) PRIMARY KEY,
    unite varchar (15)
);

CREATE TABLE Etre_vendu (
    nom_vin varchar(25),
    annee_vin integer,
    id_vente integer,
    nombre_l float,
    PRIMARY KEY (nom_vin, annee_vin, id_vente),
    FOREIGN KEY (nom_vin, annee_vin) REFERENCES Vin (nom_vin, annee_vin),
    FOREIGN KEY (id_vente) REFERENCES Vente (id_vente)
);

 CREATE TABLE Assembler (
    nom_vin varchar(25),
    annee_vin integer ,
    id_cadastre integer,
    annee_cult integer ,
    proportion float,
    PRIMARY KEY( nom_vin,  annee_vin,  id_cadastre, annee_cult),
    FOREIGN KEY( nom_vin,  annee_vin)  REFERENCES Vin (nom_vin, annee_vin),
    FOREIGN KEY(id_cadastre, annee_cult) REFERENCES Culture (id_cadastre, annee_cult)
);


CREATE TABLE Toucher (
    id_evt integer,
    id_cadastre integer,
    annee_cult integer,
    intensite integer,
    PRIMARY KEY (id_cadastre, annee_cult, id_evt),
    FOREIGN KEY(id_evt) REFERENCES Evt_climat (id_evt),
    FOREIGN KEY(id_cadastre, annee_cult) REFERENCES Culture (id_cadastre, annee_cult)
);

CREATE TABLE Composer (
    nom_compo varchar(25),
    nom_vin varchar(25) ,
    annee_vin integer ,
    pourcentage_l  float,
    PRIMARY KEY (nom_compo, nom_vin,  annee_vin),
    FOREIGN KEY(nom_compo) REFERENCES Composant (nom_compo),
    FOREIGN KEY( nom_vin,  annee_vin)  REFERENCES Vin (nom_vin, annee_vin)
);
