<?php
include '../../dbconn.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize form inputs
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $middleInitial = $conn->real_escape_string($_POST['middleInitial']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $phoneNumber = $conn->real_escape_string($_POST['phoneNumber']);
    $sportCategory = $conn->real_escape_string($_POST['sportCategory']); // Selected sport name
    $email = $conn->real_escape_string($_POST['email']); // Capture email correctly
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure password hashing

    // Check if email is empty or invalid (optional validation)
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Invalid email format.";
        exit;
    }

    // Step 1: Retrieve the sport_id based on the selected sport name
    $sportQuery = "SELECT id FROM sports WHERE sport_name = ?";
    $stmt = $conn->prepare($sportQuery);
    $stmt->bind_param('s', $sportCategory); // Bind the sport name
    $stmt->execute();
    $result = $stmt->get_result();

    // Step 2: Check if the sport exists in the sports table
    if ($result->num_rows === 0) {
        echo "Error: Invalid sport category selected.";
        exit;
    }

    // Step 3: Get the sport_id from the result
    $sportData = $result->fetch_assoc();
    $sportId = $sportData['id']; // The sport_id of the selected sport

    // Step 4: Insert the new coach data into the users table
    $sql = "INSERT INTO users (firstname, lastname, middle_initial, gender, phone_no, email, password, user_type, sports_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, 'coach', ?)";

    // Prepare and bind parameters for the insert query to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssi', $firstName, $lastName, $middleInitial, $gender, $phoneNumber, $email, $password, $sportId);

    if ($stmt->execute()) {
        echo "New coach added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
