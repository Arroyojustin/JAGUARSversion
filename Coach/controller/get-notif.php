<?php
require_once '../../dbconn.php';

header('Content-Type: application/json');

// Fetch notifications in descending order
$sql = "SELECT * FROM notifications ORDER BY created_at DESC";
$result = $conn->query($sql);

$notifications = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notifications[] = [
            'id' => $row['id'],
            'message' => $row['message']
        ];
    }
}

echo json_encode($notifications);

$conn->close();
?>
