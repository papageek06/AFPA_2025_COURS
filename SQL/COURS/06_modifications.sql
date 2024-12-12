-- Modification

UPDATE employees SET salary = 4000 WHERE id_employee = 2;

UPDATE employees SET salary = 4000, service = 'management' WHERE id_employee = 2;

UPDATE employees SET salary = (salary + 100) WHERE id_employee = 2;

UPDATE employees SET salary = (salary + 100) WHERE service = 'IT';

UPDATE employees SET salary = (salary + 100) WHERE service IN('legal', 'assistant');

-- Delete

DELETE FROM employees WHERE id_employee = 22;

DELETE FROM employees WHERE salary < 1600;