<?php

    session_start();

    if($_POST) {
        $_SESSION["pseudo"] = $_POST["pseudo"];
    }

    if(isset($_GET["action"]) && $_GET["action"] == "deconnexion") {
        session_unset();
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


    <?php if (isset($_SESSION["pseudo"])) { ?>

        <p>Je me déconnecte</p>

        <h3>Bienvenue <?= $_SESSION["pseudo"]; ?></h3>
        <a href='?action=deconnexion'>Se déconnecter</a>

    <?php } else { ?>

        <p>Je me connecte</p>

        <form action="" method="post">
            <label for="pseudo">Votre pseudo</label>
            <input type="text" id="pseudo" name="pseudo" placeholder="Votre pseudo" />
            <br>
            <br>
            <label for="pwd">Votre mot de passe</label>
            <input type="password" id="pwd" name="pwd" placeholder="Votre mot de passe" />
            <br>
            <br>
            <input type="submit" value="se connecter" />
        </form>

    <?php } ?>

</body>

</html>