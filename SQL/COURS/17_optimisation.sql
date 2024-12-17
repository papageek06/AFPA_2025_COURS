-- Plan d’Exécution
    -- EXPLAIN permet d'analyser l'exécution d'une requête.
    -- Il montre :
        -- Type d’accès : Full Scan, Range, Index.
        -- Coût de la requête.
        -- Les index utilisés.

EXPLAIN SELECT * FROM employee WHERE first_name = 'Thomas';

Colonne	                 Explication
id	                     L'identifiant de la requête dans le plan d'exécution.
select_type	             Le type de requête (SIMPLE pour une requête sans sous-requête ni jointure).
table                   La table interrogée (employee dans ce cas).
partitions	            Les partitions utilisées (ici NULL, pas de partition).
type	                Type d’accès à la table (important pour les performances).
possible_keys	        Les index pouvant être utilisés (ici NULL, aucun index disponible).
key	                    L'index réellement utilisé (ici NULL, aucun index n'est utilisé).
key_len	                La longueur de l'index utilisé (ici NULL, car pas d'index).
ref	                    La colonne de référence utilisée (ici NULL).
rows	                Estimation du nombre de lignes à lire (ici 18).
filtered	            Pourcentage de lignes filtrées par la condition WHERE (ici 10%).
Extra	                Informations supplémentaires (ici Using where, car un filtre est appliqué).






Ces termes – Full Scan, Range, et Index – font partie des types d'accès que le moteur de base de données utilise lorsqu'il exécute une requête. Ils apparaissent notamment lors de l’analyse d’un plan d'exécution d’une requête (par exemple avec EXPLAIN en SQL).

Ces types d'accès indiquent comment la base de données accède aux données dans une table, et cela impacte directement les performances de la requête.

1. Full Scan (Full Table Scan)
Définition :
Le moteur de base de données parcourt toute la table ligne par ligne pour trouver les résultats.
Cela arrive quand :
Il n'y a pas d’index sur la colonne utilisée dans la clause WHERE.
La requête nécessite d'examiner toutes les lignes (par exemple avec SELECT * sans condition).
Exemple :

EXPLAIN SELECT * FROM utilisateurs WHERE age > 30;
Si la colonne age n’est pas indexée, la base va effectuer un Full Scan.
Impact :
Très lent sur les grandes tables.
Problème de performance si le volume de données est important.

2. Range Scan
Définition :
Le moteur de base de données utilise un index pour parcourir seulement une plage de lignes.
Cela se produit quand la requête utilise des conditions de type plage :
BETWEEN, >, <, >=, <=.
Certaines clauses avec LIKE.
Exemple :

EXPLAIN SELECT * FROM utilisateurs WHERE age BETWEEN 25 AND 40;
Si un index existe sur la colonne age, la base utilisera un Range Scan.
Impact :
Beaucoup plus rapide qu’un Full Scan.
L’accès est limité à la plage définie, réduisant les données à parcourir.

3. Index Scan
Définition :
Le moteur utilise un index pour accéder directement aux lignes correspondantes.
Cela arrive lorsqu’il y a un index sur la colonne utilisée dans la clause WHERE ou JOIN.