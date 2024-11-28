<?php
$servername = "mysql";
$username = "user";
$password = "password";
$dbname = "appdb";

try {
    // Connexion à la base de données
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    // Création de la table si elle n'existe pas
    $sql = "CREATE TABLE IF NOT EXISTS example_table (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL
    )";
    $connexion->exec($sql);

    // Insertion des données
    $sql = "INSERT INTO example_table (firstname, lastname) VALUES (:firstname, :lastname)";
    $stmt = $connexion->prepare($sql);
    $stmt->execute(['firstname' => $firstname, 'lastname' => $lastname]);

    // Redirection vers index.php avec le prénom et nom
    header("Location: index.php?firstname=" . urlencode($firstname) . "&lastname=" . urlencode($lastname));
    exit;

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
