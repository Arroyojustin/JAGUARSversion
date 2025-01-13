<?php
include '../../dbconn.php';

if (isset($_POST['requirement_id'])) {
    $requirementId = $_POST['requirement_id'];
    $sql = "SELECT * FROM requirements WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $requirementId);
    $stmt->execute();
    $result = $stmt->get_result();
    $studentData = $result->fetch_assoc();
    echo json_encode($studentData);
}
?>
