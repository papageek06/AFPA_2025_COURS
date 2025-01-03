<?php

    $table = "<table border='1'>";
    $count = 1;
    for ($i=0; $i < 10; $i++) { 
        $table .= "<tr>";

        for ($j=0; $j < 5; $j++) { 
            $table .= "<td> $count </td>";
            $count++;
        }

        $table .= "</tr>";
    }
    
    $table .= "</table>";

    echo $table;

?>