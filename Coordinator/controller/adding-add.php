<?php
include '../../dbconn.php';

// Get JSON data from POST request
$input = json_decode(file_get_contents('php://input'), true);

$student_no = $input['student_no'] ?? null;
$email = $input['email'] ?? null;
$password = $input['password'] ?? null;

if ($student_no && $email && $password) {
    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert into users table
    $stmt = $conn->prepare("INSERT INTO users (student_no, email, password, user_type) VALUES (?, ?, ?, 'student')");
    $stmt->bind_param("sss", $student_no, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Student added successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add student.']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
}

$conn->close();
?>
