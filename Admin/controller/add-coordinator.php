<?php
session_start();
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middleinitial = $_POST['middleinitial'] ?? null;
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $phone = $_POST['phone'] ?? null;
    $gender = $_POST['gender'];
    $civil_status = $_POST['civil_status'];

    // Prepare and execute query to insert new coordinator into users table
    $stmt = $conn->prepare("INSERT INTO users (lastname, firstname, middle_initial, email, password, user_type, phone_no, gender, civil_status) VALUES (?, ?, ?, ?, ?, 'coordinator', ?, ?, ?)");
    $stmt->bind_param("ssssssss", $lastname, $firstname, $middleinitial, $email, $password, $phone, $gender, $civil_status);
    
    if ($stmt->execute()) {
        // Coordinator added successfully
        echo json_encode([
            'status' => 'success',
            'message' => 'Coordinator added successfully!'
        ]);
    } else {
        // Error occurred while adding coordinator
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to add coordinator. Please try again.'
        ]);
    }

    $stmt->close();
    $conn->close();
}
?>
