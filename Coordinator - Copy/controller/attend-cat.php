<?php
// Function to fetch sports from the sports table
function getSportsOptions($conn) {
    $sql = "SELECT sport_name FROM sports"; // Query to fetch sport names
    $result = $conn->query($sql);

    $options = '';
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $options .= '<option value="' . $row['sport_name'] . '">' . $row['sport_name'] . '</option>';
        }
    } else {
        $options = '<option value="">No sports available</option>';
    }
    return $options;
}
?>
