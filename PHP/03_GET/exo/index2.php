<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    if(isset($_GET["email"]) && isset($_GET["password"])) {


        $email = $_GET["email"];
        $password = $_GET["password"];

            // si email = mail@mail.com et password = "toto

        if($email == "mail@mail.com" && $password = "toto") { ?>

            <p>Bienvenu sur votre compte, vous êtes connecté à l'adresse <?= $email?> </p>

        <?php } else { ?>

            <p> Mot de passe ou adresse email incorrect </p>
            <a href="index2.php">Veuillez vous reconnecter</a>

       <?php  }

    } else { ?>

        <form action="" method="GET">

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" placeholder="Enter email" />

        <br>
        <br>

        <label for="password">Password :</label>
        <input type="password" id="password" name="password" placeholder="Enter password" />

        <br>
        <br>

        <input type="submit" value="Connection"/>

        </form>


    <?php }

    ?>


</body>
</html>