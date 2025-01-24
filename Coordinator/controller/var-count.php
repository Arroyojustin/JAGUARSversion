<?php
include '../../dbconn.php';

// Query to count varsity students
$varsityQuery = "SELECT COUNT(*) AS varsity_count FROM users WHERE user_type = 'student'";
$varsityResult = $conn->query($varsityQuery);
$varsityCount = $varsityResult->num_rows > 0 ? $varsityResult->fetch_assoc()['varsity_count'] : 0;

// Query to count approved students
$approvedQuery = "SELECT COUNT(*) AS approved_count FROM users WHERE user_type = 'student' AND sports_id IS NOT NULL";
$approvedResult = $conn->query($approvedQuery);
$approvedCount = $approvedResult->num_rows > 0 ? $approvedResult->fetch_assoc()['approved_count'] : 0;

// Return data as JSON
echo json_encode([
    'varsity_count' => $varsityCount,
    'approved_count' => $approvedCount
]);

$conn->close();
?>
