<?php
// Include the database connection
include('../../dbconn.php');

// Check if student_name is passed as a GET parameter
if (isset($_GET['student_name'])) {
    $studentName = trim($_GET['student_name']);  // Trim any spaces in the name

    // Prepare the SQL query to fetch student details and associated sport_name
    $sql = "
        SELECT r.*, s.id AS sport_id, s.sport_name
        FROM requirements r
        JOIN sports s ON r.sport_id = s.id
        WHERE LOWER(CONCAT(r.first_name, ' ', r.last_name)) = LOWER(?)
    ";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        // Handle SQL preparation failure
        echo json_encode(['error' => 'SQL preparation failed']);
        exit();
    }

    // Bind the student name to the query
    $stmt->bind_param('s', $studentName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the student details
        $studentData = $result->fetch_assoc();
        echo json_encode($studentData);  // Send student data as JSON response
    } else {
        // If no student is found, send an error message
        echo json_encode(['error' => 'Student not found']);
    }

    $stmt->close();
} else {
    // Handle case when student_name is not passed
    echo json_encode(['error' => 'Student name is required']);
}

// Close the database connection
$conn->close();
?>
