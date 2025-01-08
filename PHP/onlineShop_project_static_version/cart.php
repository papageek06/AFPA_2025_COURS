<?php
require_once("inc/init.php");


if(isset($_POST["addToCart"]) ){

    $stmt= $pdo->query("SELECT * FROM product WHERE id = '$_POST[id_product]'") ;
    $product= $stmt->fetch(PDO::FETCH_ASSOC);
    add_product($product, $_POST["quantity"]);

}
if(isset($_GET["action"]) && $_GET["action"] == "deleteAll"){
    unset($_SESSION["cart"]);

    $msg="<div class='alert alert-success' >
    votre panier a bien ete vider
    </div>";
}

if(isset($_GET["action"]) && $_GET["action"] == "delete"){

deleteProductFromCart($_GET["id_product"]);
   
    $msg="<div class='alert alert-success' >
    votre acticle a bien ete vider
    </div>";
    
}

require_once("inc/header.php");
?>

<!-- Body content -->
<?= $msg; 
if(isset($_SESSION["cart"]) && count($_SESSION["cart"]["id_product"]) > 0 ){?>
<div class="col-md-12">
    <a class="badge badge-danger" href="?action=deleteAll">Empty shopping cart</a>
</div>


<?php }

?>

<table class="table my-5">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Photo</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
<?php
if(isset($_SESSION["cart"]) && count($_SESSION["cart"]["id_product"]) > 0){

    for ($i=0; $i < count($_SESSION["cart"]["id_product"]); $i++) {?>
      
       <tr>
            <td><?= $_SESSION["cart"]["title"][$i] ?></td>
            <td>
            <?= $_SESSION["cart"]["quantity"][$i] ?>
                <!-- <form action="">
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option selected value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </form> -->
            </td>
            <td><?= $_SESSION["cart"]["price"][$i] ?>€</td>
            <td><img style="width:50px" src="pictures/black_t-shirt.png" alt=""></td>
            <td><a href="?action=delete&id_product=<?= $_SESSION["cart"]["id_product"] [$i] ?>">Delete</a></td>
        </tr>
        <tr>

   <?php }
}
?>

       
            <td colspan="5" class="text-right"><strong>Total amount :</strong> <?= totalCartAmount(); ?>€</td>
        </tr>
    </tbody>
</table>

<div class="col-md-12">
    <a class="badge badge-dark" href="index.php">Go back to t-shirt category</a>
</div>

<div class="d-flex justify-content-end col-md-12">
    <form action="">
        <input type="submit" value="Pay" class="btn btn-outline-secondary">
    </form>
</div>

<?php
require_once("inc/footer.php");
?>