USE ACHATVEHICULE;

DELETE FROM MODELES;
DELETE FROM VOITURES;
DELETE FROM PROPRIETAIRES;
DELETE FROM CARTESGRISES;

INSERT INTO MODELES
    VALUES (DEFAULT, 'Classe-A', 'Mercedes-Benz', 'Essence'),
            (DEFAULT, 'Classe-C', 'Mercedes-Benz', 'Diesel'),
            (DEFAULT, 'M3', 'BMW', 'Essence'),
            (DEFAULT, 'A3', 'Audi', 'Electrique');

INSERT INTO VOITURES
    VALUES  ('FK288KE', '1', 'MO', '1999-08-18'),
            ('GU485KF', '2', 'CL', '2005-07-25'),
            ('TY898PL', '3', 'FO', '1987-09-28'),
            ('AQ277LM', '4', 'CL', '2020-06-27');

INSERT INTO PROPRIETAIRES
    VALUES  (DEFAULT, 'NAWROT', 'Morgan', '7 allée', 'Valence', '26000'),   
            (DEFAULT, 'BOYARD', 'Louis', '8 Av', 'Paris', '75000'),  
            (DEFAULT, 'TRUMP', 'Donald', '16 rue', 'Lyon', '69000'), 
            (DEFAULT, 'GUY', 'Georges', '20 impasse', 'St eulalie', '26190');

INSERT INTO CARTESGRISES
    VALUES  (DEFAULT, 'FK288KE', '2002-04-18'),
            (DEFAULT, 'GU485KF', '2023-06-17'),
            (DEFAULT, 'TY898PL', '2022-05-15'),
            (DEFAULT, 'AQ277LM', '2018-09-18');

