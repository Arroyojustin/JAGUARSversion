<?php
include('../../dbconn.php');

// Get the JSON input
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['requirements_id'])) {
    echo json_encode(['error' => 'Requirements ID is required.']);
    exit;
}

$requirements_id = $data['requirements_id'];

// Insert into the `submitted` table
$sql = "INSERT INTO submitted (requirements_id) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $requirements_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => 'Failed to submit requirement.']);
}

$stmt->close();
$conn->close();
?>
