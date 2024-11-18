<?php
// Inclure le fichier contenant la fonction mediane
include 'statistique.php';

// Tableau des salaires
$salaires = [1500, 1500, 2000, 2200, 2500, 3000, 3300, 4000, 4500];

$moyenne = array_sum($salaires) / count($salaires);


$mediane = mediane($salaires);

$nicolasSalaire = 2200;
$estSousPaye = $nicolasSalaire < $mediane ? "Oui" : "Non";

echo "Moyenne des salaires : " . $moyenne . " €\n";
echo "Médiane des salaires : " . $mediane . " €\n";
echo "Nicolas est-il parmi les moins bien payés ? " . $estSousPaye . "\n";
?>
