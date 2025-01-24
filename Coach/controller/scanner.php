<?php
// Include the database connection file
include('../../dbconn.php');

// Check if student_id is sent via POST
if (isset($_POST['student_id'])) {
    $studentId = $_POST['student_id'];

    // Use the database connection from dbconn.php
    // Assuming $conn is the database connection variable in dbconn.php

    // Insert attendance data into the database
    $stmt = $conn->prepare("INSERT INTO attendance (student_id, timestamp) VALUES (?, NOW())");
    $stmt->bind_param("s", $studentId);

    if ($stmt->execute()) {
        echo "Attendance marked successfully!";
    } else {
        echo "Error marking attendance: " . $stmt->error;
    }

    // Close the statement (optional as it's done automatically after the script ends)
    $stmt->close();
} else {
    echo "No student ID provided.";
}
?>
