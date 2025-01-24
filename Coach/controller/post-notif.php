<?php
require '../../dbconn.php';

try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Check if message is sent
    if(isset($_POST['message'])) {
        $message = $_POST['message'];

        // Insert message into database
        $stmt = $pdo->prepare("INSERT INTO notifications (message) VALUES (:message)");
        $stmt->bindParam(':message', $message);
        $stmt->execute();
        
        echo "Notification posted successfully!";
    } else {
        echo "Message not set.";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
