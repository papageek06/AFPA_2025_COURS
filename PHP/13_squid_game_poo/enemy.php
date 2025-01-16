<?php

    require_once("./Character.php");

    class Enemy extends Character {

        private $age;

        public function __construct($name, $marbles, $age) {
            parent::__construct($name, $marbles);
            $this->age = $age;
        }
        

        public function getAge() {
            return $this->age;
        }

        public function setAge($age) {
            $this->age = $age;
        }

    }


?>