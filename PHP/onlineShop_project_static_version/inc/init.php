<?php

$pdo = new PDO(
        'mysql:host=localhost;dbname=shop',
        'root',
        '',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Use ERRMODE_EXCEPTION for better debugging
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        )
    );

    
    require_once('fonction.php') ;

    $msg ="";

    session_start();
    ?>