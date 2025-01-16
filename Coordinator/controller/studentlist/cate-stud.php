<?php
header('Content-Type: application/json');

include '../../../dbconn.php';

try {
    // Get parameters
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $length = isset($_GET['length']) ? intval($_GET['length']) : 10;

    // Fetch sport names for the select dropdown
    $sportSql = "SELECT sport_name FROM sports ORDER BY sport_name ASC";
    $sportResult = $conn->query($sportSql);
    $sports = [];
    while ($sportRow = $sportResult->fetch_assoc()) {
        $sports[] = $sportRow['sport_name'];
    }

    // Pagination variables
    $start = ($page - 1) * $length;

    // SQL query to retrieve students with user_type = 'student'
    $sql = "
    SELECT 
        users.id AS user_id,
        CONCAT(users.lastName, ', ', users.firstName) AS Name,
        users.email AS Email,
        users.phone_no AS PhoneNo,
        sports.sport_name AS Sport
    FROM users
    LEFT JOIN sports ON users.sports_id = sports.id
    WHERE users.user_type = 'student'
    LIMIT ?, ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $start, $length);
    $stmt->execute();
    $result = $stmt->get_result();

    $html = '';
    if ($result->num_rows === 0) {
        $html = '<tr><td colspan="4">No data available</td></tr>';
    } else {
        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>';
            $html .= '<td>' . htmlspecialchars($row['Name']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['Email']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['PhoneNo']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['Sport']) . '</td>';
            $html .= '</tr>';
        }
    }

    // Total count for pagination
    $totalSql = "SELECT COUNT(*) AS total FROM users WHERE user_type = 'student'";
    $totalStmt = $conn->prepare($totalSql);
    $totalStmt->execute();
    $totalResult = $totalStmt->get_result();
    $total = $totalResult->fetch_assoc()['total'];

    $totalPages = ceil($total / $length);
    $pagination = '';
    $maxVisiblePages = 3;
    $startPage = max(1, $page - floor($maxVisiblePages / 2));
    $endPage = min($totalPages, $startPage + $maxVisiblePages - 1);

    if ($endPage - $startPage + 1 < $maxVisiblePages) {
        $startPage = max(1, $endPage - $maxVisiblePages + 1);
    }

    if ($page > 1) {
        $pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="' . ($page - 1) . '">Previous</a></li>';
    } else {
        $pagination .= '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
    }

    for ($i = $startPage; $i <= $endPage; $i++) {
        $pagination .= '<li class="page-item ' . ($i == $page ? ' active' : '') . '">';
        $pagination .= '<a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a>';
        $pagination .= '</li>';
    }

    if ($page < $totalPages) {
        $pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="' . ($page + 1) . '">Next</a></li>';
    } else {
        $pagination .= '<li class="page-item disabled"><span class="page-link">Next</span></li>';
    }

    $response = [
        'html' => $html,
        'pagination' => $pagination,
        'start' => $start + 1,
        'end' => min($start + $length, $total),
        'total' => $total,
        'sports' => $sports // Added sports array for populating the dropdown
    ];
    echo json_encode($response);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$stmt->close();
$totalStmt->close();
$conn->close();
?>
