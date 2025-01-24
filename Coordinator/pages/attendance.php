<?php
include('./../dbconn.php'); // Database connection
include('controller/attend-cat.php'); // Fetch sports options function

// Fetch options for the sports dropdown
$sportOptions = getSportsOptions($conn);

// Get the current date
$currentDate = date('d M Y');
?>
<div class="attendance container-fluid p-0 m-0" id="attendance" style="display: none;">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Attendance</h5>
    <div class="calendar-info d-flex align-items-center">
      <i class="bi bi-caret-left-fill" id="prev-date"></i>
      <span id="calendar-date"><?php echo $currentDate; ?></span>
      <i class="bi bi-caret-right-fill" id="next-date"></i>
    </div>
  </div>
  <div class="row mb-2">
    <div class="col-6 col-md-4 col-lg-2">
      <select id="categorySelect" class="form-select form-select-sm custom-select">
        <option value="" disabled selected>Select a Category</option>
        <?php echo $sportOptions; ?>
      </select>
    </div>
    <div class="col-12 col-md-8 col-lg-8">
      <input type="text" class="form-control" id="studentName" placeholder="Search by Student Name">
    </div>
  </div>
  <div class="table-responsive mt-3">
    <table class="table table-bordered" id="attendance-table">
      <thead>
        <tr>
          <th>Student Name</th>
          <th>Attendance Status</th>
        </tr>
      </thead>
      <tbody id="attendance-body">
        <!-- Data populated dynamically -->
      </tbody>
    </table>
  </div>
</div>
