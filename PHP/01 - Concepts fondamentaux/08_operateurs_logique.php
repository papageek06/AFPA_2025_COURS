<?php

    $a = 10;
    $b = 5;

    echo $a <= $b && $a > 3;
    // true && true => true
    // true && false => false
    // false && true => false
    // false && false => false

    $nationality = "spanish";
    
    echo $nationality == "english" || $nationality == "spanish";

    // XOR
    echo $nationality == "mexican" xor $nationality == "spanish";

?>