<?php
include('./../dbconn.php'); // Include your database connection file

function fetch_sports() {
    global $conn;
    $query = "SELECT * FROM sports";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Loop through the results and create the options
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['id'] . '">' . $row['sport_name'] . '</option>';
        }
    } else {
        echo '<option value="">No sports available</option>';
    }
}
?>
