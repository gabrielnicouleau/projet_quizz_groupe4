<?php
header('Content-Type: application/json');
require './db.php';

// Afficher les erreurs (en développement)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Fonction pour récupérer toutes les questions et réponses
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['questions'])) {
    $sql = "SELECT q.id_question, q.texte_question, r.id_reponse, r.texte_reponse, r.correcte 
            FROM question q
            LEFT JOIN reponse r ON q.id_question = r.id_question";

    $result = $conn->query($sql);

    if (!$result) {
        echo json_encode(["error" => "Erreur de requête SQL: " . $conn->error]);
        exit();
    }

    $questions = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $questions[$row['id_question']]['texte_question'] = $row['texte_question'];
            $questions[$row['id_question']]['answers'][] = [
                'id_reponse' => $row['id_reponse'],
                'texte_reponse' => $row['texte_reponse'],
                'correcte' => $row['correcte']
            ];
        }
    }

    echo json_encode(array_values($questions));
    $conn->close();
    exit();
}
?>

