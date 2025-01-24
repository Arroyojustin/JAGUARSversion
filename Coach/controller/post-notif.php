<?php
require '../../dbconn.php'; // Include the db connection

// Check if message is sent
if (isset($_POST['message'])) {
    $message = $_POST['message'];

    // Insert message into database using prepared statement
    $stmt = $conn->prepare("INSERT INTO notifications (message) VALUES (?)");
    $stmt->bind_param('s', $message);
    
    if ($stmt->execute()) {
        echo "Notification posted successfully!";
    } else {
        echo "Failed to post notification.";
    }

    $stmt->close();
} else {
    echo "Message not set.";
}

$conn->close();
?>
