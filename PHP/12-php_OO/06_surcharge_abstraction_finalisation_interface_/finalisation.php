<?php


    // la classe ne peut pas être héritée
    final class App {       
        
        public const TOTO = "x";

    }

    class App2 {

        // En PHP, une méthode déclarée comme final est une méthode qui ne peut pas être redéfinie ou 
        // remplacée dans une classe enfant. Cela permet de protéger le comportement de cette méthode 
        // pour garantir qu'il reste inchangé, 
        // même si la classe est héritée.
        final public function start() {
            return "L'application vient de se lancer";
        }

    }

    class Toto extends App2 {

        // public function start() {
        //     return "L'application vient de se lancer";
        // }
    }



?>

















