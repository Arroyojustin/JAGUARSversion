<div class="attendance container-fluid p-0 m-0" id="attendance" style="display: none;">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Attendance</h5>
    <div class="calendar-info d-flex align-items-center">
      <i class="bi bi-caret-left-fill" id="prev-date"></i>
      <span id="calendar-date"></span>
      <i class="bi bi-caret-right-fill" id="next-date"></i>
    </div>
  </div>
  <div class="row mb-2">
    <div class="col-12 col-md-8 col-lg-3">
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