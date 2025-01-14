<?php
include '../../dbconn.php';

// Query to fetch the student details
$sql = "SELECT first_name, middle_initial, last_name FROM approvals LIMIT 1"; // Replace LIMIT 1 as needed for specific student selection

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        'success' => true,
        'first_name' => $row['first_name'],
        'middle_initial' => $row['middle_initial'],
        'last_name' => $row['last_name']
    ]);
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>
