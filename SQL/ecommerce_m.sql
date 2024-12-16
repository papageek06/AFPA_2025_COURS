
-- tp 7
--1. Affichez tous les détails des commandes, avec le nom du produit et l'email de l'utilisateur.

 SELECT o.* ,p.name , u.email FROM orders o ,products p ,users u ;

 SELECT u.email , o.* , u.email FROM users u 
 INNER JOIN orders o ON u.id=o.user_id
 INNER JOIN order_details od ON o.id = od.orders_id 
 INNER JOIN products p ON od.products_id = p.id;

--2. Affichez le total dépensé par chaque utilisateur.

 SELECT u.id, u.name, SUM(p.price * od.quantity) AS total_depense
FROM users u
LEFT JOIN orders o ON u.id = o.user_id
LEFT JOIN order_details od ON o.id = od.orders_id
LEFT JOIN products p ON od.products_id = p.id
GROUP BY u.id, u._name;

--3. Trouvez tous les produits jamais commandés.
SELECT p.name FROM products p
INNER JOIN order_details od ON p.id = od.products_id WHERE p.id != od.products_id ;

--8. Transactions et procédures (15 min)

--1. Implémentez une transaction qui :
 --  - Insère une nouvelle commande pour un utilisateur.
 START TRANSACTION;
 INSERT INTO orders (order_date , total_price ,status , user_id) VALUES (CURDATE(), (SELECT price FROM products WHERE id=1 ) ,'Pending' , 1) ;

 SET @product_id =1;
 SET @quantity =2
 --  - Met à jour le stock du produit commandé.
 SELECT stock_quantity INTO @current_stock
 FROM products_id
 WHERE id = @products_id
 IF @current_stock >= @quantity THEN
 UPDATE products
 SET stock_quantity = stock_quantity - @quantity
 WHERE id =@product_id

 COMMIT;
 ELSE 
  --  - Annule la transaction si le stock est insuffisant.
 SIGNAL SQLSTATE '45000'
 SET MESSAGE_TEXT = CONCAT('STOCK insuffisant pour ce produit' , @product_id)
 ROLLBACK;
 END IF;

-- PROCÉDURE STOCKÉE

DELIMITER //

CREATE PROCEDURE create_order_and_update_stock(
    IN user_id INT,
    IN product_id INT,
    IN quantity INT
)
BEGIN
    DECLARE current_stock INT;
    DECLARE new_order_id INT;
    DECLARE product_price DECIMAL(10,2);
    DECLARE total_price DECIMAL(10,2);

    START TRANSACTION;

    -- 1. Récupérer le stock actuel et le prix du produit
    SELECT stock_quantity, price
    INTO current_stock, product_price
    FROM products
    WHERE id = product_id;

    -- 2. Vérifier si le stock est suffisant
    IF current_stock >= quantity THEN

        -- Calculer le prix total
        SET total_price = product_price * quantity;

        -- 3. Insérer la commande dans 'orders'
        INSERT INTO orders (users_id, order_date, total_price, status)
        VALUES (user_id, NOW(), total_price, 'Pending');

        -- Récupérer l'ID de la commande créée
        SET new_order_id = LAST_INSERT_ID();

        -- 4. Mettre à jour le stock du produit
        UPDATE products
        SET stock_quantity = stock_quantity - quantity
        WHERE id = product_id;

        -- 5. Insérer les détails de la commande
        INSERT INTO order_details (orders_id, products_id, quantity, subtotal)
        VALUES (new_order_id, product_id, quantity, total_price);

        -- 6. Valider la transaction
        COMMIT;

    ELSE
        -- 7. Envoyer un message d'erreur
        SIGNAL SQLSTATE '45000'
		SET MESSAGE_TEXT = 'STOCK insuffisant pour ce produit';

        ROLLBACK;
    END IF;

END //

DELIMITER ;

CALL create_order_and_update_stock(1,1,2);
--2. Créez une procédure stockée pour ajouter un produit et vérifier --automatiquement la catégorie.

--9. Fonction, variables, tables temporaires et vue (20 min)

--1. Créer une fonction utilisateur :
--Écrivez une fonction appelée `get_user_orders` qui prend l'ID d'un --utilisateur en paramètre et retourne tous les détails des commandes passées --par cet utilisateur.
   
DELIMITER//
CREATE FUNCTION get_user_orders(userId INT)
RETURNS TABLE
RETURN 
SELECT * FROM orders WHERE users_id = userId ;
//DELIMITER;


--2. Utilisation des variables :
--Déclarez une variable pour stocker la quantité totale de produits commandés --par un utilisateur spécifique.
   SET @user_id = 1 ;
   SELECT SUM(od.quantity) AS total_quantity
   FROM orders o
   INNER JOIN order_details od ON od.orders_id = o.id
   WHERE o.users_id = @userId ;
--3. Créer une table temporaire :
 --  Créez une table temporaire pour stocker les produits dont le stock est --inférieur à une certaine limite.

CREAT TEMPORARY TABLE low_stock_products AS 
SELECT * FROM products WHERE stock_quantity <5;
--4. Créer une vue :
 --  Créez une vue pour afficher les utilisateurs et leur total dépensé sur --le site e-commerce.

CREATE VIEW user_spending AS
SELECT u.name, SUM(o.total_price) AS total_spent
FROM users u 
INNER JOIN orders o ON o.users_id = u.id 
GROUP BY u.name ;

