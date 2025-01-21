<div class="container-fluid p-0 m-0" id="train-approve" style="display: block;">
    <!-- New Card Container -->
    <div class="approve-card">
        <div class="approve-card-title" id="modalTrigger">John Doe</div>
        <div class="approve-card-status">Pending</div>
    </div>
    <!-- <form class="approve-form">
        <h3>Author Form</h3>
        <label for="firstname" class="approve-label">First Name</label>
        <input type="text" id="firstname" name="firstname" class="approve-input" required>

        <label for="lastname" class="approve-label">Last Name</label>
        <input type="text" id="lastname" name="lastname" class="approve-input" required>

        <label for="sport_name" class="approve-label">Sport Name</label>
        <input type="text" id="sport_name" name="sport_name" class="approve-input" required>
    </form> -->


    <!-- Modal Structure -->
<div class="modal fade" id="trainingApprovalModal" tabindex="-1" aria-labelledby="trainingApprovalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="trainingApprovalLabel">Training Approval</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="trainingApprovalForm">
                    <div class="mb-3">
                        <label for="trainingDate" class="form-label">Date</label>
                        <input type="date" class="form-control" id="trainingDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="trainingTime" class="form-label">Time</label>
                        <input type="time" class="form-control" id="trainingTime" required>
                    </div>
                    <div class="mb-3">
                        <label for="trainingLocation" class="form-label">Location</label>
                        <input type="text" class="form-control" id="trainingLocation" required>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Approve</button>
                    <button type="button" class="btn btn-outline-danger" id="rejectWithRemarksButton">Reject</button>
                </form>

                <!-- Remarks Form -->
                <form id="remarksForm" style="display: none;">
                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea class="form-control" id="remarks" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Submit Remarks and Reject</button>
                </form>
            </div>
        </div>
    </div>
</div>

  <script>
     // JavaScript to handle modal display
   // JavaScript to handle modal display
   document.querySelector('.approve-card-title').addEventListener('click', function () {
        var modal = new bootstrap.Modal(document.getElementById('trainingApprovalModal'));
        modal.show();
    });

    // Toggle Remarks Form
    document.getElementById('rejectWithRemarksButton').addEventListener('click', function () {
        var remarksForm = document.getElementById('remarksForm');
        remarksForm.style.display = 'block';
    });

    // Handle remarks form submission
    document.getElementById('remarksForm').addEventListener('submit', function (e) {
        e.preventDefault();
        // Handle rejection with remarks here
        console.log('Rejected with remarks:', document.getElementById('remarks').value);
        // Close the modal
        var modal = bootstrap.Modal.getInstance(document.getElementById('trainingApprovalModal'));
        modal.hide();
    });

    // Form submission
    document.getElementById('trainingApprovalForm').addEventListener('submit', function (e) {
        e.preventDefault();
        // Handle form submission here
        console.log('Form submitted');
        // Close the modal
        var modal = bootstrap.Modal.getInstance(document.getElementById('trainingApprovalModal'));
        modal.hide();
    });
  </script>