<?php
include '../../dbconn.php';

$requirementsId = $_GET['requirements_id'] ?? null;

if (!$requirementsId) {
    echo json_encode(["success" => false, "error" => "Invalid requirements ID."]);
    exit;
}

$sql = "SELECT * FROM requirements WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $requirementsId);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

if ($student) {
    echo json_encode(["success" => true, "data" => $student]);
} else {
    echo json_encode(["success" => false, "error" => "Student not found."]);
}

$stmt->close();
$conn->close();
?>
