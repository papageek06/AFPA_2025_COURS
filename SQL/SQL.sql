1. Création et modification de tables

CREATE TABLE : Créer une nouvelle table.
ALTER TABLE : Modifier la structure d'une table existante.
DROP TABLE : Supprimer une table.
RENAME TABLE : Renommer une table.
TRUNCATE TABLE : Supprimer toutes les données d'une table (rapide, sans journalisation).
DESC name_table ; :  affiche la table 
USE name_msd ; : entre dans la table
SELECT DISTINCT(service) FROM employee ; affiche sans doublon


2. Définition des colonnes
Types de données :


NUMÉRIQUES :

TINYINT, SMALLINT, MEDIUMINT, INT (ou INTEGER), BIGINT
DECIMAL (ou NUMERIC), FLOAT, DOUBLE (ou REAL)
BIT


CARACTÈRES ET CHAÎNES :

CHAR, VARCHAR
TEXT (TINYTEXT, TEXT, MEDIUMTEXT, LONGTEXT)
BLOB (TINYBLOB, BLOB, MEDIUMBLOB, LONGBLOB)
ENUM, SET


DATE ET HEURE :

DATE, DATETIME, TIMESTAMP, TIME, YEAR
SPATIAUX :

GEOMETRY, POINT, LINESTRING, POLYGON, etc.


Options des colonnes :
NULL / NOT NULL : Permet ou interdit les valeurs NULL.
DEFAULT : Valeur par défaut d'une colonne.
AUTO_INCREMENT : Valeur incrémentée automatiquement (généralement utilisée pour les clés primaires).
UNIQUE : Garantie que toutes les valeurs de la colonne sont uniques.
PRIMARY KEY : Définit une clé primaire.
INDEX / KEY : Ajoute un index (peut être utilisé avec UNIQUE ou FULLTEXT).
ON UPDATE CURRENT_TIMESTAMP : Met à jour la colonne avec l'horodatage actuel lors des modifications.


3. Contraintes
PRIMARY KEY : Définit une clé primaire unique.
FOREIGN KEY : Définit une clé étrangère pour établir une relation entre deux tables.
UNIQUE : Assure que toutes les valeurs de la colonne sont uniques.
CHECK : Définit une contrainte pour vérifier une condition (prise en charge limitée dans MySQL).
DEFAULT : Spécifie une valeur par défaut.
ON DELETE / ON UPDATE : Définir le comportement des clés étrangères (CASCADE, SET NULL, RESTRICT, etc.).


4. Index et performances
INDEX : Crée un index simple sur une colonne.
UNIQUE INDEX : Crée un index unique.
FULLTEXT INDEX : Crée un index pour la recherche en texte intégral (sur CHAR, VARCHAR, et TEXT).
SPATIAL INDEX : Crée un index spatial (pour les données géométriques).
VISIBLE / INVISIBLE : Définit si un index est visible aux optimisateurs de requêtes.


5. Stockage et moteurs
ENGINE : Définit le moteur de stockage de la table (InnoDB, MyISAM, MEMORY, etc.).
ROW_FORMAT : Spécifie le format des lignes (COMPACT, DYNAMIC, REDUNDANT, etc.).
AUTO_INCREMENT : Définit la valeur de départ pour une colonne incrémentée automatiquement.
CHARSET : Définit l'encodage des caractères (utf8, utf8mb4, etc.).
COLLATE : Définit le classement pour les colonnes de type texte.


6. Partitionnement
PARTITION BY : Divise les données de la table en partitions logiques (RANGE, LIST, HASH, KEY).


7. Clés étrangères et relations
FOREIGN KEY : Crée une clé étrangère reliant deux tables.

ON DELETE / ON UPDATE : Définit l'action à effectuer lors de la suppression ou de la mise à jour d'une ligne :

CASCADE
SET NULL
RESTRICT
NO ACTION


8. Autres options importantes

TEMPORARY : Crée une table temporaire qui est supprimée automatiquement à la fin de la session.
IF NOT EXISTS : Évite une erreur si la table existe déjà.
COMMENT : Ajoute un commentaire à la table ou à une colonne.
STORED / VIRTUAL : Définit une colonne générée (calculée automatiq


CREATE SCHEMA IF NOT EXISTS `company` DEFAULT CHARACTER SET utf8 ;
USE `company` ;


CREATE TABLE IF NOT EXISTS `company`.`employee` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(20) NOT NULL,
  `name` VARCHAR(20) NOT NULL,
  `sexe` ENUM('m', 'f') NOT NULL,
  `service` VARCHAR(20) NOT NULL,
  `starting_date` DATE NOT NULL,
  `salary` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


DESC employee;

employee;

ALTER TABLE employee ADD email VARCHAR(25) NOT NULL;
ALTER TABLE employee DROP column email;

ALTER TABLE employee MODIFY salary INT(4) NOT NULL;


INSERT INTO employee VALUES
(3, 'Thomas', 'Winter', 'm', 'sales', '2011-05-03', 3550),
(4, 'Chloe', 'Dubar', 'f', 'production', '2011-09-05', 1900),
(5, 'Elodie', 'Fellier', 'f', 'administration', '2011-11-22', 1600),
(6, 'Fabrice', 'Grand', 'm', 'accounts', '2011-12-30', 2900),
(7, 'Melanie', 'Collier', 'f', 'sales', '2012-01-08', 3100),
(8, 'Laura', 'Blanchet', 'f', 'management', '2012-05-09', 4500),
(9, 'Guillaume', 'Miller', 'm', 'sales', '2012-07-02', 1900),
(10, 'Celine', 'Perrin', 'f', 'sales', '2012-09-10', 2700),
(11, 'Julien', 'Cottet', 'm', 'administration', '2013-01-05', 1390),
(12, 'Mathieu', 'Vignal', 'm', 'IT', '2013-04-03', 2500),
(13, 'Thierry', 'Desprez', 'm', 'administration', '2013-07-17', 1500),
(14, 'Amandine', 'Thoyer', 'f', 'communication', '2014-01-23', 2100),
(15, 'Damien', 'Durand', 'm', 'IT', '2014-07-05', 2250),
(16, 'Daniel', 'Chevel', 'm', 'IT', '2015-09-28', 3100),
(17, 'Nathalie', 'Martin', 'f', 'legal', '2016-01-12', 3550),
(18, 'Benoit', 'Lagarde', 'm', 'production', '2016-06-03', 2550),
(19, 'Emilie', 'Sennard', 'f', 'sales', '2017-01-11', 1800),
(20, 'Stephanie', 'Lafaye', 'f', 'assistant', '2017-03-01', 1775);

employee
SELECT first_name, name FROM employee;

SELECT DISTINCT(service) FROM employee;

mysql> SELECT name FROM employee WHERE service_date BETWEEN '2005-03-01' AND '2017-03-01';

mysql> SELECT name FROM employee WHERE service_date BETWEEN '2017/03/01' AND CURDATE();





SELECT * FROM employee WHERE first_name LIKE 's%';
SELECT * FROM employee WHERE first_name LIKE '%s';
SELECT * FROM employee WHERE first_name LIKE '%s%';

 SELECT * FROM employee WHERE service != 'management';
 
 
 SELECT * FROM employee WHERE salary >= 3000;
 
 SELECT first_name, name, (salary * 12) AS annual_salary FROM employee;
 
 
 SELECT COUNT(*) FROM employee;


SELECT first_name, name FROM employee WHERE salary = (SELECT MAX(salary) FROM employee);

mysql> SELECT * FROM employee WHERE service IN ('management', 'sales' , 'IT') ;

 SELECT user_id FROM borrow WHERE date_out BETWEEN '2016-12-07' AND '2016-12-08';

- Récupérez les titres des livres qui n'ont pas encore été rendus : 

SELECT title FROM book WHERE id IN (SELECT book_id FROM borrow WHERE date_in IS NULL);


- Affichez le prénom des abonnés qui n'ont pas encore rendu leurs livres :

SELECT first_name FROM user WHERE id IN (SELECT user_id FROM borrow WHERE date_in IS NULL);


- Affichez les numéros des livres empruntés par un abonné nommé Chloé : 

SELECT book_id FROM borrow WHERE user_id = (SELECT id FROM user WHERE first_name = 'Chloé');


- Affichez le nombre de livres empruntés par un abonné nommé Guillaume :

SELECT COUNT(book_id) FROM borrow WHERE user_id = (SELECT id FROM user WHERE first_name = 'Guillaume');


- Affichez les prénoms des abonnés qui ont emprunté un livre à une date précise (par exemple, 07/12/2016) :

SELECT first_name FROM user WHERE id IN (SELECT user_id FROM borrow WHERE DATE(date_out) = '2016-12-07');


- Affichez les titres des livres empruntés par Chloé :

SELECT title FROM book WHERE id IN (SELECT book_id FROM borrow WHERE user_id = (SELECT id FROM user WHERE first_name = 'Chloé'));


- Affichez les titres des livres que Chloé n'a pas encore empruntés :

SELECT title FROM book WHERE id NOT IN (SELECT book_id FROM borrow WHERE user_id = (SELECT id FROM user WHERE first_name = 'Chloé'));


- Identifiez les abonnés qui ont emprunté un livre dun auteur précis (par exemple, Alphonse Daudet) :

SELECT first_name, id FROM user WHERE id IN (SELECT user_id FROM borrow WHERE book_id IN (SELECT id FROM book WHERE author = 'ALPHONSE DAUDET'));



--Min 
--MAX
--AVG
--COUNT
-- CURDATE()

DELIMITER //

CREATE FUNCTION ConcatNameAndBook(first_name VARCHAR(30), id_book INT)
RETURNS VARCHAR(100)
DETERMINISTIC
BEGIN
    RETURN CONCAT(first_name, ' a emprunté le livre n° ', id_book);
END;
//

DELIMITER ;


SELECT ConcatNameAndBook(first_name, book_id) FROM user INNER JOIN borrow ON borrow.user_id = user.id;

DROP FUNCTION ConcatFirstNameAndIdBook;


SELECT 
    ROUTINE_NAME AS Function_Name,
    ROUTINE_SCHEMA AS Database_Name,
    ROUTINE_TYPE AS Type,
    DATA_TYPE AS Return_Type
FROM 
    information_schema.ROUTINES
WHERE 
    ROUTINE_TYPE = 'FUNCTION'
    AND ROUTINE_SCHEMA = 'library';

// PROCÉDURE STOCKÉE (STORED PROCEDURES)

-- affiche les titres des livres que Chloé n'a pas encore emprunté
SELECT title FROM book WHERE id NOT IN (
SELECT book_id FROM borrow WHERE user_id IN(
SELECT id FROM user WHERE first_name = 'Chloé'));


DELIMITER //

CREATE PROCEDURE booksNotBorrowedByUser(IN firstName VARCHAR(30))
BEGIN
    SELECT title  FROM book  WHERE id NOT IN (
    SELECT book_id FROM borrow WHERE user_id IN (
    SELECT id FROM user WHERE first_name = firstName )
    );
END //

DELIMITER ;

call booksNotBorrowedByUser('Guillaume');

//VUE 
CREATE VIEW view_loan AS
SELECT u.first_name, b.title, bo.date_out FROM user u, book b, borrow bo
WHERE b.id = bo.book_id
AND u.id = bo.user_id;

// TABLE TEMPORAIRES 


CREATE TEMPORARY TABLE loans2017 AS
SELECT u.first_name, b.title, bo.date_out FROM user u, book b, borrow bo
WHERE b.id = bo.book_id
AND u.id = bo.user_id
AND YEAR(bo.date_out) = 2017;

// TRANSACTION ET DES ROLLBACK EN SQL 

TRANSACTION + communication
// 3 PHASES 
// INTERPRETATION 
//EXECUTION
//RETOUR

START TRANSACTION;
SELECT * FROM employees;
UPDATE employees SET salary = 123 WHERE id_employee = 21;
SELECT * FROM employees;
ROLLBACK; -- COMMIT

START TRANSACTION;
SELECT * FROM employees;
UPDATE employees SET salary = 123 WHERE id_employee = 21;
SELECT * FROM employees;
COMMIT;-- VALIDE TOUTE LES MODIFICATION EN BDD DE LA TRANSACTION


-- SYSTEM VARIABLES

SHOW VARIABLES;
SELECT @@version;

-- USER VARIABLES

SET @school = "my school";
SELECT @school;

-- Analyse
-- Interpretation
PREPARE req FROM 'SELECT * FROM employees WHERE first_name = "Nathalie"';

-- Exécution
EXECUTE req;
EXECUTE req;
EXECUTE req;
EXECUTE req;
EXECUTE req;

-- 7 étapes
-- 15 étapes

PREPARE req2 FROM 'SELECT * FROM employees WHERE first_name = ?';
SET @employee2 = "Melanie";
EXECUTE req2 USING @employee2;

DROP PREPARE req2;




