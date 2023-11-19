
CREATE SEQUENCE "public".seq_besoin START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".seq_commande START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".seq_departement START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".seq_detailbesoin START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".seq_detailcommande START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".seq_detailproforma START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".seq_employee START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".seq_fournisseur START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".seq_materiel START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".seq_nature START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".seq_poste START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".seq_proforma START WITH 1 INCREMENT BY 1;

CREATE  TABLE "public".departement ( 
	iddepartement        varchar(70) DEFAULT ('DEP'::text || nextval('seq_departement'::regclass)) NOT NULL  ,
	nomdepartement       varchar(70)    ,
	CONSTRAINT pk_departement PRIMARY KEY ( iddepartement )
 );

CREATE  TABLE "public".fournisseur ( 
	idfournisseur        varchar(70) DEFAULT ('FOU'::text || nextval('seq_fournisseur'::regclass)) NOT NULL  ,
	nomfournisseur       varchar(100)    ,
	adresse              varchar(100)    ,
	contact              varchar(100)    ,
	responsable          varchar(100)    ,
	email                varchar(100)    ,
	CONSTRAINT pk_fournisseur PRIMARY KEY ( idfournisseur )
 );

CREATE  TABLE "public".modepaiement ( 
	idmodepaiement       varchar(70)  NOT NULL  ,
	nommodepaiement      varchar(100)    ,
	CONSTRAINT pk_modepaiement PRIMARY KEY ( idmodepaiement )
 );

CREATE  TABLE "public".nature ( 
	idnature             varchar(70) DEFAULT ('NAT'::text || nextval('seq_nature'::regclass)) NOT NULL  ,
	nomnature            varchar(100)    ,
	CONSTRAINT pk_nature PRIMARY KEY ( idnature )
 );

CREATE  TABLE "public".poste ( 
	idposte              varchar(70) DEFAULT ('POS'::text || nextval('seq_poste'::regclass)) NOT NULL  ,
	nomposte             varchar    ,
	iddepartement        varchar(70)    ,
	idboss               varchar(70)    ,
	privilege            integer DEFAULT 0   ,
	CONSTRAINT pk_poste PRIMARY KEY ( idposte ),
	CONSTRAINT fk_poste_departement FOREIGN KEY ( iddepartement ) REFERENCES "public".departement( iddepartement )   ,
	CONSTRAINT fk_poste_poste FOREIGN KEY ( idboss ) REFERENCES "public".poste( idposte )   
 );

CREATE  TABLE "public".unite ( 
	idunite              varchar(70)  NOT NULL  ,
	nomunite             varchar(100)    ,
	CONSTRAINT pk_unite PRIMARY KEY ( idunite )
 );

CREATE  TABLE "public".employee ( 
	idemployee           varchar(70) DEFAULT ('EMP'::text || nextval('seq_employee'::regclass)) NOT NULL  ,
	nom                  varchar(100)    ,
	prenom               varchar(100)    ,
	dtn                  date    ,
	genre                integer DEFAULT 1   ,
	email                varchar(100)    ,
	pwd                  varchar(100)    ,
	contact              varchar(100)    ,
	idposte              varchar(70)    ,
	CONSTRAINT pk_employee PRIMARY KEY ( idemployee ),
	CONSTRAINT fk_employee_poste FOREIGN KEY ( idposte ) REFERENCES "public".poste( idposte )   
 );

CREATE  TABLE "public".fournisseur_nature ( 
	idfournisseurnature  varchar(70)  NOT NULL  ,
	idfournisseur        varchar(70)    ,
	idnature             varchar(70)    ,
	CONSTRAINT pk_fournisseur_unite PRIMARY KEY ( idfournisseurnature ),
	CONSTRAINT fk_fournisseur_nature FOREIGN KEY ( idfournisseur ) REFERENCES "public".fournisseur( idfournisseur )   ,
	CONSTRAINT fk_fournisseur_nature_nature FOREIGN KEY ( idnature ) REFERENCES "public".nature( idnature )   
 );

CREATE  TABLE "public"."global" ( 
	idglobal             varchar(70)  NOT NULL  ,
	idemployee           varchar(70)    ,
	"date"               date DEFAULT CURRENT_DATE   ,
	CONSTRAINT pk_tbl PRIMARY KEY ( idglobal ),
	CONSTRAINT fk_tbl_employee FOREIGN KEY ( idemployee ) REFERENCES "public".employee( idemployee )   
 );

CREATE  TABLE "public".materiel ( 
	idmateriel           varchar(70) DEFAULT ('MAT'::text || nextval('seq_materiel'::regclass)) NOT NULL  ,
	nommateriel          varchar(100)    ,
	idnature             varchar(70)    ,
	idunite              varchar(70)    ,
	tva                  double precision DEFAULT 20   ,
	CONSTRAINT pk_materiel PRIMARY KEY ( idmateriel ),
	CONSTRAINT fk_materiel_nature FOREIGN KEY ( idnature ) REFERENCES "public".nature( idnature )   ,
	CONSTRAINT fk_materiel_unite FOREIGN KEY ( idunite ) REFERENCES "public".unite( idunite )   
 );

CREATE  TABLE "public".proforma ( 
	idproforma           varchar(70) DEFAULT ('PRO'::text || nextval('seq_proforma'::regclass)) NOT NULL  ,
	idfournisseur        varchar(70)    ,
	dateproformasent     date DEFAULT CURRENT_DATE   ,
	dateproformareceived date DEFAULT CURRENT_DATE   ,
	idglobal             varchar(70)    ,
	status               integer DEFAULT 0   ,
	CONSTRAINT pk_proforma PRIMARY KEY ( idproforma ),
	CONSTRAINT fk_proforma_fournisseur FOREIGN KEY ( idfournisseur ) REFERENCES "public".fournisseur( idfournisseur )   ,
	CONSTRAINT fk_proforma_global FOREIGN KEY ( idglobal ) REFERENCES "public"."global"( idglobal )   
 );

CREATE  TABLE "public".besoin ( 
	idbesoin             varchar(70) DEFAULT ('BES'::text || nextval('seq_besoin'::regclass)) NOT NULL  ,
	"date"               date DEFAULT CURRENT_DATE   ,
	iddepartement        varchar(70)    ,
	situation            integer    ,
	idemployee           varchar(70)    ,
	CONSTRAINT pk_besoin PRIMARY KEY ( idbesoin ),
	CONSTRAINT fk_besoin_departement FOREIGN KEY ( iddepartement ) REFERENCES "public".departement( iddepartement )   ,
	CONSTRAINT fk_besoin_employee FOREIGN KEY ( idemployee ) REFERENCES "public".employee( idemployee )   
 );

CREATE  TABLE "public".boncommande ( 
	idboncommande        varchar(70) DEFAULT ('COM'::text || nextval('seq_commande'::regclass)) NOT NULL  ,
	total                double precision    ,
	datecommande         date DEFAULT CURRENT_DATE   ,
	idmodepaiement       varchar(70)    ,
	livraisonpartielle   integer    ,
	delailivraison       date    ,
	validationfinance    integer    ,
	validationadjoint    integer    ,
	idglobal             varchar(70)    ,
	CONSTRAINT pk_commande PRIMARY KEY ( idboncommande ),
	CONSTRAINT fk_boncommande_modepaiement FOREIGN KEY ( idmodepaiement ) REFERENCES "public".modepaiement( idmodepaiement )   ,
	CONSTRAINT fk_boncommande_global FOREIGN KEY ( idglobal ) REFERENCES "public"."global"( idglobal )   
 );

CREATE  TABLE "public".detailbesoin ( 
	iddetail             varchar(70) DEFAULT ('BDET'::text || nextval('seq_detailbesoin'::regclass)) NOT NULL  ,
	idbesoin             varchar(70)    ,
	idmateriel           varchar(70)    ,
	qte                  double precision    ,
	CONSTRAINT pk_detailbesoin PRIMARY KEY ( iddetail ),
	CONSTRAINT fk_detailbesoin_detail FOREIGN KEY ( idmateriel ) REFERENCES "public".materiel( idmateriel )   ,
	CONSTRAINT fk_detailbesoin_besoin FOREIGN KEY ( idbesoin ) REFERENCES "public".besoin( idbesoin )   
 );

CREATE  TABLE "public".detailglobal ( 
	iddetailglobal       varchar(70)    ,
	idglobal             varchar(70)    ,
	idbesoin             varchar(70)    ,
	CONSTRAINT fk_detailglobal_global FOREIGN KEY ( idglobal ) REFERENCES "public"."global"( idglobal )   ,
	CONSTRAINT fk_detailglobal_besoin FOREIGN KEY ( idbesoin ) REFERENCES "public".besoin( idbesoin )   
 );

CREATE  TABLE "public".detailproforma ( 
	iddetail             varchar(70) DEFAULT ('PDET'::text || nextval('seq_detailproforma'::regclass)) NOT NULL  ,
	idproforma           varchar(70)    ,
	idmateriel           varchar(70)    ,
	pu                   double precision    ,
	qte                  double precision    ,
	totalmontant         double precision    ,
	CONSTRAINT pk_detail PRIMARY KEY ( iddetail ),
	CONSTRAINT fk_detail_proforma FOREIGN KEY ( idproforma ) REFERENCES "public".proforma( idproforma )   ,
	CONSTRAINT fk_detail_materiel FOREIGN KEY ( idmateriel ) REFERENCES "public".materiel( idmateriel )   
 );

CREATE  TABLE "public".detailcommande ( 
	iddetail             varchar(70) DEFAULT ('CDET'::text || nextval('seq_detailcommande'::regclass)) NOT NULL  ,
	qte                  double precision    ,
	idboncommande        varchar(70)    ,
	idmateriel           varchar(70)    ,
	pu                   double precision    ,
	montantht            double precision    ,
	montantttc           double precision    ,
	CONSTRAINT pk_detailcommande PRIMARY KEY ( iddetail ),
	CONSTRAINT fk_detailcommande_commande FOREIGN KEY ( idboncommande ) REFERENCES "public".boncommande( idboncommande )   ,
	CONSTRAINT fk_detailcommande_materiel FOREIGN KEY ( idmateriel ) REFERENCES "public".materiel( idmateriel )   
 );


-- Ajouter des données à la table fournisseur 
INSERT INTO "public".fournisseur (nomfournisseur, adresse, contact, responsable, email)
VALUES 
  ('SCORE', '123 Rue A', '034 00 032 02', 'John', 'score@mg.com'),
  ('LEADER PRICE', '456 Rue B', '034 00 032 11', 'Lala', 'leader@mg.com'),
  ('F SHOP', '789 Rue C', '034 00 032 23', 'Nivo', 'shopfC@mg.com');


-- Ajouter des données à la table nature
INSERT INTO "public".nature ( nomnature)
VALUES 
  ( 'electronique'),
  ( 'Bureau');


  INSERT INTO "public".departement ( nomdepartement)
VALUES 
  ( 'Informatique'),
  ( 'RH'),
( 'Achat & vente');


-- Ajouter des données à la table poste
INSERT INTO "public".poste (nomposte, iddepartement, idboss, privilege)
VALUES 
  ( 'Directeur de systeme informatique', 'DEP1', NULL, 2),
  ( 'Developpeur Senior', 'DEP1', 'POS1', 0),
  ( 'Developpeur Junior', 'DEP1', 'POS2', 0),
  ( 'Responsable RH', 'DEP2', NULL, 1),
  ('Assistant RH', 'DEP2', 'POS4', 0),
  ( 'Responsable Achat&vente', 'DEP3', NULL, 1),
     ( 'Comptable', 'DEP3', 'POS6', 0);

-- Ajouter 10 données à la table materiel sans spécifier l'ID
INSERT INTO "public".materiel (nommateriel, idnature,idunite)
VALUES 
  ('Ordinateur portable HP', 'NAT1',3),
  ('Bureau en verre', 'NAT2',3),
  ('Imprimante laser', 'NAT1',3),
  ('Clavier sans fil', 'NAT1',3),
  ('Chaise ergonomique', 'NAT2',3),
  ('Scanner 3D', 'NAT1',3),
  ('Stylo  encre noire', 'NAT2',3),
  ('Ecran LCD 24 pouces', 'NAT1',3),
  ('Tapis de souris', 'NAT1',3),
  ('Lampe de bureau LED', 'NAT2',3);


-- Ajouter des données à la table employee pour chaque poste
INSERT INTO "public".employee (nom, prenom, dtn, genre, email, pwd, contact, idposte)
VALUES 
  ('Doe', 'John', '1990-01-15', 1, 'john.doe@example.com', 'motdepasse1', '123-456-7890', 'POS1'),
  ('Smith', 'Jane', '1985-03-20', 0, 'jane.smith@example.com', 'motdepasse2', '987-654-3210', 'POS2'),
  ('Johnson', 'Bob', '1992-07-05', 1, 'bob.johnson@example.com', 'motdepasse3', '555-123-4567', 'POS3'),
  ('Brown', 'Alice', '1988-09-10', 0, 'alice.brown@example.com', 'motdepasse4', '111-222-3333', 'POS4'),
  ('Williams', 'Chris', '1995-12-25', 1, 'chris.williams@example.com', 'motdepasse5', '444-555-6666', 'POS5'),
  ('Davis', 'Emily', '1980-06-30', 0, 'emily.davis@example.com', 'motdepasse6', '777-888-9999', 'POS6'),
  ('Miller', 'Michael', '1998-04-12', 1, 'michael.miller@example.com', 'motdepasse7', '000-111-2222', 'POS7');

INSERT INTO "public".modepaiement (nommodepaiement)
VALUES 
  ('Espèce'),
  ('Chèque'),
  ('Au comptant');

  INSERT INTO "public".unite (nomunite)
VALUES 
  ('kg'),
  ('litre'),
  ('unity');