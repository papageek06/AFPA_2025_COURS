<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=enterprise',
    'root',
    'root',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Use ERRMODE_EXCEPTION for better debugging
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    )
);


$nbrLinesInserted = $pdo->exec("INSERT INTO employee (first_name, name, sexe, service, date_in, salary) 
    VALUES('Samih', 'Habbani', 'm', 'informatique', '2023-01-01', 2000)");

echo 'Nombre de lignes insérées : ' . $nbrLinesInserted;

$count = $pdo->exec("UPDATE employee SET salary = 4500 WHERE first_name = 'Samih'");

echo 'Nombre de lignes modifiées : ' . $count;


?>