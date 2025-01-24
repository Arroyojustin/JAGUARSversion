<?php
include '../../dbconn.php';

// Set the time zone to Philippines
date_default_timezone_set('Asia/Manila');

// Query to retrieve student_id and timestamp from the attendance table
$sql = "SELECT student_id, timestamp FROM attendance";

$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Get the current date in Philippines time
$currentDate = date("l, F j, Y");

// Close the database connection
$conn->close();

// Return the data and current date as a JSON response
echo json_encode([
    'attendance' => $data,
    'currentDate' => $currentDate
]);
?>