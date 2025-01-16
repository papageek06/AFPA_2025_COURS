<?php

    // l'héritage multiple est impossible


trait TPanier
{
    public $nbProduits = 1;

    public function affichageNbProduits()
    {
        return $this->nbProduits;
    }
}

trait TMembre
{
    public $nbMembres = 1;

    public function affichageNbMembres()
    {
        return $this->nbMembres;
    }
}

class Site
{

    use TMembre, TPanier;
}

$monSite = new Site;
echo "nbMembre : " . $monSite->affichageNbMembres() . "<br>";
echo "nbProduits : " . $monSite->affichageNbProduits() . "<br>";
