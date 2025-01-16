<?php
include '../../dbconn.php';

// Check if data is being sent via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sport_name = $_POST['sport_name'];
    $positions = json_decode($_POST['positions'], true); // Decode JSON array

    // Insert sport name into the database
    $stmt = $conn->prepare("INSERT INTO sports (sport_name, positions) VALUES (?, ?)");
    $positions_str = implode(',', $positions); // Convert array to comma-separated string
    $stmt->bind_param('ss', $sport_name, $positions_str);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
    $stmt->close();
}

$conn->close();
?>
