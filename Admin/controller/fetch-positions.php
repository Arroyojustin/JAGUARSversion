<?php
include '../../dbconn.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sport_name = $_POST['sport_name'] ?? '';

    if (empty($sport_name)) {
        echo json_encode(['success' => false, 'message' => 'Sport name is required.']);
        exit;
    }

    $stmt = $conn->prepare("SELECT positions FROM sports WHERE sport_name = ?");
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("s", $sport_name);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $positions = explode(',', $row['positions']); // Assuming positions are stored as comma-separated values
            echo json_encode(['success' => true, 'positions' => $positions]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No positions found for the given sport.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to fetch positions: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
