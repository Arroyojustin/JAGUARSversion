<?php
include '../../dbconn.php'; // include your DB connection

$query = "SELECT sport_name FROM sports"; // query to retrieve sport names
$result = $conn->query($query);

$response = [];

if (!$result) {
    // Handle error if the query fails
    $response['success'] = false;
    $response['message'] = 'Database query failed';
} else {
    $sports = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sports[] = $row['sport_name'];
        }
        $response['success'] = true;
        $response['sports'] = $sports;
    } else {
        $response['success'] = false;
        $response['message'] = 'No sports found';
    }
}

echo json_encode($response); // return the response as JSON
$conn->close();
?>