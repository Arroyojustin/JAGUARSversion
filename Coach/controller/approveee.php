<?php
include '../../dbconn.php';

$data = json_decode(file_get_contents("php://input"), true);
$requirementsId = $data['requirements_id'] ?? null;

if (!$requirementsId) {
    echo json_encode(["success" => false, "error" => "Invalid requirements ID."]);
    exit;
}

// Fetch the student details from the requirements table
$sql = "SELECT * FROM requirements WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $requirementsId);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

if (!$student) {
    echo json_encode(["success" => false, "error" => "Student not found."]);
    exit;
}

// Ensure the requirements ID exists in the submitted table before inserting into approvals
$sql = "SELECT requirements_id FROM submitted WHERE requirements_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $requirementsId);
$stmt->execute();
$submittedResult = $stmt->get_result();

if ($submittedResult->num_rows === 0) {
    echo json_encode(["success" => false, "error" => "Requirements ID not found in submitted records."]);
    exit;
}

// Insert the student details into the approvals table
$sql = "INSERT INTO approvals 
    (id, first_name, middle_initial, last_name, gender, sport_id, height, weight, bmi, phone_number, health_protocol, status) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'approved')";
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "isssiiiddss", 
    $requirementsId, // Matches the id column in approvals and foreign key in submitted
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

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

$stmt->close();
$conn->close();
?>
