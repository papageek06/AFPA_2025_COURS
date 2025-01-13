<?php

require_once("../inc/init.php");

    $stmt = $pdo->query("SELECT * FROM product");


$id_product = isset($id_product) ? $id_product : "";
$reference = isset($reference) ? $reference : "";
$price = isset($price) ? $price : "";
$stock = isset($stock) ? $stock : "";
$category = isset($category) ? $category : "";
$public = isset($public) ? $public : "";
$size = isset($size) ? $size : "";
$picture = isset($picture) ? $picture : "";
$color = isset($color) ? $color : "";
$title = isset($title) ? $title : "";
$description = isset($description) ? $description : "";

require_once("inc/header.php");

?>


<table class="table">
  <thead>
    <tr>

        <?php

            for($i = 0; $i < $stmt->columnCount(); $i++) {
                $infoColumn = $stmt->getColumnMeta($i);
                echo "<th>" . $infoColumn['name'] . "</th>";
            }
        ?>

        <th>Modifier</th>
        <th>Supprimer</th>

    </tr>
  </thead>
  <tbody>

    <?php foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $key => $product) {?>
        <tr>
            <?php 
                foreach ($product as $index => $info) {
                    if($index == "picture") {
                        echo "<td> <img src=../pictures/" . $info . " width='50' height='50' alt='' title='' /> </td>";
                    } else {
                        echo "<td> $info </td>";
                    }
                }

                echo "<td><a href='?id_produt='" . $product["id"] . "&action=modify>Modifier</a></td>";
                echo "<td><a href='?id_produt='" . $product["id"] . "&action=delete>Supprimer</a></td>";
            ?>
        </tr>
    <?php } ?>


  </tbody>
</table>


<br>
<br>
<br>
<br>
<br>
<form id="form" action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_product" value="<?= $id_product; ?>">
    <input type="hidden" name="prevPicture">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="reference">Reference</label>
            <input type="text" class="form-control" id="reference" value="<?= $reference; ?>" name="reference">
        </div>
        <div class="form-group col-md-3">
            <label for="category">Category</label>
            <input type="text" class="form-control" id="category" value="<?= $category; ?>" name="category">
        </div>
        <div class="form-group col-md-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" value="<?= $title; ?>" name="title">
        </div>
        <div class="form-group col-md-3">
            <label for="color">Color</label>
            <input type="text" class="form-control" id="color" value="<?= $color; ?>" name="color">
        </div>
        <div class="form-group col-md-3">
            <label for="size">Size</label>
            <input type="text" class="form-control" id="size" value="<?= $size; ?>" name="size">
        </div>
        <div class="form-group col-md-3">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" value="<?= $price; ?>" name="price">
        </div>
        <div class="form-group col-md-3">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" id="stock" value="<?= $stock; ?>" name="stock">
        </div>
        <div class="w-100"></div>

        <!-- FAIRE VARIABLED LE SELECTED DES INPUTS -->

        <div class="form-group col-md-2">
            <label for="public_m">Public</label>
            <div class="custom-control custom-radio">
                <input type="radio" id="public_m" name="public" class="custom-control-input" value="m" checked="">
                <label class="custom-control-label" for="public_m">Male</label>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label for="public_f" style="color:transparent">Public</label>
            <div class="custom-control custom-radio">
                <input type="radio" id="public_f" name="public" class="custom-control-input" value="f">
                <label class="custom-control-label" for="public_f">Female</label>
            </div>
        </div>

        <div class="custom-file mb-5">

            <input type="file" class="custom-file-input" id="myPicture" name="myPicture">
            <label class="custom-file-label" for="myPicture">Choose a picture</label>
            <?php if (isset($_GET["action"]) && $_GET["action"] == "modify") { ?>
                <div>
                    <img width="50px" src="<?= $picture; ?>" alt="<?= $title; ?>">
                </div>
            <?php } ?>
        </div>
        <div class="form-group col-md-12">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="<?= $description; ?>">
        </div>

        <?php if (isset($_GET["action"]) && $_GET["action"] == "modify") { ?>
            <button type="submit" class="btn btn-secondary" name="modifyProduct">Modify a product</button>
        <?php } else { ?>
            <button type="submit" class="btn btn-secondary" name="addProduct">Add a product</button>
        <?php } ?>

    </div>

</form>

<?php

require_once("inc/footer.php");

?>