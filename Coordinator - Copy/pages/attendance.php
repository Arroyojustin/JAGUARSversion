<?php
include('./../dbconn.php'); // Include the database connection
include('controller/attend-cat.php'); // Include the fetchSports.php file

// Call the function to get sports options
$sportOptions = getSportsOptions($conn);
?>

<div class="attendance container-fluid p-0 m-0" id="attendance" style="display: none;">
  <!-- Attendance Section -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Attendance</h5>
    <div class="calendar-info d-flex align-items-center">
       <i class="bi bi-caret-left-fill"></i> <!-- Previous arrow icon -->
       Today 22 Dec 2024
       <i class="bi bi-caret-right-fill"></i> <!-- Next arrow icon -->
    </div>
  </div>
  <!-- Form Section -->
  <div class="row mb-2">
    <div class="col-6 col-md-4 col-lg-2">
      <select id="categorySelect" class="form-select form-select-sm custom-select" aria-label="Select category">
        <option value="" disabled selected>Select a Category</option>
        <?php echo $sportOptions; // Populate the dropdown with sports ?>
      </select>
    </div>
    <div class="col-6 col-md-4 col-lg-2">
      <select id="statusSelect" class="form-select form-select-sm custom-select" aria-label="Select status">
        <option value="" disabled selected>Select Status</option>
        <option value="present">Present</option>
        <option value="absent">Absent</option>
        <option value="late">Late</option>
      </select>
    </div>
  </div>
  <div class="row mb-2">
    <div class="col-12 col-md-8 col-lg-8">
      <input type="text" class="form-control" id="studentName" placeholder="Name of Student">
    </div>
  </div>
  <!-- Attendance Status Section -->
  <div class="table-responsive mt-3">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="path_to_profile_photo.jpg" alt="Profile Photo" class="profile-photo me-2">
                        <span class="student-name">John Doe</span>
                    </div>
                    <div class="d-flex">
                    </div>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
 </div>
</div>
