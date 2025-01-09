<?php
// Include DB connection
include './../dbconn.php';

// Query to fetch only pending submissions and related student info
$sql = "
    SELECT s.requirements_id, r.first_name, r.middle_initial, r.last_name
    FROM submitted s
    JOIN requirements r ON s.requirements_id = r.id
    WHERE s.status = 'pending'
";

$result = $conn->query($sql);
?>

<div class="container-fluid p-0 m-0" id="required" style="display: block;">
    <div class="container mt-1">
        <div class="row">
            <!-- Left Side: Requirements Form -->
            <div class="col-md-6">
                <div class="card shadow-container">
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="border-bottom: 1px solid #000;">Requirements</h5>
                        <div class="text-center">
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <button id="student-<?php echo $row['requirements_id']; ?>" 
                                    class="btn btn-outline-secondary mb-2 w-100" 
                                    onclick="viewStudent(<?php echo $row['requirements_id']; ?>)">
                                    <?php echo $row['first_name'] . ' ' . $row['middle_initial'] . '. ' . $row['last_name']; ?>
                                </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Student Details -->
            <div class="col-md-6">
                <div class="card shadow-container">
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="border-bottom: 1px solid #000;">Information</h5>
                        <div id="student-info">
                            <p>Select a requirement to view student details.</p>
                        </div>
                        <!-- Buttons for Approve and Reject -->
                        <div class="mt-4">
                            <button id="approve-btn" class="btn btn-outline-success w-100 mb-2" 
                                onclick="approveStudent(selectedRequirementId)">Approve</button>
                            <button id="reject-btn" class="btn btn-outline-danger w-100">Reject</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
