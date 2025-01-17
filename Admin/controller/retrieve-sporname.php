<?php
include '../../dbconn.php';

header('Content-Type: application/json'); // Return JSON response

$sql = "SELECT sport_name FROM sports ORDER BY id ASC";
$result = $conn->query($sql);

$sports = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sports[] = $row['sport_name'];
    }
}

echo json_encode(['success' => true, 'sports' => $sports]);

$conn->close();
?>
