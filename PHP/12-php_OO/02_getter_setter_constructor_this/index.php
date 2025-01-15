<?php

    class Student {

        
        // encapsulation
        private $first_name; // propriété privé (champ privé) // membre de classe
        // membre de classe vs membre d'instance
        // membre de classe : les propriétés ou méthodes qui appartiennent à la classe seulement
        // membre d'instance : les propriétés ou méthodes qui appartiennent à aux objets
        
        public function __construct($first_name_arg) { // initialiser des valeurs à mes champs
            // appelé automatiquement lorsqu'un objet est instancié
            // $this->first_name = $first_name_arg;
            $this->setFirst_name($first_name_arg);
        } 

        // getter / setter
        // méthodes public qui vont permettre de retourner la valeur d'une propriété
        // et de modifier la valeur d'une propriété
        // on force le passage dans une méthode pour récupérer/modifier la valeur d'une propriété

        // getter
        public function getFirst_name() {

            $role = null;

            if($role == "admin") {
                return $this->first_name;
            } else {
                return false;
            }

        }

        // setter
        public function setFirst_name($value) {
            $this->first_name = $value;
        }

        // privé car ca fait parti du détail de l'implémentation du code
        private function calculateAverageScore() {

        }

        // public car je dois pouvoir avoir accès à la moyenne
        public function getAverageScore() {
            return $this->calculateAverageScore();
        }


    }


    $student = new Student("Fabrice");
    echo $student->getFirst_name();
    $student->setFirst_name("Samih");


?>