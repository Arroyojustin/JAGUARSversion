<?php
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];

    // Insert the training schedule
    $insertQuery = "INSERT INTO training (`Date`, `Time`, `Location`, `Status`) VALUES (?, ?, ?, 'Pending')";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sss", $date, $time, $location);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to insert training schedule.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}

$conn->close();
?>
