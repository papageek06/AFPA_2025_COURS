<?php

    require_once("./Hero.php");
    require_once("./Game.php");
    require_once("./Enemy.php");
    require_once("./Utils.php");


    $listHeroes = [
        new Hero("Seong Gi-hun", 15, 2, 1),
        new Hero("Kang Sae-byeok", 25, 1, 2),
        new Hero("Cho Sang-woo", 35, 0, 3)
    ];

    $listLevels = [
        [
            "Facile", "Moyen", "Difficile"
        ],
        [
            5, 10, 20
        ]
    ];

    $listEnemies = [
    ];

    for ($i=0; $i < 20; $i++) { 
        array_push($listEnemies, new Enemy("Enemy $i", Utils::randomNumber(1, 8), Utils::randomNumber(40, 90)));
    }

    $game = new Game($listHeroes, $listLevels, $listEnemies);
    $game->start();


?>