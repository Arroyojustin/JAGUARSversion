<?php
header('Content-Type: application/json');

include '../../../dbconn.php';

try {
    $sql = "SELECT id, sport_name FROM sports";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $sports = [];
    while ($row = $result->fetch_assoc()) {
        $sports[] = $row;
    }

    echo json_encode(['sports' => $sports]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$stmt->close();
$conn->close();
?>