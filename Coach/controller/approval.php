<?php
include '../../dbconn.php';

$requirements_id = $_POST['requirements_id'] ?? null;
$status = $_POST['status'] ?? null;

if ($requirements_id && ($status === 'approved' || $status === 'rejected')) {
    $sql = "INSERT INTO approval (requirements_id, status) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $requirements_id, $status);
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => ucfirst($status) . ' successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to process the request.']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input provided.']);
}

$conn->close();
?>
