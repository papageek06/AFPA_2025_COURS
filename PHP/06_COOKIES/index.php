<?php

    $content = "";
    $pays = "";

    if(isset($_GET["pays"])){

        $pays = $_GET["pays"];

    } else if(isset($_COOKIE["pays"])) {
        $pays = $_COOKIE["pays"];
    } else {
        $pays = "fr";
    }

    $year = 365*24*3600;
    setcookie("pays", $pays, time() + $year);

    switch ($pays) {
        case 'ar':
            $content = "<p>Salam alikoum</p>";
            break;
        case 'en':
            $content = "<p>Hi there !</p>";
            break;
        case 'es':
            $content = "<p>Que pasa hombre?</p>";
            break;
        default:
            $content = "<p>Bonjour, je suis un monsieur !</p>";
            break;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Choisir sa langue : </h2>
        <ul>

            <li> <a href="?pays=fr">Français</a></li>
            <li> <a href="?pays=es">Espanol</a></li>
            <li> <a href="?pays=en">English</a></li>
            <li> <a href="?pays=ar">Arabe</a></li>

        </ul>

        <?= $content; ?>
        <!-- <?php echo $content; ?> -->
</body>
</html>