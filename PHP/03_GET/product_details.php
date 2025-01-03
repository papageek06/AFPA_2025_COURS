<?php

// echo '<pre>'; 
// var_dump($_GET);
// echo '</pre>';

$listProducts = [
    ["id" => 1, "name" => "T-shirt", "Description" => "Super tshirt", "color" => "black"],
    ["id" => 2, "name" => "Pull over", "Description" => "Super pull over", "color" => "yellow"],
    ["id" => 3, "name" => "Jean", "Description" => "Super jean", "color" => "green"],
];

if (isset($_GET["id_product"])) {

    $id_product = $_GET["id_product"];
    $productFromIndex = null;

    foreach ($listProducts as $product) {
        if ($product["id"] == $id_product) {
            $productFromIndex = $product;
        }
    }

}


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

                foreach ($productFromIndex as $key => $value) { ?>

                    <th><?= $key; ?></th>

                <?php }

                ?>

            </tr>


        </thead>

        <tbody>

            <tr>
                <?php

                foreach ($productFromIndex as $value) { ?>

                    <td><?= $value; ?></td>

                <?php }

                ?>

            </tr>

        </tbody>

    </table>

</body>

</html>