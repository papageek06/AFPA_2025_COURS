<?php

    require_once("Character.php");

    class Hero extends Character {

        private $loss;
        private $gain;

        public function __construct($name, $marbles, $loss, $gain) {
            parent::__construct($name, $marbles);
            $this->loss = $loss;
            $this->gain = $gain;
        }

        public function getLoss() {
            return $this->loss;
        }

        public function setLoss($loss) {
            $this->loss = $loss;
        }

        public function getGain() {
            return $this->gain;
        }

        public function setGain($gain) {
            $this->gain = $gain;
        }

        public function chooseOddOrEven() {
            return Utils::randomNumber(1, 2);
        }

        public function cheat() {
            $choice = Utils::randomNumber(1, 2);
            return $choice == 1 ? true : false;
        }

        public function introduce(){

        }

        public function replay() {

        }
        
    }


?>