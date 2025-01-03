<?php
// connexion
$pdo = new PDO(
    'mysql:host=localhost;dbname=enterprise',
    'root',
    'root',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Use ERRMODE_EXCEPTION for better debugging
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    )
);

print ("<h1> SELECT + QUERY + fetch()</h1>");

// requête
$stmt = $pdo->query("SELECT * FROM employee"); // Objet PDO Statement

// objet PDO statement
// FETCH
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($employees);
// echo '</pre>';

// echo '<pre>';
// var_dump(get_class_methods($stmt));
// echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table border="1">

        <thead>
            <tr>
                <?php
                    for ($i=0; $i < $stmt->columnCount(); $i++) { 
                        $column = $stmt->getColumnMeta($i); // renvoit un array d'infos
                        echo '<th>' . $column["name"] . '</th>';
                    }
                ?>
            </tr>
        </thead>

        <tbody>

            <?php

                foreach ($employees as $employee) { ?>

                    <tr>
                        <?php
                            foreach ($employee as $value) { ?>
                                <td><?= $value ?></td>
                            <?php }
                        ?>
                        <!-- <td><?= $employee["name"]; ?></td>
                        <td><?= $employee["first_name"]; ?></td>
                        <td><?= $employee["sexe"]; ?></td>
                        <td><?= $employee["service"]; ?></td>
                        <td><?= $employee["salary"]; ?></td>
                        <td><?= $employee["date_in"]; ?></td> -->
                    </tr>
                    
                <?php }

            ?>

        </tbody>
    </table>

</body>

</html>