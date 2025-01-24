<?php
require '../../dbconn.php';

try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if message is sent
        if (isset($_POST['message'])) {
            $message = $_POST['message'];

            // Insert message into database
            $stmt = $pdo->prepare("INSERT INTO notifications (message) VALUES (:message)");
            $stmt->bindParam(':message', $message);
            $stmt->execute();
            
            echo json_encode(['status' => 'success', 'message' => 'Notification posted successfully!', 'id' => $pdo->lastInsertId()]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Message not set.']);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        // Get the notification ID from the request body
        parse_str(file_get_contents("php://input"), $data);
        if (isset($data['id'])) {
            $id = $data['id'];

            // Delete notification from the database
            $stmt = $pdo->prepare("DELETE FROM notifications WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            echo json_encode(['status' => 'success', 'message' => 'Notification deleted successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Notification ID not provided.']);
        }
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $e->getMessage()]);
}
?>
