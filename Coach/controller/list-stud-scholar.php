<?php
// require '../../dbconn.php';

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Get the form data
// $studentId = $_POST['studentId'];
// $scholar = $_POST['scholar'];

// // Validate input
// if (empty($studentId) || empty($scholar)) {
//     echo "Invalid input. Please fill in all fields.";
//     exit;
// }

// // Update the database
// $sql = "UPDATE users SET scholar = ? WHERE id = ?";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param('si', $scholar, $studentId);

// if ($stmt->execute() && $stmt->affected_rows > 0) {
//     echo "Scholar information updated successfully!";
// } else {
//     echo "Error updating scholar info: " . $conn->error;
// }

// $stmt->close();
// $conn->close();
?>
<?php
require '../../dbconn.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data (including student grades and skills)
$studentId = $_POST['studentId'];
$grades = $_POST['grades'];  // Assuming grade is percentage (0-100)
$skills = $_POST['skills'];  // Assuming skills score (0-100)

// Validate input
if (empty($studentId) || empty($grades) || empty($skills)) {
    echo "Invalid input. Please fill in all fields.";
    exit;
}

// Calculate the scholarship percentage
$scholarshipPercentage = calculateScholarship($grades, $skills);

// Update the database with the scholarship
$sql = "UPDATE users SET scholar = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('di', $scholarshipPercentage, $studentId);

if ($stmt->execute() && $stmt->affected_rows > 0) {
    echo "Scholarship information updated successfully!";
} else {
    echo "Error updating scholarship info: " . $conn->error;
}

$stmt->close();
$conn->close();

// Function to calculate the scholarship based on grades and skills
function calculateScholarship($grades, $skills) {
    $scholarship = 0;

    // Scholarship based on grades
    if ($grades >= 96) {
        $scholarship += 60;  // 60% for grades between 96-100
    } elseif ($grades >= 91) {
        $scholarship += 50;  // 50% for grades between 91-95
    } elseif ($grades >= 86) {
        $scholarship += 40;  // 40% for grades between 86-90
    } elseif ($grades >= 80) {
        $scholarship += 30;  // 30% for grades between 80-85
    }

    // Add extra scholarship based on skills (if skills score is available)
    if ($skills >= 85) {
        $scholarship += 10;  // Add 10% for skills 85 and above
    }

    // Ensure scholarship does not exceed 100%
    if ($scholarship > 100) {
        $scholarship = 100;
    }

    return $scholarship;
}
?>
