<?php
include('../../dbconn.php');

$id = $_POST['id'];
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

$conn->begin_transaction();

try {
    // Insert into approvals
    $sqlInsert = "
        INSERT INTO approvals (
            id, first_name, middle_initial, last_name, gender, sport_id, 
            height, weight, bmi, phone_number, health_protocol
        )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ";
    $stmtInsert = $conn->prepare($sqlInsert);
    $stmtInsert->bind_param(
        'issssiddsss',
        $id, $firstName, $middleInitial, $lastName, $gender, $sportId,
        $height, $weight, $bmi, $phoneNumber, $healthProtocol
    );
    $stmtInsert->execute();

    // Remove from requirements
    $sqlDelete = "DELETE FROM requirements WHERE id = ?";
    $stmtDelete = $conn->prepare($sqlDelete);
    $stmtDelete->bind_param('i', $id);
    $stmtDelete->execute();

    $conn->commit();

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    $conn->rollback();
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

$conn->close();
?>
