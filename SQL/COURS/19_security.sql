-- Gestion des Droits Utilisateurs

-- GRANT : Attribuer des droits.
-- [SELECT, INSERT, UPDATE]
GRANT SELECT, INSERT ON ma_base.utilisateurs TO 'user1'@'localhost' IDENTIFIED BY 'password123';

-- REVOKE : Retirer des droits.

REVOKE INSERT ON ma_base.utilisateurs FROM 'user1'@'localhost';

-- Bonnes Pratiques
-- Principe du moindre privilège : Attribuer uniquement les droits nécessaires.
-- Sécurité des mots de passe :
-- Stocker les mots de passe en utilisant un hash sécurisé (exemple : bcrypt).
-- Ne jamais stocker des mots de passe en clair.


-- Exemple : Stocker des mots de passe sécurisés

INSERT INTO utilisateurs (nom, password_hash)
VALUES ('Doe', SHA2('monmotdepasse', 256)); -- Exemple avec SHA2



-- list des privilèges

-- 1. Droits de base sur les tables
Privilège	    Description
SELECT	        Permet de lire les données d’une table.
INSERT	        Permet d'ajouter des lignes dans une table.
UPDATE	        Permet de modifier des données existantes dans une table.
DELETE	        Permet de supprimer des lignes d'une table.
ALL PRIVILEGES	Accorde tous les privilèges sur une table (équivalent à SELECT, INSERT, UPDATE, DELETE, etc.).


-- 2. Droits d'administration

Privilège	    Description
CREATE	        Permet de créer des tables, vues ou d'autres objets dans la
                base de données.
DROP	        Permet de supprimer des objets (tables, vues, etc.).
ALTER	        Permet de modifier la structure d’une table (ex. ajouter/
                supprimer une colonne).
INDEX	        Permet de créer ou de supprimer des index sur une table.


-- 3. Droits sur les bases de données

Privilège	        Description
USAGE	            Permet d'utiliser la base de données sans accorder de 
                    droits spécifiques.
CREATE DATABASE	    Permet de créer une nouvelle base de données.
SHOW DATABASES	    Permet de lister toutes les bases de données existantes.

4. Droits sur les procédures stockées

5. Droits sur les utilisateurs

