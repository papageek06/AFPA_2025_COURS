-- MIN
-- MAX
-- ROUND
-- COUNT
-- ...

-- CURDATE()
SELECT CURDATE();
SELECT CURTIME();
SELECT NOW();

-- DATE_FORMAT
SELECT id_loan, id_book, DATE_FORMAT(date_out, '%D/%M/%Y') FROM loans;

SELECT id_loan, id_book, DATE_FORMAT(date_out, '%d/%m/%y') FROM loans;

SELECT id_loan, id_book, DATE_FORMAT(date_out, '%d/%m/%y %H:%I:%S') FROM loans;

-- MD5

SELECT MD5('HELLO');

-- CONCAT

SELECT CONCAT(id_subscriber, '_', first_name) FROM subscribers;