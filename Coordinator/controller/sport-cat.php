<?php
// functions.php

// Include database connection
include('./../dbconn.php');

// Function to fetch sports from the database
function getSports() {
    global $conn;
    $sql = "SELECT sport_name FROM sports";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Loop through the results and create options for the dropdown
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['sport_name'] . "'>" . $row['sport_name'] . "</option>";
        }
    } else {
        echo "<option value='' disabled>No sports available</option>";
    }
}
?>
