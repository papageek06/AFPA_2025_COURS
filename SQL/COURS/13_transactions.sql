-- ROLLBACK

START TRANSACTION;
SELECT * FROM employees;
UPDATE employees SET salary = 123 WHERE id_employee = 21;
SELECT * FROM employees;
ROLLBACK; -- COMMIT

-- COMMIT

START TRANSACTION;
SELECT * FROM employees;
UPDATE employees SET salary = 123 WHERE id_employee = 21;
SELECT * FROM employees;
COMMIT; -- ROLLBACK