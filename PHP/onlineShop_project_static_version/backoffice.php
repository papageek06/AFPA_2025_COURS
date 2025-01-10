<?php
require_once("inc/init.php");
require_once("inc/header.php");

$stmt=$pdo->query("SELECT * FROM orders");
$orders= $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<table class="table table-striped">
            <thead>
                <tr>
                    <?php  for ($i=0; $i < $stmt->columnCount(); $i++) { 
                        $colum = $stmt->getColumnMeta($i);
                        echo "<th> $colum[name] </th>";
                    }?>

                </tr>
            </thead>
            <tbody>

            <?php
            foreach ($orders as $array) {?>

            
               
          <tr>
          <?php  foreach($array as $ord=>$value){
            ?>
                 
                    <td> <?=$value; ?></td>

               
<?php } ?> </tr> <?php }?>
            </tbody>
        </table>

<?php
require_once("inc/footer.php");


?>