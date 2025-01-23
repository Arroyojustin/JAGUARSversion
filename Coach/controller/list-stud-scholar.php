<?php
require '../../dbconn.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$studentId = $_POST['studentId'];
$scholar = $_POST['scholar'];

// Validate input
if (empty($studentId) || empty($scholar)) {
    echo "Invalid input. Please fill in all fields.";
    exit;
}

// Update the database
$sql = "UPDATE users SET scholar = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('si', $scholar, $studentId);

if ($stmt->execute() && $stmt->affected_rows > 0) {
    echo "Scholar information updated successfully!";
} else {
    echo "Error updating scholar info: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
