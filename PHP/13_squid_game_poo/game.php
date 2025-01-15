<?php

class Game {

    public $heroes = [];
    public $enemies = [];
    public $listLevels = ['level1', 'level2', 'level3'];
    public $hero;

    public function __construct(){
        $this->heroes = [
            new Hero('Ali', random(0 , 100), random(0,1), random(0,1)),
            new Hero('Saeed', random(0 , 100), random(0,1), random(0,1)),
            new Hero('Reza', random(0 , 100), random(0,1), random(0,1)),
            new Hero('Majid', random(0 , 100), random(0,1), random(0,1)),
            new Hero('Hassan', random(0 , 100), random(0,1), random(0,1)),
            new Hero('Hossein', random(0 , 100), random(0,1), random(0,1)),
            new Hero('Mohammad', random(0 , 100), random(0,1), random(0,1)),
            new Hero('Javad', random(0 , 100), random(0,1), random(0,1)),
            new Hero('Mehdi', random(0 , 100), random(0,1), random(0,1)),
            new Hero('Amir', random(0 , 100), random(0,1), random(0,1)),
        ];
        $this->enemies = [
            new Enemy('Ali', random(20,80)),
            new Enemy('Saeed', random(20,80)),
            new Enemy('Reza', random(20,80)),
            new Enemy('Majid', random(20,80)),
            new Enemy('Hassan', random(20,80)),
            new Enemy('Hossein', random(20,80)),
            new Enemy('Mohammad', random(20,80)),
            new Enemy('Javad', random(20,80)),
            new Enemy('Mehdi', random(20,80)),
            new Enemy('Amir', random(20,80)),
        ];
    }

    public function start(){

    }

    private function askHeroToChooseLevel(){



    }

    private function introduceAllHeroes(){

    }

    private function askPlayToChooseHero(){

    }

    private function startFight(){

    }

    private function end(){

    

    }
} 

?>