<?php

    $feeling = array('Sad', 'Happy', 'Angry');
    $names = [ ['Sam', 'Paul'], ['Habbani', 'Lena'] ];
    $list = ['text', 12, true];

    echo $feeling[2]; // angry
    echo $names[0][1]; // Paul
    echo $names[1][1]; // Lena

    // fonction prédéfinie php
    array_push($feeling, 'sick');
    echo count($feeling);

    echo '<pre>';
    var_dump($feeling);
    echo '</pre>';

    for ($i=0; $i < count($feeling); $i++) { 
        echo $feeling[$i];
    }


?>