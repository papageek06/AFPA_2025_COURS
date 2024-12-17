-- Définition
    -- CASCADE est utilisé avec les contraintes de clés étrangères pour automatiser certaines actions lorsque des lignes parent sont supprimées ou mises à jour dans une table.

-- Types de CASCADE
    -- ON DELETE CASCADE : Supprime automatiquement les lignes enfants liées lorsqu'une ligne parent est supprimée.
    -- ON UPDATE CASCADE : Met automatiquement à jour les valeurs des clés étrangères dans les lignes enfants lorsqu'une clé primaire parent est modifiée.

CREATE TABLE parent (
    id INT PRIMARY KEY,
    name VARCHAR(50)
);

CREATE TABLE child (
    id INT PRIMARY KEY,
    parent_id INT,
    FOREIGN KEY (parent_id) REFERENCES parent(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Insertion de données
INSERT INTO parent (id, name) VALUES (1, 'Parent1');
INSERT INTO child (id, parent_id) VALUES (1, 1);

-- Suppression avec CASCADE
DELETE FROM parent WHERE id = 1;

-- La table 'child' est automatiquement mise à jour/supprimée
SELECT * FROM child; -- Résultat : Aucune ligne