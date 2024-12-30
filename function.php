<?php

// Connexion à la base de données
$server = "localhost";
$username = "root";
$password = "";
$database = "pro_note";
$conn = mysqli_connect($server, $username, $password, $database);

// Vérification de la connexion
if (!$conn) {
    die(json_encode(["error" => "Connection failed: " . mysqli_connect_error()]));
}


// Gérer les requêtes GET et POST de manière sécurisée
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $sql = "SELECT firstName, lastName, grade1, grade2, average FROM students";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        http_response_code(500);
        die(json_encode(["error" => "Query failed: " . mysqli_error($conn)]));
    }
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    // Envoi de la réponse en JSON
    header('Content-Type: application/json');
    echo json_encode($data);

} elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Vérification que les données sont présentes
    $requiredFields = ['firstName', 'lastName', 'grade1', 'grade2', 'average'];
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field])) {
            http_response_code(400); // Mauvaise requête
            die(json_encode(["error" => "Missing field: $field"]));
        }
    }
    // Récupération et nettoyage des données
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $grade1 = floatval($_POST['grade1']);
    $grade2 = floatval($_POST['grade2']);
    $average = floatval($_POST['average']);

    // Requête SQL
    $sql = "INSERT INTO students (firstName, lastName, grade1, grade2, average) 
            VALUES ('$firstName', '$lastName', $grade1, $grade2, $average)";
    
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["success" => "Record created successfully"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Error: " . mysqli_error($conn)]);
    }
}

// Fermeture de la connexion
mysqli_close($conn);
?>
