<?php
include('../../dbconn.php');

$category = isset($_GET['category']) ? $_GET['category'] : '';
$studentName = isset($_GET['studentName']) ? $_GET['studentName'] : '';

// SQL query to fetch attendance data based on category and student name
$sql = "SELECT a.student_id, CONCAT(u.firstname, ' ', u.lastname) AS student_name
        FROM attendance a
        JOIN users u ON a.student_id = u.student_no
        WHERE 1=1";

if ($category) {
    $sql .= " AND u.sports_id = '$category'"; // Filter by category if provided
}

if ($studentName) {
    $sql .= " AND CONCAT(u.firstname, ' ', u.lastname) LIKE '%$studentName%'"; // Filter by student name if provided
}

$sql .= " ORDER BY a.timestamp DESC";

// Debugging: Output the final query
error_log("SQL Query: $sql");

$result = $conn->query($sql);

// Debugging: Check if query succeeded
if (!$result) {
    error_log("Error: " . $conn->error);
}

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['student_name'] . '</td>';
        echo '<td><button class="btn btn-sm btn-outline-success">Present</button> 
              <button class="btn btn-sm btn-outline-danger">Absent</button></td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="2" class="text-center">No attendance found</td></tr>';
}

$conn->close();
?>
