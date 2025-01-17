<?php
include('../../dbconn.php');

// Get the student ID from the request
$studentId = $_GET['id'];

// Query to fetch student details and corresponding sport name
$sql = "
    SELECT 
        a.id, a.first_name, a.middle_initial, a.last_name, 
        a.gender, a.sport_id, a.height, a.weight, a.bmi, 
        a.phone_number, a.health_protocol, a.approved_at, 
        s.sport_name
    FROM approvals a
    LEFT JOIN sports s ON a.sport_id = s.id
    WHERE a.id = ?
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
