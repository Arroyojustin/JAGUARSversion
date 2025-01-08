<?php
function getUserCounts($conn) {
    $counts = [
        'admin' => 0,
        'coordinator' => 0,
        'coach' => 0,
        'student' => 0,
    ];

    $sql = "SELECT user_type, COUNT(*) as count FROM users GROUP BY user_type";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $counts[$row['user_type']] = $row['count'];
        }
    }
    return $counts;
}
?>
