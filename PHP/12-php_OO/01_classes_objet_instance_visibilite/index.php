<?php

class Cart {
    public $nbrProduc; // champ (propriété/field) 

    public function addProduct() {
        return "l'article a été ajouté";

    }

    public function removeProduct() {
        return "l'article a été supprimé";
    }

    //public : accessible de partout (a l'exterieur de la classe)
    //protected : accessible uniquement dans la classe et les classes héritées
    //private : accessible uniquement dans la classe

    public function emptyCart() {
        return "le panier a été vidé";
    }
}

$cart = new Cart();
echo $cart->addProduct();
echo "<br>";
echo $cart->removeProduct();


?>