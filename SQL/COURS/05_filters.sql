-- WHERE

SELECT * FROM employees WHERE service = 'management';

-- OPERATORS

-- BETWEEN

SELECT * FROM employees WHERE starting_date BETWEEN '2005-03-01' AND '2017-03-01';

-- curdate()

SELECT * FROM employees WHERE starting_date BETWEEN '2017-03-01' AND CURDATE();

-- LIKE

SELECT first_name FROM employees WHERE first_name LIKE 'S%';
SELECT first_name FROM employees WHERE first_name LIKE '%s';
SELECT first_name FROM employees WHERE first_name LIKE '%s%';

-- !=

SELECT * FROM employees WHERE service != 'management';


-- COMPARISON OPERATORS

SELECT first_name, name, service, salary FROM employees WHERE salary > 3000;

SELECT first_name, name, service, salary FROM employees WHERE salary >= 3000;

SELECT first_name, name, service, salary FROM employees WHERE salary < 3000;

SELECT first_name, name, service, salary FROM employees WHERE salary <= 3000;

-- IN 

SELECT * FROM employees WHERE service IN ('management','production');

-- NOT IN

SELECT * FROM employees WHERE service NOT IN ('management','production');

-- Built-in functions

-- Annual salary
SELECT first_name, name, service, (salary*12) AS 'annual salary' FROM employees;

-- Annual salary cost
SELECT SUM(salary*12) as 'annual salary sum' FROM employees;

-- Average salary

SELECT AVG(salary) as 'monthly average salary' FROM employees;

-- Rounded average salary
SELECT ROUND(AVG(salary), 2) as 'monthly average salary' FROM employees;

-- Number of salaries
SELECT COUNT(first_name) FROM employees;
SELECT COUNT(*) FROM employees;

-- Max salary
SELECT MAX(salary) AS 'maximum salary' FROM employees;

-- Min salary
SELECT MIN(salary) AS 'minimum salary' FROM employees;

-- Max salary and its first name
SELECT first_name FROM employees WHERE salary = 4500;

SELECT first_name FROM employees WHERE salary = (SELECT MAX(salary) FROM employees);


-- GROUP BY
SELECT service, COUNT(first_name) FROM employees GROUP BY service;

-- HAVING
SELECT service, COUNT(first_name) FROM employees GROUP BY service HAVING COUNT(first_name) >= 2;

-- ORDER BY

SELECT first_name FROM employees ORDER BY first_name ASC;
SELECT first_name FROM employees ORDER BY first_name DESC;

SELECT first_name, service FROM employees WHERE service = 'production' ORDER BY first_name DESC;

SELECT * FROM employees ORDER BY salary ASC, first_name DESC;

-- Limitation

SELECT first_name FROM employees ORDER BY first_name ASC LIMIT 0, 5;

SELECT first_name FROM employees ORDER BY first_name ASC LIMIT 5;

SELECT first_name FROM employees ORDER BY first_name ASC LIMIT 5, 5;