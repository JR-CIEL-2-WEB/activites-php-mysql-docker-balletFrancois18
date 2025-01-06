<?php
// Configuration des paramètres de connexion à la base de données
$host = 'localhost'; // Adresse du serveur MySQL
$dbname = 'exercice42'; // Nom de la base de données
$username = 'eleve'; // Login pour se connecter à la base de données
$password = 'eleve'; // Mot de passe pour se connecter à la base de données

try {
    // Création d'une connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Gestion des erreurs de connexion
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}
?>
