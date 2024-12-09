<?php
include 'tri_selectionV2.php'; // Inclure la fonction de calcul de la médiane

// Configuration de la base de données
$host = 'localhost';
$dbname = 'exercice42';
$username = 'root'; // Remplacez par votre utilisateur MySQL
$password = '';     // Remplacez par votre mot de passe MySQL

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(['error' => 'Connexion à la base de données échouée : ' . $e->getMessage()]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recevoir les données JSON envoyées depuis le serveur Mock
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (isset($input['numbers']) && is_array($input['numbers'])) {
        // Calculer la médiane
        $numbers = $input['numbers'];
        $median = calculateMedian($numbers);

        try {
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
