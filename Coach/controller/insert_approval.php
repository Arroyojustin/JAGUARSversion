<?php
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'];
    $middleInitial = $_POST['middle_initial'];
    $lastName = $_POST['last_name'];
    $gender = $_POST['gender'];
    $sportId = $_POST['sport_id'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $bmi = $_POST['bmi'];
    $phoneNumber = $_POST['phone_number'];
    $healthProtocol = $_POST['health_protocol'];

    $sql = "INSERT INTO approvals (first_name, middle_initial, last_name, gender, sport_id, height, weight, bmi, phone_number, health_protocol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdiiiss", $firstName, $middleInitial, $lastName, $gender, $sportId, $height, $weight, $bmi, $phoneNumber, $healthProtocol);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
