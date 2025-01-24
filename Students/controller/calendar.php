<?php
include '../../dbconn.php'; // Assuming dbconn.php is in the same directory

$sql = "SELECT Date, TIME_FORMAT(Time, '%h:%i %p') AS FormattedTime, Location FROM training";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data as JSON
    $trainingData = array();
    while($row = $result->fetch_assoc()) {
        $trainingData[] = array(
            'Date' => $row['Date'],
            'Time' => $row['FormattedTime'], // Adjusted time format
            'Location' => $row['Location']
        );
    }
    echo json_encode($trainingData);
} else {
    echo json_encode([]);
}
$conn->close();
?>
