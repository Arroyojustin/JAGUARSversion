<?php
include('../../dbconn.php');

// Get the student ID from the request
$studentId = $_GET['id'];

// Query to fetch student details and corresponding sport name
$sql = "
    SELECT 
        r.id, r.first_name, r.middle_initial, r.last_name, 
        r.gender, r.sport_id, r.height, r.weight, r.bmi, 
        r.phone_number, r.health_protocol, r.status, 
        s.sport_name
    FROM requirements r
    LEFT JOIN sports s ON r.sport_id = s.id
    WHERE r.id = ?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $studentId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $student = $result->fetch_assoc();
    echo json_encode($student);
} else {
    echo json_encode(['error' => 'Student not found']);
}

$conn->close();
?>
