<?php
require '../../dbconn.php';

try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Check if ID is set for deletion
    if(isset($_POST['id'])) {
        $id = $_POST['id'];

        // Delete the notification from the database
        $stmt = $pdo->prepare("DELETE FROM notifications WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "Notification deleted successfully!";
    } else {
        echo "ID not set.";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
  hindi pa nagana yung delete