<?php
// Inclure la configuration et les fonctions nécessaires
require_once 'config.php'; // Connexion à la base de données
include 'tri_selectionV2.php'; // Inclure la fonction de calcul de la médiane

header('Content-Type: application/json'); // Définir l'en-tête JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recevoir les données JSON envoyées depuis le client
    $input = json_decode(file_get_contents('php://input'), true);

    // Vérification de la validité des données
    if (isset($input['numbers']) && is_array($input['numbers'])) {
        try {
            // Récupérer les chiffres et calculer la médiane
            $numbers = $input['numbers'];
            
            // Vérifier si l'array n'est pas vide
            if (empty($numbers)) {
                http_response_code(400);
                echo json_encode(['error' => 'Le tableau de chiffres est vide']);
                exit;
            }

            $median = calculateMedian($numbers);

            // Insérer les données dans la base
            $stmt = $pdo->prepare("INSERT INTO numbers (number_list, median) VALUES (:number_list, :median)");
            $stmt->execute([
                ':number_list' => json_encode($numbers),
                ':median' => $median,
            ]);

            // Répondre en JSON avec succès
            echo json_encode([
                'success' => true,
                'message' => 'Données enregistrées avec succès',
                'data' => [
                    'numbers' => $numbers,
                    'median' => $median,
                ]
            ]);
        } catch (PDOException $e) {
            // En cas d'erreur SQL
            http_response_code(500);
            echo json_encode(['error' => 'Erreur lors de l\'insertion dans la base : ' . $e->getMessage()]);
        }
    } else {
        // Erreur si les données sont invalides
        http_response_code(400);
        echo json_encode(['error' => 'Données invalides ou non fournies. Assurez-vous d\'envoyer un tableau de chiffres.']);
    }
} else {
    // Si la méthode HTTP n'est pas POST
    http_response_code(405);
    echo json_encode(['error' => 'Méthode non autorisée. Utilisez POST.']);
}
?>
