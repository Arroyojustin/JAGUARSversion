<?php
require '../../dbconn.php';
session_start();

// Ensure the user is logged in and is a coach
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'coach') {
    echo json_encode(['error' => 'Unauthorized access']);
    exit;
}

// Get the sports_id of the logged-in coach
$coachSportsId = $_SESSION['sports_id'];

// Query to retrieve students with the same sports_id as the coach
$sql = "SELECT firstname, lastname, scholar 
        FROM users 
        WHERE user_type = 'student' AND sports_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $coachSportsId);
$stmt->execute();
$result = $stmt->get_result();

$students = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($students);

$stmt->close();
$conn->close();
?>
