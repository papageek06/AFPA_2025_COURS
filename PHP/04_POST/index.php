
<?php

    $error = "";

    // si j'ai un formulaire soumis en méthode post
    if($_POST) {

        $email = $_POST["email"];
        $password = $_POST["password"];

        // vérifications
        if(empty($email)) {
            $error = "<p style='color:red'>Attenton, l'email ne peut pas être vide</p>";
        }

        if(empty($password)) {
            $error .= "<p style='color:red'>Attenton, le mdp ne peut pas être vide</p>";
        }

        if(empty($error)) {

            if(strpos($email, ".com")) {

                $file = fopen("users.txt", "a");
                fwrite($file, $email . " - ");
                fwrite($file, $password . " \n ");
                fclose($file);

            } else {
                $error .= "<p style='color:red'>Attenton, l'email doit être international !</p>";
            }

        }

    }

    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

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


    <p>Les erreurs : <?= $error; ?> </p> 

    <form method="POST">

        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Enter email" id="email" value="<?= $email; ?>" />

        <br>
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter password" id="password" value="<?= $password; ?>" />

        <br>
        <br>

        <input type="submit" value="Insert" />
    </form>

</body>
</html>