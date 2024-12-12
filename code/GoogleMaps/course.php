<?php
// Charger le fichier JSON
$courseFile = 'course.json'; // Chemin vers le fichier course.json

if (!file_exists($courseFile)) {
    echo json_encode(['error' => 'Fichier course.json introuvable.']);
    exit;
}

// Charger les données du fichier JSON
$courseData = json_decode(file_get_contents($courseFile), true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => 'Erreur lors du décodage du fichier JSON.']);
    exit;
}

// Récupérer l'ID de la course depuis la requête
$courseId = isset($_GET['id']) ? $_GET['id'] : null;

if (!$courseId) {
    echo json_encode(['error' => 'ID de course non fourni.']);
    exit;
}

// Rechercher la course correspondant à l'ID fourni
$selectedCourse = array_filter($courseData, function ($course) use ($courseId) {
    return $course['id'] === $courseId;
});

if (empty($selectedCourse)) {
    echo json_encode(['error' => 'Course introuvable pour l\'ID donné.']);
    exit;
}

// Extraire les marqueurs
$selectedCourse = array_values($selectedCourse)[0]; // Récupérer le premier élément
$markers = $selectedCourse['coordinates'] ?? [];

echo json_encode([
    'course_id' => $courseId,
    'markers' => $markers
]);
?>
