<?php
include 'statistique.php'; // Inclut la fonction mediane()
include 'tri_selection.php';
$salaires = [1500, 1500, 2000, 2200, 2500, 3000, 3300, 4000, 4500];

$moyenne = array_sum($salaires) / count($salaires);
$mediane = mediane($salaires);
$estSousPaye = 2200 < $mediane ? "Oui" : "Non";

echo "Moyenne des salaires :\n$moyenne €\n";
echo "Médiane des salaires :\n$mediane €\n";
?>
