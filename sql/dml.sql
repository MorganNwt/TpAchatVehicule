USE ACHATVEHICULE;

DELETE FROM MODELES;
DELETE FROM VOITURES;
DELETE FROM PROPRIETAIRES;
DELETE FROM CARTESGRISES;

INSERT INTO MODELES
    VALUES ('1', 'Classe-A', 'Mercedes-Benz', 'Essence'),
            ('2', 'Classe-C', 'Mercedes-Benz', 'Diesel'),
            ('3', 'M3', 'BMW', 'Essence'),
            ('4', 'A3', 'Audi-', 'Electrique');

INSERT INTO VOITURES
    VALUES  ('01ABC50', '1', 'MO', '1999-08-18'),
            ('04EFG49', '2', 'CL', '2005-07-25'),
            ('03HIJ39', '3', 'FO', '1987-09-28'),
            ('02KLM24', '4', 'CL', '2020-06-27');

INSERT INTO PROPRIETAIRES
    VALUES  (DEFAULT, 'NAWROT', 'Morgan', '7 allée', 'Valence', '26000'),   
            (DEFAULT, 'BOYARD', 'Louis', '8 Av', 'Paris', '75000'),  
            (DEFAULT, 'TRUMP', 'Donald', '16 rue', 'Lyon', '69000'), 
            (DEFAULT, 'GUY', 'Georges', '20 impasse', 'St eulalie', '26190');

INSERT INTO CARTESGRISES
    VALUES  ('1', 'FK288KE', '2002-04-18'),
            ('2', 'GU485KF', '2023-06-17'),
            ('3', 'TY898PL', '2022-05-15'),
            ('4', 'AQ277LM', '2018-09-18');

