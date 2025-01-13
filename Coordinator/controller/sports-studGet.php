<?php
include '../../dbconn.php'; // Include your DB connection

if (isset($_POST['sport_name'])) {
    $sportName = $_POST['sport_name'];

    // Fetch sport_id based on sport_name
    $sportQuery = "SELECT id FROM sports WHERE sport_name = ?";
    $stmt = $conn->prepare($sportQuery);
    $stmt->bind_param("s", $sportName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $sport = $result->fetch_assoc();
        $sportId = $sport['id'];

        // Fetch students from the approvals table who have the selected sport_id
        // $studentQuery = "SELECT first_name, last_name FROM approvals WHERE sport_id = ? AND status = 'approved'";
        $studentQuery = "SELECT id, first_name, last_name, sport_id FROM approvals WHERE sport_id = ? AND status = 'approved'";
        $stmt = $conn->prepare($studentQuery);
        $stmt->bind_param("i", $sportId);
        $stmt->execute();
        $result = $stmt->get_result();

        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }

        echo json_encode(['success' => true, 'students' => $students]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Sport not found']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No sport selected']);
}

$conn->close();
?>
