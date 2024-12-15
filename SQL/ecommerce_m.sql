-- tp 7
--1. Affichez tous les détails des commandes, avec le nom du produit et l'email de l'utilisateur.

 SELECT o.* ,p.name , u.email FROM orders o ,products p ,users u ;

 SELECT u.email , o.* , u.email FROM users u 
 INNER JOIN orders o ON u.id=o.user_id
 INNER JOIN order_details od ON o.id = od.orders_id 
 INNER JOIN products p ON od.products_id = p.id;

--2. Affichez le total dépensé par chaque utilisateur.

 SELECT u.user_id, u.user_name, SUM(p.price * od.quantity) AS total_depense
FROM users u
LEFT JOIN orders o ON u.id = o.user_id
LEFT JOIN order_details od ON o.id = od.orders_id
LEFT JOIN products p ON od.products_id = p.id
GROUP BY u.user_id, u.user_name;

--3. Trouvez tous les produits jamais commandés.
SELECT p.name FROM products p
INNER JOIN order_details od ON p.id = od.products_id WHERE p.id != od.products_id ;

--8. Transactions et procédures (15 min)

--1. Implémentez une transaction qui :
 --  - Insère une nouvelle commande pour un utilisateur.
 INSERT INTO orders (order_date , total_price ,status , user_id) VALUES (CURDATE(), (SELECT price FROM products WHERE id=1 ) ,'Pending' , 1) ;
 --  - Met à jour le stock du produit commandé.
 UPDATE INTO products (stock_quantity) VALUES ()
 --  - Annule la transaction si le stock est insuffisant.

--2. Créez une procédure stockée pour ajouter un produit et vérifier --automatiquement la catégorie.

--9. Fonction, variables, tables temporaires et vue (20 min)

--1. Créer une fonction utilisateur :
--Écrivez une fonction appelée `get_user_orders` qui prend l'ID d'un --utilisateur en paramètre et retourne tous les détails des commandes passées --par cet utilisateur.
   
--2. Utilisation des variables :
--Déclarez une variable pour stocker la quantité totale de produits commandés --par un utilisateur spécifique.
   
--3. Créer une table temporaire :
 --  Créez une table temporaire pour stocker les produits dont le stock est --inférieur à une certaine limite.

--4. Créer une vue :
 --  Créez une vue pour afficher les utilisateurs et leur total dépensé sur --le site e-commerce.


