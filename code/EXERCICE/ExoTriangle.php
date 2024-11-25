<?php
function triangle($nb_lignes) {
    // Boucle pour chaque ligne du triangle
    for ($i = 1; $i <= $nb_lignes; $i++) {
   
        echo str_repeat("*", $i) . "<br>";
    }
}


triangle(10);
?>