-- Afficher le titre des livres que Chloé n'a pas encore emprunté

SELECT title FROM books WHERE id_book NOT IN (
SELECT id_book FROM loans WHERE id_subscriber IN(
SELECT id_subscriber FROM subscribers WHERE first_name = 'Chloé'));

-- STORED PROCEDURE

DELIMITER //
CREATE PROCEDURE booksNotBorrowed(IN firstName VARCHAR(30))
BEGIN

SELECT title FROM books WHERE id_book NOT IN (
SELECT id_book FROM loans WHERE id_subscriber IN(
SELECT id_subscriber FROM subscribers WHERE first_name = firstName));

END //

DELIMITER ;

-- CALL

call booksNotBorrowed('Chloé');