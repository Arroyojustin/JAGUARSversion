<?php
include '../../dbconn.php';

if (isset($_GET['id'])) {
    $sportId = intval($_GET['id']);
    $query = "SELECT positions FROM sports WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $sportId);
    $stmt->execute();
    $stmt->bind_result($positions);
    $stmt->fetch();
    $stmt->close();

    if ($positions) {
        $positionsArray = array_map('trim', explode(',', $positions));
        echo json_encode(["positions" => $positionsArray]);
    } else {
        echo json_encode(["positions" => []]);
    }
}
?>
