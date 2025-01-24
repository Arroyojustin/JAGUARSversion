
<?php
// Include database connection
require '../../dbconn.php';

// Fetch attendance data from the database
$query = "SELECT * FROM attendance";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    $attendance_records = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $attendance_records[] = $row;
    }
    // Return the data in JSON format
    echo json_encode($attendance_records);
} else {
    // If no data, return an empty array
    echo json_encode([]);
}
?>
