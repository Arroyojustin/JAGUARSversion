<?php
header("Content-Type: application/json");

// Include the database connection file
require '../../dbconn.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['student_id'])) {
    $student_id = $data['student_id'];

    // Insert or update attendance
    $stmt = $conn->prepare("INSERT INTO attendance (student_id, date) VALUES (?, CURDATE()) ON DUPLICATE KEY UPDATE date = CURDATE()");
    $stmt->bind_param("s", $student_id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Attendance marked"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to mark attendance"]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid data"]);
}

// Close the database connection
$conn->close();
?>
