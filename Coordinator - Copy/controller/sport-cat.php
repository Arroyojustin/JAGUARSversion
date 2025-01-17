<?php
include('./../dbconn.php'); // Include database connection

if (isset($_POST['sports_id']) && !empty($_POST['sports_id'])) {
    $sports_id = intval($_POST['sports_id']); // Get the sports_id

    // Query to get students based on sports_id
    $query = "SELECT firstname, lastname, email, phone_no FROM users WHERE sports_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $sports_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $students = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }
    $stmt->close();

    echo json_encode($students); // Return data as JSON
} else {
    echo json_encode([]); // Return empty JSON if no sports_id
}

$conn->close();
?>
