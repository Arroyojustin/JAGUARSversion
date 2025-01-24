<?php
// include '../../dbconn.php'; // Assuming dbconn.php is in the same directory

// $sql = "SELECT Title, Date, TIME_FORMAT(Time, '%h:%i %p') AS FormattedTime, Location FROM training";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // Output data as JSON
//     $trainingData = array();
//     while($row = $result->fetch_assoc()) {
//         $trainingData[] = array(
//             'Title' => $row['Title'],  // Added title field
//             'Date' => $row['Date'],
//             'Time' => $row['FormattedTime'], // Adjusted time format
//             'Location' => $row['Location']
//         );
//     }
//     echo json_encode($trainingData);
// } else {
//     echo json_encode([]);
// }
// $conn->close();
?>
<?php
include '../../dbconn.php'; // Assuming dbconn.php is in the same directory

$sql = "SELECT student_id, timestamp FROM attendance";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data as JSON
    $attendanceData = array();
    while($row = $result->fetch_assoc()) {
        $attendanceData[] = array(
            'StudentID' => $row['student_id'],  // Student ID
            'Timestamp' => $row['timestamp']   // Timestamp
        );
    }
    echo json_encode($attendanceData);
} else {
    echo json_encode([]);
}
$conn->close();
?>
