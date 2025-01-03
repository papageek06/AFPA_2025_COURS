<?php

// construire un tableau de 10 lignes
// avec 5 cellules par ligne en PHP
// chaque ligne devra afficher un chiffre dont la valeur
// incrémentera dans chaque cellule

    $count = 1;

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

        <tbody>
            <?php 
                for ($i=0; $i < 10; $i++) { ?> 
                    <tr>
                        <?php for ($j=0; $j < 5; $j++) { ?>
                            <td><?= $count; ?></td>
                            <?php $count++;
                        }?>
                    </tr>
                <?php }
            ?>
        </tbody>

    </table>
    
</body>
</html>