<?php
// median.php

function calculateMedian(array $numbers) {
    sort($numbers); // Trier les chiffres
    $count = count($numbers);

    if ($count === 0) {
        return null; // Pas de médiane pour un tableau vide
    }

    if ($count % 2 === 0) {
        // Si le nombre de chiffres est pair, la médiane est la moyenne des deux valeurs centrales
        return ($numbers[$count / 2 - 1] + $numbers[$count / 2]) / 2;
    } else {
        // Si le nombre de chiffres est impair, la médiane est la valeur centrale
        return $numbers[floor($count / 2)];
    }
}
?>