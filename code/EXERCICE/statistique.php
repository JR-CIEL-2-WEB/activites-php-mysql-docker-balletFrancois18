<?php
// Fonction pour calculer la médiane d'un tableau de nombres
function mediane($tableau) {
    // Trier le tableau
    sort($tableau);

    // Calculer la taille du tableau
    $n = count($tableau);

    // Vérifier si le tableau a une taille impaire ou paire
    if ($n % 2 == 1) {
        // Si impaire, on retourne l'élément du milieu
        return $tableau[floor($n / 2)];
    } else {
        // Si paire, on retourne la moyenne des deux éléments du milieu
        $milieu1 = $tableau[$n / 2 - 1];
        $milieu2 = $tableau[$n / 2];
        return ($milieu1 + $milieu2) / 2;
    }
}
?>
