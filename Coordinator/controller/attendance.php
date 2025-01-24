<?php
include('../../dbconn.php'); // Include the database connection

// Retrieve parameters
$date = $_GET['date'];
$category = $_GET['category'];
$studentName = $_GET['student_name'];

// SQL query to fetch attendance records for the selected filters
$query = "SELECT a.student_id, a.timestamp, s.name
          FROM attendance a
          JOIN students s ON a.student_id = s.student_id
          WHERE DATE(a.timestamp) = '$date'";

// Apply category filter if selected
if ($category) {
    $query .= " AND s.category = '$category'";
}

// Apply student name filter if entered
if ($studentName) {
    $query .= " AND s.name LIKE '%$studentName%'";
}

$result = mysqli_query($conn, $query);

// Check for errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$attendanceData = [];
while ($row = mysqli_fetch_assoc($result)) {
    $attendanceData[] = $row;
}

// Return data as JSON
echo json_encode($attendanceData);

// Close the connection
mysqli_close($conn);
?>
