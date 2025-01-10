<?php
include './../dbconn.php';

if (isset($_GET['sport_id'])) {
    $sportId = intval($_GET['sport_id']);
    $sql = "SELECT id, first_name, middle_initial, last_name 
            FROM approvals 
            WHERE status = 'approved' AND sport_id = $sportId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $buttons = '<div class="d-flex flex-column">';
        while ($row = $result->fetch_assoc()) {
            $fullName = htmlspecialchars($row['first_name']) . ' ' . 
                        (!empty($row['middle_initial']) ? htmlspecialchars($row['middle_initial']) . '. ' : '') . 
                        htmlspecialchars($row['last_name']);
            $buttons .= '<button class="btn btn-outline-secondary mb-2" data-id="' . htmlspecialchars($row['id']) . '">' . $fullName . '</button>';
        }
        $buttons .= '</div>';
        echo $buttons;
    } else {
        echo '<p>No approved students yet for this sport.</p>';
    }
}
?>
