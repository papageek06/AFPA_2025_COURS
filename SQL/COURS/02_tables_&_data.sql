-- Create table

CREATE TABLE employees (
    id_employee INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(20) NOT NULL,
    name VARCHAR(20) NOT NULL,
    sexe ENUM('m','f') NOT NULL,
    service VARCHAR(20) NOT NULL,
    starting_date DATE NOT NULL,
    salary INT,
    PRIMARY KEY (id_employee)
);

-- SHOW TABLES

SHOW TABLES;

-- Get info

DESC employees; -- (DESCRIBE / EXPLAIN)

-- DELETE TABLE

DROP TABLE employees;

-- Modify Table

ALTER TABLE employees
MODIFY salary INT(4) NOT NULL;

-- Add column to table

ALTER TABLE employees
ADD email VARCHAR(25) NOT NULL;

-- Delete column from table

ALTER TABLE employees
DROP COLUMN email;

-- Modify column name

ALTER TABLE employees
RENAME COLUMN salaire TO salary;