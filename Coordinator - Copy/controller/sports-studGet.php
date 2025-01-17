<?php
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sport_name'])) {
    $sport_name = $_POST['sport_name'];

    // Securely fetch the sport_id
    $stmt = $conn->prepare("SELECT id FROM sports WHERE sport_name = ?");
    $stmt->bind_param("s", $sport_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $sport = $result->fetch_assoc();

    if ($sport) {
        $sport_id = $sport['id'];

        // Fetch students with the sport_id
        $stmt = $conn->prepare("SELECT id, first_name, last_name, sport_id FROM approvals WHERE sport_id = ?");
        $stmt->bind_param("i", $sport_id);
        $stmt->execute();
        $students = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode(['success' => true, 'students' => $students]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Sport not found']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>
