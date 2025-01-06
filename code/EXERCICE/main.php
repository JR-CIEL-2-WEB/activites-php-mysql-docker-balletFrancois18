<?php
// Inclure la configuration et les fonctions nécessaires
require_once 'config.php'; // Connexion à la base de données
include 'tri_selectionV2.php'; // Inclure la fonction de calcul de la médiane

header('Content-Type: application/json'); // Définir l'en-tête JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recevoir les données JSON envoyées depuis le client
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (isset($input['numbers']) && is_array($input['numbers'])) {
        try {
            // Calculer la médiane
            $numbers = $input['numbers'];
            $median = calculateMedian($numbers);

            // Insérer les données dans la base
            $stmt = $pdo->prepare("INSERT INTO numbers (number_list, median) VALUES (:number_list, :median)");
            $stmt->execute([
                ':number_list' => json_encode($numbers),
                ':median' => $median,
            ]);

            // Répondre en JSON
            echo json_encode([
                'success' => true,
                'message' => 'Données enregistrées avec succès',
                'data' => [
                    'numbers' => $numbers,
                    'median' => $median
                ]
            ]);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur lors de l\'insertion dans la base : ' . $e->getMessage()]);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Données invalides']);
    }
}
?>
