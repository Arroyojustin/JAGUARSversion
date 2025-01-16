<?php
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // SQL query to fetch sport names
    $sql = "SELECT sport_name FROM sports";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sports = array();
        while($row = $result->fetch_assoc()) {
            $sports[] = $row['sport_name'];
        }
        echo json_encode($sports);
    } else {
        echo json_encode(array());
    }
}

$conn->close();
?>
