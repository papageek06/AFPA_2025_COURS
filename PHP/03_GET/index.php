<?php

    // BDD

    $listProducts = [
        [ "id" => 1, "name" => "T-shirt", "Description" => "Super tshirt", "color" => "black" ],
        [ "id" => 2, "name" => "Pull over", "Description" => "Super pull over", "color" => "yellow" ],
        [ "id" => 3, "name" => "Jean", "Description" => "Super jean", "color" => "green" ],
    ];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>HOME</h1>

    <?php

        foreach ($listProducts as $product) { ?>

            <a href="product_details.php?id_product=<?= $product["id"]; ?>"> <?= $product["name"]; ?> </a> <br>

        <?php }

    ?>

</body>
</html>