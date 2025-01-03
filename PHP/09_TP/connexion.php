<?php

// Connexion à la BDD

$pdo = new PDO(
    'mysql:host=localhost;dbname=immobilier',
    'root',
    'root',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Use ERRMODE_EXCEPTION for better debugging
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    )
);

define("URL", "http://" . $_SERVER["HTTP_HOST"] . "/AFPA_2025/09_TP/");
define("RACINE_SITE", $_SERVER["DOCUMENT_ROOT"] . "/AFPA_2025/09_TP/");