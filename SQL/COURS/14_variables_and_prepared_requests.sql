-- SYSTEM VARIABLES

SHOW VARIABLES;
SELECT @@version;

-- USER VARIABLES

SET @school = "my school";
SELECT @school;

-- Analyse
-- Interpretation
PREPARE req FROM 'SELECT * FROM employees WHERE first_name = "Nathalie"';

-- Exécution
EXECUTE req;
EXECUTE req;
EXECUTE req;
EXECUTE req;
EXECUTE req;

-- 7 étapes
-- 15 étapes

PREPARE req2 FROM 'SELECT * FROM employees WHERE first_name = ?';
SET @employee2 = "Melanie";
EXECUTE req2 USING @employee2;

DROP PREPARE req2;