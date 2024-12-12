-- Requêtes imbriquées vs Jointure

SELECT * FROM subscribers;
SELECT * FROM books;
SELECT * FROM loans;

-- Afficher les dates de sortie et d’entrée de Guillaume pour rendre un livre.

SELECT s.first_name, l.date_out, l.date_in 
FROM subscribers s, loans l 
WHERE s.id_subscriber = l.id_subscriber 
AND s.first_name = 'Guillaume';

-- Afficher les mouvements des livres D'Alphonse Daudet 

SELECT date_out, date_in FROM loans l, books b
WHERE l.id_book = b.id_book AND author = 'Alphonse Daudet';

-- Afficher le ou les abonnés qui ont emprunté le livre “Une vie” sur l’année 2016.

SELECT first_name, date_out
FROM subscribers s, loans l, books b
WHERE s.id_subscriber = l.id_subscriber
AND b.id_book = l.id_book
AND b.title = 'Une vie'
AND l.date_out BETWEEN '2016-01-01' AND '2016-12-21';

-- Afficher le nombre de livres empruntés par chaque abonné

SELECT s.first_name, COUNT(id_book)
FROM subscribers s, loans l
WHERE s.id_subscriber = l.id_subscriber
GROUP BY s.first_name;

-- Afficher le nombre de livres à rendre pour chaque abonné

SELECT s.first_name, COUNT(id_book)
FROM subscribers s, loans l
WHERE s.id_subscriber = l.id_subscriber
AND date_in IS NULL
GROUP BY s.first_name;

-- Qui a emprunté quoi et quand?

SELECT first_name, title, date_out
FROM subscribers s, books b, loans l
WHERE s.id_subscriber = l.id_subscriber
AND b.id_book = l.id_book;


-- INNER JOIN

SELECT s.id_subscriber, s.first_name, b.title FROM subscribers s
INNER JOIN loans l
ON s.id_subscriber = l.id_subscriber
INNER JOIN books b
ON b.id_book = l.id_book;


-- LEFT JOIN

INSERT INTO subscribers(first_name) VALUES('Sam');

SELECT first_name, id_book
FROM subscribers s LEFT JOIN loans l
ON s.id_subscriber = l.id_subscriber;

-- RIGHT JOIN

INSERT INTO books (title, author) VALUES('Rich Dad Poor Dad', 'Robert Kiyosaki');

SELECT b.title, l.date_out
FROM loans l RIGHT JOIN books b
ON l.id_book = b.id_book;


-- UNION / UNION ALL / UNION DISTINCT

SELECT first_name FROM subscribers
UNION DISTINCT
SELECT author FROM books; 

INSERT INTO subscribers(first_name) VALUES('Sam');



## Affichez le nombre de livres empruntés par chaque abonné.

SELECT 
    u.first_name,
    COUNT(bo.book_id)
FROM
    user u
LEFT JOIN
    borrow bo ON bo.user_id = u.id
GROUP BY
    u.id;


## Affichez le nombre de livres non rendus pour chaque abonné.

SELECT 
    u.first_name,
    COUNT(bo.book_id)
FROM
    user u
LEFT JOIN
    borrow bo ON bo.user_id = u.id
WHERE
    bo.date_in IS NULL
GROUP BY
    u.id;


## Identifiez les abonnés qui ont emprunté plusieurs fois le même livre.

SELECT 
    u.first_name,
    b.title,
    COUNT(bo.book_id)
FROM
    user u
INNER JOIN
    borrow bo ON bo.user_id = u.id
INNER JOIN
    book b ON bo.book_id = b.id
GROUP BY
    u.id, bo.book_id
HAVING 
    COUNT(bo.book_id) > 1;

# Affichez les abonnés qui n'ont emprunté qu'un seul livre au total.

SELECT 
    u.first_name,
    COUNT(bo.book_id)
FROM
    user u
INNER JOIN
    borrow bo ON bo.user_id = u.id
GROUP BY
    u.id
HAVING 
    COUNT(bo.book_id) = 1;


