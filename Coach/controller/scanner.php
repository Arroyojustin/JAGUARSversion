<?php
require '../../dbconn.php'; // Include your centralized database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $qrCode = $data['qrCode'];

    // Ensure the QR code data is provided
    if (empty($qrCode)) {
        echo json_encode(["success" => false, "error" => "Invalid QR code"]);
        exit;
    }

    // Insert attendance into the database
    $stmt = $conn->prepare("INSERT INTO attendance (student_id, date_time) VALUES (?, NOW())");
    if (!$stmt) {
        echo json_encode(["success" => false, "error" => $conn->error]);
        exit;
    }

    $stmt->bind_param("s", $qrCode);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
