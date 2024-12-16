--1. Modélisation de la base de données (20 min)
--1. Utilisez MySQL Workbench pour modéliser les tables suivantes :
--◦users : id, name, email, password, created_at.
--◦categories : id, name.
--◦articles : id, title, content, user_id, category_id, created_at.
--◦comments : id, article_id, user_id, content, created_at.
--2. Ajoutez les relations suivantes :
--◦users et articles (1:N).
--◦categories et articles (1:N).
--◦articles et comments (1:N).
--3. Exportez le script SQL pour créer les tables.
--Page  sur 1 3
--TP : Création et gestion d'une base de données pour un blog
--2. Création et gestion de la base de données (10 min)
--1. Créez une base de données nommée blog.
--2. Importez le script généré pour créer les tables.
--3. Manipulation des données (30 min)
--1. Insérez plusieurs utilisateurs, catégories, articles et commentaires comme exemples.
--2. Modifiez le contenu d'un article avec une nouvelle information.

UPDATE articles SET content = 'dsl se commentaire ete pourri ' WHERE id = 1 ;

3. Supprimez un commentaire spécifique.

DELETE FROM comments WHERE id = 1;

--4. Supprimez une table entière si elle n'est plus nécessaire.

DROP TABLE comments;

--4. Lecture et filtrage de données (40 min)
--1. Écrivez  des  requêtes  SQL  pour  afficher  les  articles  avec  le  nom  de  l'auteur  et  la  catégorie 
--correspondante.

SELECT u.name , ca.name , a.* FROM users u 
INNER JOIN articles a 
ON u.id = a.users_id
INNER JOIN categories ca 
ON a.categories_id = ca.id ;


--2. Filtrez les commentaires par article, triés par date de création.

SELECT * FROM articles ORDER BY created_at;

--5. Indexation des tables (15 min)
--1. Ajoutez un index UNIQUE sur la colonne email de la table users.

ALTER TABLE users MODIFY email = UNIQUE;

--2. Ajoutez  un  index  composite  sur  les  colonnes  user_id   et  created_at   de  la  table 
--articles.

CREATE INDEX ID ON articles(users_id, created_at);

--3. Expliquez les avantages des index pour accélérer les recherches.
--Page  sur 2 3
TP : Création et gestion d'une base de données pour un blog
6. Optimisation des requêtes (20 min)
1. Analysez le plan d'exécution d'une requête complexe avec EXPLAIN.
2. Identifiez les problèmes de performance et proposez des solutions.
7. Triggers et contraintes (30 min)
1. Créez  un  trigger  pour  mettre  à  jour  une  colonne  updated_at   lors  d'une  modification 
d'article.
2. Ajoutez une contrainte de clé étrangère entre comments.article_id  et 
articles.id.
8. Sécurité et privilèges (20 min)
1. Créez  un  utilisateur  SQL  avec  des  droits  limités  pour  lire,  insérer  et  mettre  à  jour  les 
données.
2. Révoquez ses privilèges si besoin.
9. Fonction, vues et tables temporaires (30 min)
1. Créez une fonction utilisateur pour calculer le nombre de commentaires d'un article.
2. Créez une vue affichant les articles avec leur nombre de commentaires.
3. Utilisez une table temporaire pour les articles ayant plus de 10 commentaires.
10. Transactions et requêtes préparées (30 min)
1. Utilisez une transaction pour insérer un article et ses commentaires de manière atomique.
2. Créez une requête préparée pour insérer des commentaires