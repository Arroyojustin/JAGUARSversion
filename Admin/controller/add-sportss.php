<?php
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sportName = trim($_POST['sport_name']);
    $positions = trim($_POST['positions']);

    if (empty($sportName) || empty($positions)) {
        echo json_encode(["success" => false, "message" => "Sport name and positions are required."]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO sports (sport_name, positions) VALUES (?, ?)");
    $stmt->bind_param("ss", $sportName, $positions);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to add sport."]);
    }

    $stmt->close();
}
?>
