<?php
// Include the database connection file
include('../../dbconn.php');

// Check if student_id is sent via POST
if (isset($_POST['student_id'])) {
    $studentId = $_POST['student_id'];

    // Use prepared statements to insert the attendance data
    $stmt = $conn->prepare("INSERT INTO attendance (student_id, timestamp) VALUES (?, NOW())");
    $stmt->bind_param("s", $studentId);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        echo "Attendance marked successfully!";
    } else {
        echo "Error marking attendance: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "No student ID provided.";
}
?>
