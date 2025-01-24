<?php
// Database connection
require '../../dbconn.php';

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

// Get JSON input
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['student_id']) && !empty($data['student_id'])) {
    $student_id = $conn->real_escape_string($data['student_id']);

    // Insert into attendance table
    $sql = "INSERT INTO attendance (student_id) VALUES ('$student_id')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Attendance marked successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to mark attendance']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid student ID']);
}

// Close connection
$conn->close();
?>
