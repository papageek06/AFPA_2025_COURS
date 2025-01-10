<?php

function isUserConnected(){
    return (isset($_SESSION["user"]))? true : false ;
}

function isUserConnectedAndAdmin(){
    return ( isUserConnected() && ($_SESSION["user"]["status"] == 1 ))? true : false ;
}

function creat_card_session(){
    if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] ["id_product"]= array();
    $_SESSION["cart"] ["quantity"]= array();
    $_SESSION["cart"] ["price"]= array();   
    $_SESSION["cart"] ["title"]= array();
    $_SESSION["cart"] ["picture"]= array();
    $_SESSION["cart"] ["stock"]= array();
    }
}

function add_product($product, $quantity){
    creat_card_session();

    $positionProduct = array_search( $product["id"], $_SESSION["cart"]["id_product"] );

    if($positionProduct !== false){
        $_SESSION["cart"] ["quantity"][$positionProduct] += $quantity;
    }else{

        $_SESSION["cart"] ["id_product"][] = $product["id"];
        $_SESSION["cart"] ["quantity"][] = $quantity;
        $_SESSION["cart"] ["price"][] = $product["price"];
        $_SESSION["cart"] ["title"][] = $product["title"];
        $_SESSION["cart"] ["picture"][] = $product["picture"];
        $_SESSION["cart"] ["stock"][] = $product["stock"];
    }
}

function totalProductsInCart(){
    if(isset($_SESSION["cart"])){
        return count($_SESSION["cart"]["id_product"]);
        } else {
            return 0;
        }
}

function deleteProductFromCart($id_product) {

$positionProduct = array_search( $id_product,$_SESSION["cart"]["id_product"] );

if($positionProduct !== false){
unset($_SESSION["cart"]["id_product"][$positionProduct]);
unset($_SESSION["cart"]["title"][$positionProduct]);
unset($_SESSION["cart"]["price"][$positionProduct]);
unset($_SESSION["cart"]["quantity"][$positionProduct]);
unset($_SESSION["cart"]["picture"][$positionProduct]);
unset($_SESSION["cart"]["stock"][$positionProduct]);

$_SESSION["cart"] ["id_product"]= array_values($_SESSION["cart"]["id_product"]);
$_SESSION["cart"] ["quantity"]= array_values($_SESSION["cart"]["quantity"]);
$_SESSION["cart"] ["price"]= array_values($_SESSION["cart"]["price"]);   
$_SESSION["cart"] ["title"]= array_values($_SESSION["cart"]["title"]);
$_SESSION["cart"] ["picture"]= array_values($_SESSION["cart"]["picture"]);
$_SESSION["cart"] ["stock"]= array_values($_SESSION["cart"]["stock"]);

}

}

function totalCartAmount(){
    $total=0;
    if(isset($_SESSION["cart"])){
        for ($i=0; $i < count($_SESSION["cart"] ["id_product"]); $i++) { 
        $total += $_SESSION["cart"] ["price"][$i] * $_SESSION["cart"] ["quantity"][$i];
        }
    }
    return $total;
}


function verifySession(){
if(isset($_SESSION["user"]) && count($_SESSION["cart"]) > 0){

    return true;

}else {
    return false;
}

}

function stock(){

$stmt=$pdo->query("SELECT id , stock FROM product");
$products=$stmt->fetchAll(PDO::FETCH_ASSOC);



}

?>