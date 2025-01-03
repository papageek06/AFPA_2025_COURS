<?php


    $pdo = new PDO(
        'mysql:host=localhost;dbname=twitter',
        'root',
        'root',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Use ERRMODE_EXCEPTION for better debugging
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        )
    );
    define("URL", "http://" . $_SERVER["HTTP_HOST"] . "/AFPA_2025_COURS/PHP/10_TP_TWITTER/ ");
    define("RACINE_SITE", $_SERVER["DOCUMENT_ROOT"] . "/AFPA_2025_COURS/PHP/10_TP_TWITTER/ ");

    session_start();
    $msg = "";

?>