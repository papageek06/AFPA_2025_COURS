<?php

    class Humain {

        public function __construct($first_name, $name, $age, $country) {
            $this->firstName = $first_name;
            $this->age = $age;
            $this->name = $name;
            $this->country = $country;
        }

        public $firstName; // field
        public $age;
        public $name;
        public $country;

        public function introduce() {
            echo "Hi, I am ". $this->firstName . " " . $this->name;
        }

    }

    $wajdi = new Humain("Wajdi", "Rouafi", "22", "France");
    $wajdi->age = 23;

    echo $wajdi->country;

    $wajdi->introduce();

?>