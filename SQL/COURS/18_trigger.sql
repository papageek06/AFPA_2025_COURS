-- Introduction
-- Un trigger est une procédure qui s’exécute automatiquement après un événement (INSERT, UPDATE, DELETE) sur une table.
-- Exemple Pratique
-- Audit des suppressions dans une table de logs :

CREATE TABLE audit_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TRIGGER after_user_delete
AFTER DELETE ON utilisateurs
FOR EACH ROW
INSERT INTO audit_log (message) VALUES (CONCAT('User deleted: ', OLD.nom));

CREATE TRIGGER after_update_article
BEFORE UPDATE ON articles
FOR EACH ROW
SET NEW.created_at = NOW();

-- En SQL, dans le contexte des triggers (déclencheurs), 
-- OLD est une pseudo-table qui contient les anciennes valeurs des colonnes de la ligne affectée avant une opération DELETE ou UPDATE.

-- Utilisation de OLD
-- Lors d'un trigger DELETE :

-- OLD permet d'accéder aux valeurs des colonnes avant la suppression de la ligne.
-- Utile pour archiver, auditer ou suivre les données supprimées.
-- Lors d'un trigger UPDATE :

-- OLD donne les valeurs avant la mise à jour.
-- Peut être combiné avec NEW (qui contient les nouvelles valeurs après la mise à jour).