<?php
include('../../dbconn.php');

// Get the sport ID from the request
$sportId = $_GET['id'];

// Query to fetch the sport name by sport_id
$sql = "SELECT sport_name FROM sports WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $sportId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $sport = $result->fetch_assoc();
    echo json_encode($sport);
} else {
    echo json_encode(['error' => 'Sport not found']);
}

$conn->close();
?>
