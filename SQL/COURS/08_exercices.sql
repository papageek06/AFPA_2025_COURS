DROP DATABASE library;
CREATE DATABASE library;

-- Subscribers

CREATE TABLE subscribers (
    id_subscriber INT(3) NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(25) NOT NULL,
    PRIMARY KEY (id_subscriber)
)
ENGINE = InnoDB
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci
;

INSERT INTO subscribers (id_subscriber, first_name) VALUES
(1, 'Guillaume'),
(2, 'Benoit'),
(3, 'Chloe'),
(4, 'Laura');

-- Books

CREATE TABLE books(
    id_book INT(3) NOT NULL AUTO_INCREMENT,
    author VARCHAR(25) NOT NULL,
    title VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_book)
)
ENGINE = InnoDB
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci
;

INSERT INTO books (id_book, author, title) VALUES
(100, 'GUY DE MAUPASSANT', 'Une vie'),
(101, 'GUY DE MAUPASSANT', 'Bel-Ami '),
(102, 'HONORE DE BALZAC', 'Le père Goriot'),
(103, 'ALPHONSE DAUDET', 'Le Petit chose'),
(104, 'ALEXANDRE DUMAS', 'La Reine Margot'),
(105, 'ALEXANDRE DUMAS', 'Les Trois Mousquetaires');

-- Loans

CREATE TABLE loans(
    id_loan INT(3) NOT NULL AUTO_INCREMENT,
    id_book INT(3) NOT NULL,
    id_subscriber INT(3) NOT NULL,
    date_out DATE NOT NULL,
    date_in DATE DEFAULT NULL,
    PRIMARY KEY (id_loan),
    FOREIGN KEY (id_book) REFERENCES books(id_book),
    FOREIGN KEY (id_subscriber) REFERENCES subscribers(id_subscriber)
)
ENGINE = InnoDB
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci
;

INSERT INTO loans (id_loan, id_book, id_subscriber, date_out, date_in) VALUES
(1, 100, 1, '2016-12-07', '2016-12-11'),
(2, 101, 2, '2016-12-07', '2016-12-18'),
(3, 100, 3, '2016-12-11', '2016-12-19'),
(4, 103, 4, '2016-12-12', '2016-12-22'),
(5, 104, 1, '2016-12-15', '2016-12-30'),
(6, 105, 2, '2017-01-02', '2017-01-15'),
(7, 105, 3, '2017-02-15', NULL),
(8, 100, 2, '2017-02-20', NULL);

SELECT * FROM subscribers;
SELECT * FROM loans;
SELECT * FROM books;

-- Récupérer le titre des livres qui n'ont pas encore été rendus

-- error : SELECT id_book FROM loans WHERE date_in = NULL;
SELECT id_book FROM loans WHERE date_in IS NULL;

-- REQUÊTE IMBRIQUÉE

SELECT title FROM books WHERE id_book IN(100, 105);
SELECT title FROM books WHERE id_book IN(SELECT id_book FROM loans WHERE date_in IS NULL);

-- Récupérer le prénom des abonnés qui n'ont pas encore rendu leur livre

SELECT first_name FROM subscribers WHERE id_subscriber IN(SELECT id_subscriber FROM loans WHERE date_in IS NULL);

-- Afficher les numéros des livres empruntés par Chloé
SELECT id_book FROM loans WHERE id_subscriber IN(
SELECT id_subscriber FROM subscribers WHERE first_name = 'Chloé');

-- Afficher les prénoms des abonnés ayant emprunté un livre à la date du 07/12/2016

SELECT first_name FROM subscribers WHERE id_subscriber IN(
SELECT id_subscriber FROM loans WHERE date_out = '2016/12/07');

-- Afficher le nombre de livre emprunté par Guillaume

SELECT COUNT(id_book) AS 'books borrowed by Guillaume' FROM loans WHERE id_subscriber IN (
SELECT id_subscriber FROM subscribers WHERE first_name = 'Guillaume');

-- Afficher le titre des livres empruntés par Chloé

-- Récupérer l'id_subscriber de Chloé
SELECT id_subscriber FROM subscribers WHERE first_name = 'Chloé';

-- Récupérer les id_book des livres empruntés par Chloé
SELECT id_book FROM loans WHERE id_subscriber = 3;

-- Récupérer les titres des livres (title)
SELECT title FROM books WHERE id_book IN (100, 105);

SELECT title FROM books WHERE id_book IN (
SELECT id_book FROM loans WHERE id_subscriber IN(
SELECT id_subscriber FROM subscribers WHERE first_name = 'Chloé'));

-- Afficher le titre des livres que Chloé n'a pas encore emprunté

SELECT title FROM books WHERE id_book NOT IN (
SELECT id_book FROM loans WHERE id_subscriber IN(
SELECT id_subscriber FROM subscribers WHERE first_name = 'Chloé'));

-- Connaitre le prénom des abonnés qui ont emprunté le livre d'Alphonse Daudet

SELECT id_book FROM books WHERE author = 'Alphonse Daudet'; -- 103
SELECT id_subscriber FROM loans WHERE id_book IN (103); -- 4
SELECT first_name FROM subscribers WHERE id_subscriber = 4;

SELECT first_name FROM subscribers WHERE id_subscriber IN (
SELECT id_subscriber FROM loans WHERE id_book IN (
SELECT id_book FROM books WHERE author = 'Alphonse Daudet'));