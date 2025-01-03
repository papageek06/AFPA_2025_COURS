<?php 

require_once("haut_page.php");


    if(isset($_GET["id_logement"])) {

        $id = $_GET["id_logement"];
        $stmt = $pdo->query("SELECT * FROM logement WHERE id_logement = '$id'");
        $logement = $stmt->fetch(PDO::FETCH_ASSOC);

    }

?>


    <ul>
        <?php 
            foreach ($logement as $key => $value) {
                echo "<li> $value </li>";
            }
        ?>
    </ul>

<?php

require_once("bas_page.php");

?>
