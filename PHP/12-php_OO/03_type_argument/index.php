<?php

    class Animal {

        public function __construct($first_name) {
            $this->first_name = $first_name;
        }

        private $first_name;
        private $race;

        public function getFirst_name() {
            return $this->first_name;
        }

    }

    class Veterinarian {

        public $first_name;

        public function __construct($first_name) {
            $this->first_name = $first_name;
        }

        public function feedAnimal(Animal $animal) {
            echo "Je viens de nourir " . $animal->getFirst_name() . " !";
        }


    }

    $vet = new Veterinarian("Samih");
    $animal = new Animal("Royce");

    $vet->feedAnimal($animal);

?>