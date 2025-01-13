<?php
include '../../dbconn.php';

$data = json_decode(file_get_contents('php://input'), true);
$requirements_id = intval($data['requirements_id']);

// Fetch student details
$sql = "SELECT * FROM requirements WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $requirements_id);
$stmt->execute();
$student = $stmt->get_result()->fetch_assoc();

if (!$student) {
    echo json_encode(['success' => false, 'message' => 'Student not found']);
    exit;
}

// Insert into approvals table
$sql = "
    INSERT INTO approvals 
    (first_name, middle_initial, last_name, gender, sport_id, height, weight, bmi, phone_number, health_protocol) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    'ssssiddsss',
    $student['first_name'],
    $student['middle_initial'],
    $student['last_name'],
    $student['gender'],
    $student['sport_id'],
    $student['height'],
    $student['weight'],
    $student['bmi'],
    $student['phone_number'],
    $student['health_protocol']
);
$stmt->execute();

// Update submitted table
$sql = "UPDATE submitted SET status = 'approved' WHERE requirements_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $requirements_id);
$stmt->execute();

echo json_encode(['success' => true, 'message' => 'Student approved successfully']);
?>
