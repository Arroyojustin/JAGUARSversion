<?php
require_once '../../dbconn.php';

header('Content-Type: application/json');

// Query to fetch sports
$sql = "SELECT id, sport_name FROM sports";
$result = $conn->query($sql);

$sports = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sports[] = $row;
    }
}

// Return sports as JSON
echo json_encode($sports);

$conn->close();
?>
