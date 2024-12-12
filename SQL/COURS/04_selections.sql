-- SELECT FROM

SELECT * FROM employees;

-- first name and name

SELECT first_name, name FROM employees;

-- Distinct

INSERT INTO employees (first_name, name, sexe, service, starting_date, salary) VALUES
('Thomas', 'Camille', 'm', 'sales', '2019-03-01', 3500);

SELECT DISTINCT first_name FROM employees;
SELECT DISTINCT service FROM employees;

-- WHERE

SELECT * FROM employees WHERE service = 'management';

-- GROUP BY

-- HAVING

-- ORDER BY