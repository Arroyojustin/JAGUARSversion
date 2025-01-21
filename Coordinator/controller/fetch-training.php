<?php
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id']; // User ID sent via AJAX

    // Query to fetch user and training details
    $query = "
        SELECT u.firstname, u.lastname, t.Date, t.Time, t.Location 
        FROM users u
        LEFT JOIN training t ON t.TrainingID = ? 
        WHERE u.id = ?
    ";

    // Prepare and bind
    $stmt = $conn->prepare($query);
    $trainingId = $_POST['training_id']; // Training ID sent via AJAX
    $stmt->bind_param("ii", $trainingId, $userId);

    // Execute and fetch results
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    // Return the data in JSON format
    echo json_encode($data);
    $stmt->close();
}
$conn->close();
?>
