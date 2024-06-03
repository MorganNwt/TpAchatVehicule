    USE ACHATVEHICULE;

		DROP TABLE IF EXISTS PROPRIETAIRES;
        DROP TABLE IF EXISTS MODELES;
        DROP TABLE IF EXISTS CARTESGRISES;
        DROP TABLE IF EXISTS VOITURES;
       
       
		CREATE TABLE IF NOT EXISTS PROPRIETAIRES(
        id_personne		int(11) 			NOT NULL,
        nom				varchar(20)			NOT NULL,
        prenom			varchar(20)			NOT NULL,
        adresse			varchar(50)   	 	NOT NULL,
        ville			varchar(20)			NOT NULL,
        codePostal		int(5)				NOT NULL
        
        )ENGINE=MyISAM
        DEFAULT CHARSET=utf8mb4 
        COLLATE=utf8mb4_general_ci;
        
        CREATE TABLE IF NOT EXISTS MODELES(
        id_modele			int(11)			NOT NULL
            								AUTO_INCREMENT
            								PRIMARY KEY,
        modele				varchar(30)		NOT NULL,
        marque				varchar(30)		NOT NULL,
        carburant			varchar(10)		NOT NULL,
         
       
        CONSTRAINT CK_MODELES_carburant CHECK (carburant='essence' OR carburant='diesel'OR carburant='gpl' OR 														carburant='electrique')
        )ENGINE=MyISAM
        DEFAULT CHARSET=utf8mb4 
        COLLATE=utf8mb4_general_ci;
        
   		CREATE TABLE IF NOT EXISTS CARTESGRISES(
        id_personne   		int(11)   	    NOT NULL
                                            AUTO_INCREMENT,

        immatriculation 	char(7)			NOT NULL,
        dateCarte			date			NOT NULL,
        CONSTRAINT PK_CARTESGRISES_id_personne_immatriculation PRIMARY KEY (id_personne, immatriculation)

        )ENGINE=MyISAM
        DEFAULT CHARSET=utf8mb4 
        COLLATE=utf8mb4_general_ci;
    
   		
    	CREATE TABLE IF NOT EXISTS VOITURES(
        immatriculation		char(7)		NOT NULL,
        id_modele 			int(11)		AUTO_INCREMENT
        								NOT NULL,
        couleur				char(2)		NOT NULL,
        dateVoiture			date		NOT NULL,
        
        CONSTRAINT PK_VOITURES_immatriculation_id_modele PRIMARY KEY(immatriculation, id_modele)
        )ENGINE=MyISAM
        DEFAULT CHARSET=utf8mb4 
        COLLATE=utf8mb4_general_ci;
        
        ALTER TABLE VOITURES ADD CONSTRAINT CK_VOITURES_couleur CHECK (couleur='CL' OR couleur='MO' OR couleur='FO');
        ALTER TABLE VOITURES ADD CONSTRAINT FK_VOITURES_id_modele FOREIGN KEY VIOITURES(id_modele)
        														REFERENCES 	MODELES(id_modele);
        ALTER TABLE CARTESGRISES ADD CONSTRAINT FK_VOITURES_immatriculation FOREIGN KEY VOITURES(immatriculation) 																	REFERENCES VOITURES(immatriculation); 
        
        
	
       