<?php
session_start();
include '../../dbconn.php';

// Collect email and password from POST request
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Prepare and execute query to retrieve the user
$stmt = $conn->prepare("SELECT id, password, user_type, sports_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

// Check if the email exists
if ($stmt->num_rows > 0) {
    $stmt->bind_result($userId, $hashedPassword, $userType, $sportsId);
    $stmt->fetch();

    // Verify the password
    if (password_verify($password, $hashedPassword)) {
        // Set session variables
        $_SESSION['user_id'] = $userId;
        $_SESSION['email'] = $email;
        $_SESSION['user_type'] = $userType;
        $_SESSION['sports_id'] = $sportsId;

        // Redirect based on user type
        if ($userType == 'admin') {
            $redirectUrl = './Admin/Admin.php';
        } elseif ($userType == 'coordinator') {
            $redirectUrl = './Coordinator/coordinator.php';
        } elseif ($userType == 'coach') {
            $redirectUrl = './Coach/coach.php'; // Redirect to coach page
        } else {
            $redirectUrl = '../index.php'; // For undefined user types
        }

        // Send success response
        echo json_encode([
            'status' => 'success',
            'message' => 'Login Successful',
            'redirect' => $redirectUrl
        ]);
    } else {
        // Invalid password
        echo json_encode(['status' => 'error', 'message' => 'Invalid password.']);
    }
} else {
    // Email not registered
    echo json_encode(['status' => 'error', 'message' => 'Sorry you still not have official Account.']);
}

$stmt->close();
$conn->close();
?>
