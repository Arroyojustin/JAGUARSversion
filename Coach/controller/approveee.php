<?php
include '../../dbconn.php';

$data = json_decode(file_get_contents("php://input"), true);
$requirementsId = $data['requirements_id'] ?? null;

if (!$requirementsId) {
    echo json_encode(["success" => false, "error" => "Invalid requirements ID."]);
    exit;
}

// Fetch student details from the requirements table
$sql = "SELECT * FROM requirements WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $requirementsId);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

if (!$student) {
    echo json_encode(["success" => false, "error" => "Student not found in requirements table."]);
    exit;
}

// Insert student details into the approvals table
$insertSql = "INSERT INTO approvals 
    (id, first_name, middle_initial, last_name, gender, sport_id, height, weight, bmi, phone_number, health_protocol, status) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'approved')";
$insertStmt = $conn->prepare($insertSql);

$insertStmt->bind_param(
    "isssiiiddss", 
    $requirementsId, 
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

if ($insertStmt->execute()) {
    $updateSql = "UPDATE submitted SET status = 'approved' WHERE requirements_id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("i", $requirementsId);
    $updateStmt->execute();

    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => "Failed to record approval: " . $conn->error]);
}

$insertStmt->close();
$stmt->close();
$conn->close();
?>
