<?php
// Include the database connection
include('../../dbconn.php');

// Ensure the request contains an ID
if (!isset($_POST['id'])) {
    echo json_encode(['success' => false, 'message' => 'Student ID not provided.']);
    exit();
}

$id = intval($_POST['id']); // Sanitize the input

try {
    // Query to fetch student details along with sport name
    $sql = "
        SELECT 
            a.*, 
            s.sport_name, 
            DATE_FORMAT(a.approved_at, '%b %e') AS formatted_approved_at
        FROM 
            approvals a
        LEFT JOIN 
            sports s 
        ON 
            a.sport_id = s.id
        WHERE 
            a.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        echo json_encode(['success' => true, 'student' => $student]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Student not found.']);
    }

    $stmt->close();
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error retrieving student data.', 'error' => $e->getMessage()]);
}

$conn->close();
?>
