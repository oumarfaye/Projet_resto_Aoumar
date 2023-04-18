USE glepissier_resto;

CREATE TABLE typeCuisine(
    idTC INT(100) NOT NULL,
    libelleTC VARCHAR(20),
	PRIMARY KEY(idTC)
);

INSERT INTO typeCuisine (idTC, libelleTC) VALUES 
(1, 'sud ouest'),
(2, 'japonaise'),
(3, 'orientale'),
(4, 'fastfood'),
(5, 'vegetarienne'),
(6, 'vegan'),
(7, 'crepe'),
(8, 'sandwich'),
(9, 'tartes'),
(10, 'viande'),
(11, 'grillade');

CREATE TABLE LienRestoTC(
    idTC INT(100) NOT NULL,
    idR BIGINT NOT NULL,
	PRIMARY KEY(idTC, idR)
);

INSERT INTO LienRestoTC (idTC, idR) VALUES 
(1,1),
(2,1),
(3,3),
(4,1),
(4,8),
(4,11),
(5,3),
(6,10),
(7,6),
(8,11),
(9,10),
(10,1),
(11,1),
(11,10);