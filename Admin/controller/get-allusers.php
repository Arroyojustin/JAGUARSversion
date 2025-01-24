<?php
// Include your database connection
include('../../dbconn.php');

// SQL query to fetch coach and coordinator users
$query = "SELECT firstname, lastname, gender, email FROM users WHERE user_type IN ('coach', 'coordinator')";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $users = array();

    // Fetch each row and store in an array
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }

    // Return the data as JSON
    echo json_encode($users);
} else {
    // If no users found, return an empty array
    echo json_encode([]);
}

// Close the database connection
$conn->close();
?>
