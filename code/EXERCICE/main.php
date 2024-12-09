<?php
include 'tri_selectionV2.php'; // Inclure la fonction de calcul de la médiane

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données JSON envoyées par le client
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (isset($input['numbers']) && is_array($input['numbers'])) {
        // Trier les chiffres
        $numbers = $input['numbers'];
        sort($numbers);

        // Calculer la médiane en utilisant la fonction incluse
        $median = calculateMedian($numbers);

        // Retourner les données triées avec la médiane
        echo json_encode([
            'sortedNumbers' => $numbers,
            'median' => $median
        ]);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Données invalides']);
    }
}
?>
