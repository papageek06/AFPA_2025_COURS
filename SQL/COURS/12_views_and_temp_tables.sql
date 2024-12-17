-- Views

CREATE VIEW view_loan AS
SELECT s.first_name, b.title, l.date_out FROM subscribers s, books b, loans l
WHERE b.id_book = l.id_book
AND s.id_subscriber = l.id_subscriber;

SHOW TABLES;

SELECT * FROM view_loan;

INSERT INTO loans (id_book, id_subscriber, date_out, date_in) VALUES(100, 6, '2021-01-01', NULL);

DROP view_loan;

-- Temporary Tables

CREATE TEMPORARY TABLE loans2017 AS
SELECT s.first_name, b.title, l.date_out FROM subscribers s, books b, loans l
WHERE b.id_book = l.id_book
AND s.id_subscriber = l.id_subscriber
AND YEAR(l.date_out) = 2017;

SELECT * FROM loans2017;

SHOW TABLES;