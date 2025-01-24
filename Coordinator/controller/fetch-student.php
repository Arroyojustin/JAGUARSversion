<?php
// Include the database connection
include('../../dbconn.php');

// Query to fetch student names from the requirements table
$sql = "SELECT id, first_name, last_name FROM requirements";
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