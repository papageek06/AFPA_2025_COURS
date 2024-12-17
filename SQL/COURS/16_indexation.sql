
    -- Un index améliore la vitesse des requêtes en facilitant la recherche de lignes spécifiques.
    -- Il est semblable à un index dans un livre : il permet d'accéder directement à la donnée.


-- index simple : sur une colonne

CREATE INDEX idx_nom ON utilisateurs(nom);

-- Index unique : Assure l’unicité des valeurs dans une colonne.
CREATE UNIQUE INDEX idx_unique_email ON utilisateurs(email);

-- Index composite : Sur plusieurs colonnes.

CREATE INDEX idx_nom_prenom ON utilisateurs(nom, prenom);

-- Impact sur les Performances

    -- Avantages :
        -- Accélération des requêtes SELECT.
        -- Optimisation des jointures.
    -- Inconvénients :
        -- Utilisation d’espace disque supplémentaire.
        -- Impact sur les performances des opérations INSERT, UPDATE, et DELETE.
