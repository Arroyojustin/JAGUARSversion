<?php
// Include the database connection
include('../../dbconn.php');

// Get the submitted data
$data = json_decode(file_get_contents("php://input"));
$studentName = $data->student_name;

// Fetch the student's ID based on the name
$sql = "SELECT id FROM requirements WHERE CONCAT(first_name, ' ', last_name) = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $studentName);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $requirements_id = $row['id'];

    // Insert into the submitted table
    $insertSql = "INSERT INTO submitted (requirements_id) VALUES (?)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param('i', $requirements_id);

    if ($insertStmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to insert data']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Student not found']);
}

$stmt->close();
$conn->close();
?>
