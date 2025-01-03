<?php

$pdo = new PDO('mysql:host:localhost;dbname:enterprise', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

echo '<pre>';
var_dump($pdo);
echo '</pre>';

echo '<pre>';
var_dump(get_class_methods($pdo));
echo '</pre>';


?>
