<?php

    session_start(); // la démarre ou la récupère si elle existe

    $_SESSION["name"] = "Habbani"; // l'alimenter
    $_SESSION["first_name"] = "Samih";

    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';

    unset($_SESSION["name"]); // ça enlève que le nom dans la session
    session_unset(); // la vider

    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';

?>