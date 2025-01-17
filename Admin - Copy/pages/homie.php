<?php
include './../dbconn.php';
include 'controller/users-count.php';

// Get user counts
$userCounts = getUserCounts($conn);
?>

<div class="container-fluid p-0 m-0" id="home" style="display: none;">
   <div class="row g-4">
        <!-- Admin Card -->
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="card text-center shadow-sm homie-card">
                <div class="card-body">
                    <i class="bx bx-user"></i>
                    <h5 class="card-title homie-card-title">Admin</h5>
                    <p id="admin-count" class="card-text"><?php echo $userCounts['admin']; ?></p>
                </div>
            </div>
        </div>
        <!-- Coordinator Card -->
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="card text-center shadow-sm homie-card">
                <div class="card-body">
                    <i class="bx bx-layer"></i>
                    <h5 class="card-title homie-card-title">Coordinator</h5>
                    <p id="coordinator-count" class="card-text"><?php echo $userCounts['coordinator']; ?></p>
                </div>
            </div>
        </div>
        <!-- Coach Card -->
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="card text-center shadow-sm homie-card">
                <div class="card-body">
                    <i class="bx bx-user-circle"></i>
                    <h5 class="card-title homie-card-title">Coach</h5>
                    <p id="coach-count" class="card-text"><?php echo $userCounts['coach']; ?></p>
                </div>
            </div>
        </div>
        <!-- Students Card -->
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="card text-center shadow-sm homie-card">
                <div class="card-body">
                    <i class="bx bx-user"></i>
                    <h5 class="card-title homie-card-title">Students</h5>
                    <p id="student-count" class="card-text"><?php echo $userCounts['student']; ?></p>
                </div>
            </div>
        </div>
        <!-- Users Chart -->
        <div class="col-12 col-md-4 col-lg-4 mb-3">
            <div class="card d-flex flex-row justify-content-between align-items-center p-3" 
                style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                <div class="card-body" style="padding: 0; display: flex; justify-content: center; align-items: center;">
                    <div id="users-chart" style="width: 110%; height: 100%; min-height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Pass PHP data as a JavaScript variable
    const userCounts = <?php echo json_encode([
        'admin' => isset($userCounts['admin']) ? $userCounts['admin'] : 0,
        'coordinator' => isset($userCounts['coordinator']) ? $userCounts['coordinator'] : 0,
        'coach' => isset($userCounts['coach']) ? $userCounts['coach'] : 0,
        'student' => isset($userCounts['student']) ? $userCounts['student'] : 0
    ]); ?>;
</script>
