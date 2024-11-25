<?php
$note_maths = 15;
$note_francais = 12;
$note_hg = 9;

// Création d'un tableau avec les notes
$tab_moy = array(
    $note_maths,
    $note_francais,
    $note_hg
);

// Calcul de la moyenne
$moyenne = array_sum($tab_moy) / count($tab_moy);

echo "La moyenne est de " . $moyenne . " / 20.";
?>
