<?php
require '../../dbconn.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the student number from the URL query parameter
$student_no = $_GET['student_no'];

// Query to fetch user details based on student number
$sql = "SELECT * FROM users WHERE student_no = '$student_no'";
$result = $conn->query($sql);

// Check if user is found
if ($result->num_rows > 0) {
    // Output the user data as JSON
    $user = $result->fetch_assoc();
    echo json_encode($user);
} else {
    echo json_encode(null); // No user found
}

// Close connection
$conn->close();
?>