<?php

    $nationality = "ukranian";

    if($nationality == "ukranian" && $nationality != "morrocan") {
        echo "Priviet";
    } else if($nationality == "spanish") {
        echo "hola";
    } else {
        echo "Hello";
    }

    // conditions ternaire

    $language = ($nationality == "ukranian") ? "ukranian" : "english";
    echo ($nationality == "ukranian") ? "ukranian" : "english";

    $color = "yellow";

    switch ($color) {
        case 'blue':
            echo "Your favourite color is blue";
            break;
        case 'green':
            echo "Your favourite color is green";
            break;
        default:
            echo "I don't know your color";
            break;
    }


?>