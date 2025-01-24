<?php
// Include the database connection file using PDO
include('../../dbconn.php');

// Check if student_id is sent via POST
if (isset($_POST['student_id'])) {
    $studentId = $_POST['student_id'];

    try {
        // Prepare the SQL query to insert the attendance record
        $stmt = $conn->prepare("INSERT INTO attendance (student_id, timestamp) VALUES (?, NOW())");

        // Bind the student ID parameter
        $stmt->bindParam(1, $studentId, PDO::PARAM_STR);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Attendance marked successfully!";
        } else {
            echo "Error marking attendance.";
        }
    } catch (PDOException $e) {
        // Handle any errors with the database connection
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No student ID provided.";
}
?>
