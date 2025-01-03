<?php

require_once("haut_page.php");


// récupération de tous les logements
$stmt = $pdo->query("SELECT * FROM logement"); // PDO statement
$logements = $stmt->fetchAll(PDO::FETCH_ASSOC); // array multidimentionnel

?>

<table class="table">
    <thead>
        <tr>

            <?php

                for ($i=0; $i < $stmt->columnCount(); $i++) { 
                    $colum = $stmt->getColumnMeta($i);
                    echo "<th> $colum[name] </th>";
                }

            ?>

        </tr>
    </thead>
    <tbody>
        <?php

            foreach ($logements as $logement) {
                echo "<tr>";
                    foreach ($logement as $index => $info) {

                        if($index == "photo") {
                            echo "<td> <img style='max-height:50px' src='$info' alt='$logement[titre]' title='$logement[titre]' /> </td>";
                        } else if ($index == "titre") {
                            echo "<td> <a href='description_logement.php?id_logement=$logement[id_logement]'> $info  </a> </td>";
                        } else {
                            echo "<td>" . substr($info, 0, 10) . "..."  . "</td>";
                        } 
                    }
                echo "</tr>";
            }

        ?>
    </tbody>
</table>
<?php

require_once("bas_page.php");

?>