<?php
include('./../dbconn.php'); // Include the database connection
include('controller/attend-cat.php'); // Include the fetchSports.php file

// Call the function to get sports options
$sportOptions = getSportsOptions($conn);

// Get current date
$currentDate = date('d M Y');  // Format: 22 Dec 2024
?>
<div class="attendance container-fluid p-0 m-0" id="attendance" style="display: none;">
  <!-- Attendance Section -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Attendance</h5>
    <div class="calendar-info d-flex align-items-center">
      <i class="bi bi-caret-left-fill" id="prev-date"></i> <!-- Previous arrow icon -->
      <span id="calendar-date"><?php echo $currentDate; ?></span> <!-- Current date -->
      <i class="bi bi-caret-right-fill" id="next-date"></i> <!-- Next arrow icon -->
    </div>
  </div>
  
  <!-- Category and Student Search Section -->
  <div class="row mb-2">
    <!-- Category Dropdown -->
    <div class="col-6 col-md-4 col-lg-2">
      <select id="categorySelect" class="form-select form-select-sm custom-select" aria-label="Select category">
        <option value="" disabled selected>Select a Category</option>
        <?php echo $sportOptions; // Populate the dropdown with sports ?>
      </select>
    </div>

    <!-- Student Name Search -->
    <div class="col-12 col-md-8 col-lg-8">
      <input type="text" class="form-control" id="studentName" placeholder="Search by Student Name">
    </div>
  </div>
  
  <!-- Attendance Status Section -->
  <div class="table-responsive mt-3">
    <table class="table table-bordered" id="attendance-table">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Attendance Status</th>
            </tr>
        </thead>
        <tbody id="attendance-body">
            <!-- Dynamic content will be populated here -->
        </tbody>
    </table>
 </div>
</div>