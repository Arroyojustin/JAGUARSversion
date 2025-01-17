<?php
// Include the database connection
include('../../dbconn.php');

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch student names from the approvals table
$sql = "SELECT id, first_name, last_name FROM approvals";
$result = $conn->query($sql);

// Initialize an array to hold the results
$students = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($students);

$conn->close();
?>
