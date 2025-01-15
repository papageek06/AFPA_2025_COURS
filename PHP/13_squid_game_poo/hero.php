<?php

class Hero extends Character {

    public $bonus;
    public $malus;

    public function __construct($name, $marbles, $bonus, $malus) {
        parent::__construct($name, $marbles);
        $this->bonus = $bonus;
        $this->malus = $malus;
    }

    public function choseOddOrEven(){

    }

    public function cheat(){

    }

    public function replay(){

    }

}

?>