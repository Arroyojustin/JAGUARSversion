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
    // Check if student is already approved
    $checkSql = "SELECT * FROM approvals WHERE id = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("i", $requirementsId);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        echo json_encode(["success" => true, "data" => $student]);
    } else {
        echo json_encode(["success" => true, "data" => $student]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Student not found."]);
}

$stmt->close();
$conn->close();
?>
