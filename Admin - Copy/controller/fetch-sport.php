<?php
include '../../dbconn.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sport_name = $_POST['sport_name'] ?? '';

    if (empty($sport_name)) {
        echo json_encode(['success' => false, 'message' => 'Sport name is required.']);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO sports (sport_name) VALUES (?)");
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("s", $sport_name);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Sport added successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add sport: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
