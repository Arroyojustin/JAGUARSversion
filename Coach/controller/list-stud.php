<?php
// require '../../dbconn.php';

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Query to get students
// $sql = "SELECT firstname, lastname FROM users WHERE user_type = 'student'";
// $result = $conn->query($sql);

// $students = [];

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $students[] = $row;
//     }
// }

// // Return data as JSON
// header('Content-Type: application/json');
// echo json_encode($students);

// $conn->close();
?>
<?php
require '../../dbconn.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get students (include `id`)
$sql = "SELECT id, firstname, lastname, scholar FROM users WHERE user_type = 'student'";
$result = $conn->query($sql);

$students = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($students);

$conn->close();
?>
