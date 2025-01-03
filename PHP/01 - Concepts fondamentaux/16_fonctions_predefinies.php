<?php

    $colors = ['yellow', 'blue', 'blue'];

    echo implode("-", $colors);
    echo '<br>';

    echo date('d/m/Y H:m:s');
    echo '<br>';

    $email = "contact@mail.com";
    echo strpos($email, "@");
    echo '<br>';

    $text = "Hello World";
    echo substr($text, 0, 3) . "...";



?>