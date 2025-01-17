<?php
header('Content-Type: application/json');

include '../../../dbconn.php';

try {
    // Get parameters
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $length = isset($_GET['length']) ? intval($_GET['length']) : 10;
    $sport = isset($_GET['sport']) && $_GET['sport'] !== '' ? intval($_GET['sport']) : null;  // Use null if no sport is selected

    // Calculate pagination
    $start = ($page - 1) * $length;

    // Build the WHERE clause for filtering by sport
    $whereClause = "WHERE users.user_type = 'student'";
    if ($sport !== null) {
        $whereClause .= " AND users.sports_id = ?";
    }

    // Query to retrieve required fields
    $sql = "
    SELECT 
        CONCAT(users.firstname, ' ', users.lastname) AS Name,
        users.phone_no,
        users.email
    FROM users
    $whereClause
    LIMIT ?, ?";

    $stmt = $conn->prepare($sql);
    if ($sport !== null) {
        $stmt->bind_param('iii', $sport, $start, $length);  // If sport is selected, bind it
    } else {
        $stmt->bind_param('ii', $start, $length);  // If no sport is selected, don't bind sport
    }
    $stmt->execute();
    $result = $stmt->get_result();

    $html = '';
    if ($result->num_rows === 0) {
        $html = '<tr><td colspan="3">No data available</td></tr>';
    } else {
        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>';
            $html .= '<td>' . htmlspecialchars($row['Name']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['phone_no'] ?: '--') . '</td>';
            $html .= '<td>' . htmlspecialchars($row['email'] ?: '--') . '</td>';
            $html .= '</tr>';
        }
    }

    // Total count query
    $totalSql = "
    SELECT COUNT(*) AS total
    FROM users
    $whereClause";

    $totalStmt = $conn->prepare($totalSql);
    if ($sport !== null) {
        $totalStmt->bind_param('i', $sport);  // If sport is selected, bind it
    }
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
        'total' => $total
    ];
    echo json_encode($response);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$stmt->close();
$totalStmt->close();
$conn->close();
?>