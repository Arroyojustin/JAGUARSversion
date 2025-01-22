<?php
session_start();
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'coach') {
        echo json_encode(['success' => false, 'message' => 'Unauthorized access.']);
        exit;
    }

    // Retrieve logged-in coach details
    $coachId = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT sports_id FROM users WHERE id = ?");
    $stmt->bind_param("i", $coachId);
    $stmt->execute();
    $stmt->bind_result($sportsId);
    $stmt->fetch();
    $stmt->close();

    if (!$sportsId) {
        echo json_encode(['success' => false, 'message' => 'Coach details not found.']);
        exit;
    }

    // Collect training schedule data
    $title = $_POST['title'] ?? null; // New title field
    $date = $_POST['date'] ?? null;
    $time = $_POST['time'] ?? null;
    $location = $_POST['location'] ?? null;

    if (!$title || !$date || !$time || !$location) {
        echo json_encode(['success' => false, 'message' => 'Missing required fields.']);
        exit;
    }

    // Insert the training schedule
    $insertQuery = "INSERT INTO training (`Title`, `Date`, `Time`, `Location`, `Status`, `created_by`) VALUES (?, ?, ?, ?, 'Pending', ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssssi", $title, $date, $time, $location, $coachId);

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
