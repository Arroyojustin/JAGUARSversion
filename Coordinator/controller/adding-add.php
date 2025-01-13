<?php
include '../../dbconn.php';

// Get JSON data from POST request
$input = json_decode(file_get_contents('php://input'), true);

$student_no = $input['student_no'] ?? null;
$email = $input['email'] ?? null;
$password = $input['password'] ?? null;
$first_name = $input['first_name'] ?? null;
$last_name = $input['last_name'] ?? null;
$sport_id = $input['sport_id'] ?? null;


if ($student_no && $email && $password && $first_name && $last_name && $sport_id) {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare(
        "INSERT INTO users (student_no, email, password, firstname, lastname, sports_id, user_type) VALUES (?, ?, ?, ?, ?, ?, 'student')"
    );
    $stmt->bind_param("sssssi", $student_no, $email, $hashedPassword, $first_name, $last_name, $sport_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Student added successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add student.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
}

$conn->close();
?>
