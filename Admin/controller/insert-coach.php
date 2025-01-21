<?php
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $middleInitial = $conn->real_escape_string($_POST['middleInitial']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $phoneNumber = $conn->real_escape_string($_POST['phoneNumber']);
    $email = filter_var(trim($conn->real_escape_string($_POST['email'])), FILTER_SANITIZE_EMAIL); // Trim and sanitize email
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password
    $sportId = intval($_POST['sportId']); // Adjusted to match sport_id
    $userType = $conn->real_escape_string($_POST['userType']);

    // Check if email already exists
    $checkEmailQuery = "SELECT id FROM users WHERE LOWER(email) = LOWER('$email')";
    $checkEmailResult = $conn->query($checkEmailQuery);

    if (!$checkEmailResult) {
        echo json_encode(['success' => false, 'message' => 'Query failed: ' . $conn->error]);
        exit;
    }

    if ($checkEmailResult->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Email already exists in the users table.']);
        exit;
    }

    // Insert into users table
    $query = "INSERT INTO users (firstname, lastname, middle_initial, gender, phone_no, email, password, sports_id, user_type)
              VALUES ('$firstName', '$lastName', '$middleInitial', '$gender', '$phoneNumber', '$email', '$password', $sportId, '$userType')";

    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
    }
}

$conn->close();
?>
