<div class="container-fluid p-0 m-0" id="adds" style="display: none;">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title underline mb-3" style="border-bottom: 1px solid #000;">Approved</h5>
                    <div class="mb-3">
                        <label for="sportCategory" class="form-label">Select Sport Category</label>
                        <select class="form-select" id="sportCategory" aria-label="Select Sport Category">
                            <option selected disabled>Choose sport</option>
                        </select>
                    </div>
                    <div class="approved-students">
                        <!-- Approved students will be displayed here -->
                    </div>
                </div>
            </div>
                <div class="card">
  <div class="card-body text-center">
    <h5 class="card-title mb-4" style="font-weight: bold;">Student QR Code</h5>
    <form id="qrCodeForm">
      <div class="mb-3">
        <label for="studentQRInput" class="form-label" style="font-weight: bold;">Name <span style="color: red;">*</span></label>
        <input
          type="text"
          class="form-control text-center"
          id="studentQRInput"
          style="border: 1px solid #ccc; border-radius: 5px;"
        >
      </div>
      <button
        type="button"
        class="btn btn-primary btn-lg"
        id="generateQRButton"
        style="background-color: #007bff; border: none; border-radius: 5px; font-size: 1.2rem;"
      >
        GENERATE 
      </button>
    </form>
    <div id="qrCodeDisplay" class="mt-4 text-center">
      <!-- The QR Code will be dynamically generated here -->
      <p class="text-muted">No QR Code generated yet.</p>
    </div>
  </div>
</div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title underline mb-2" style="border-bottom: 1px solid #000;">Student Account</h5>
                    <form id="coachForm">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="studentNo" class="form-label">Student No.</label>
                                <input type="text" class="form-control" id="studentNo" value="STU12345" required disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="coachFirstName" class="form-label">Email</label>
                                <input type="text" class="form-control" id="coachFirstName" required disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="coachLastName" class="form-label">Password</label>
                                <input type="text" class="form-control" id="coachLastName" required disabled>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success" id="addStudentButton" disabled>Add Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>