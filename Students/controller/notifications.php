<?php
include '../../dbconn.php'; // Assuming dbconn.php is in the same directory

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch notifications
$sql = "SELECT message FROM notifications ORDER BY created_at DESC";
$result = $conn->query($sql);

$notifications = [];
if ($result->num_rows > 0) {
    // Output each notification message
    while($row = $result->fetch_assoc()) {
        $notifications[] = $row['message'];
    }
} else {
    $notifications[] = "No notifications available.";
}

$conn->close();

// Return notifications as JSON
echo json_encode($notifications);
?>
