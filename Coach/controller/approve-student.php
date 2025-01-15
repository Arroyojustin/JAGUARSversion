<?php
include('../../dbconn.php');

if (!isset($_POST['id'])) {
    echo json_encode(['success' => false, 'message' => 'Student ID not provided.']);
    exit();
}

$id = intval($_POST['id']); // Sanitize input

try {
    // Update student status
    $sql = "UPDATE approvals SET status = 'approved', approved_at = CURRENT_TIMESTAMP WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true, 'message' => 'Student approved successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'No changes made. Student may already be approved.']);
    }

    $stmt->close();
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error approving student.', 'error' => $e->getMessage()]);
}

$conn->close();
?>
