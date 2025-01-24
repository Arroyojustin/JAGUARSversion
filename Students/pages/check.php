<div class="container-fluid p-0 m-0" id="check" style="display: none;">
    <table class="responsive-table" style="font-size: 19px; width: 100%;">
        <thead>
            <tr>
                <th class="left-align" style="padding-right: 20px;">Training</th>
                <th class="right-align" style="text-align: right; padding-right: 20px;">Status <i class='bx bx-sort'></i></th>
            </tr>
        </thead>
        <tbody id="training-tbody">
            <!-- Rows will be dynamically inserted here -->
        </tbody>
    </table>

    <!-- Excuse Button -->
    <div class="d-flex justify-content-left" style="position: fixed; bottom: 20px; margin-left:77px; margin-top:288px;">
        <button type="button" class="btn btn-outline-secondary w-100" data-bs-toggle="modal" data-bs-target="#excuseModal" style="font-family: 'Petrona', sans-serif; height: 53px; font-size: 24px;">Excuse Letter</button>
    </div>

    <!-- QR Icon -->
    <!-- <div class="qr-icon" style="position: fixed; bottom: 20px; left: 20px; font-size: 36px;" onclick="showSection(event, 'qqr')">
        <i class="bx bx-qr"></i>
    </div> -->
</div>

<!-- Modal -->
<div class="modal fade" id="excuseModal" tabindex="-1" aria-labelledby="excuseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excuseModalLabel">Excuse Letter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reasonInput" class="form-label">Reason</label>
                    <input type="text" class="form-control" id="reasonInput" placeholder="Type your reason here">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var tbody = document.getElementById('training-tbody');
        for (var i = 1; i <= 6; i++) {
            var row = document.createElement('tr');

            var trainingCell = document.createElement('td');
            trainingCell.textContent = 'Day ' + i;
            trainingCell.style.paddingRight = "20px";
            row.appendChild(trainingCell);

            var statusCell = document.createElement('td');
            statusCell.style.textAlign = "right"; // Align the status text to the right
            statusCell.style.paddingRight = "20px"; // Add some padding to the right
            statusCell.textContent = 'Pending'; // Example status
            row.appendChild(statusCell);

            tbody.appendChild(row);
        }
    });
</script>
