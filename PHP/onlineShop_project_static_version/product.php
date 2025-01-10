<?php
require_once("inc/init.php");
require_once("inc/header.php");



if(isset($_POST) && count($_POST) > 0){

    foreach ($_POST as $id=>$stock){ 
      
        $sql ="UPDATE product SET stock = :stock WHERE id = '$id' ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([ 
         ":stock" =>$stock]);   
 }
}

$stmt=$pdo->query("SELECT * FROM product");
$orders= $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<table class=" table table-striped"> 
    
            <thead>
                <tr>
              <?php  for ($i=0; $i < $stmt->columnCount(); $i++) { 
                    $colum = $stmt->getColumnMeta($i);
                    echo "<th> $colum[name] </th>";
                }?>

                </tr>
            </thead>
            <tbody class=" border=1px">

            <?php
            foreach ($orders as $array) {?>

            
               
          <tr>
          <?php  
          foreach($array as $ord=>$value){?>

            <form action="" method="POST">

               <td class=" border=1 px"><input type="" name="<?= $array["id"] ;?>" value="<?= $value ;?>" class="btn ">   </td> 

  
               
<?php } ?> 
<td class=" border=1 px">
<input type="submit" name="order_update" value="update" class="btn btn-outline-secondary">
</form> </td> 
</tr> <?php }?>
            </tbody>
        </table>
     


<?php
require_once("inc/footer.php");

?>