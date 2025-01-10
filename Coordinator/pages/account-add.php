<?php
require_once './../dbconn.php';

function fetchSportsOptions($conn) {
    $sql = "SELECT id, sport_name FROM sports";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $options = '';
        while ($row = $result->fetch_assoc()) {
            $options .= '<option value="' . $row['id'] . '">' . htmlspecialchars($row['sport_name']) . '</option>';
        }
        return $options;
    } else {
        return '<option disabled>No sports available</option>';
    }
}
?>

    <div class="container-fluid p-0 m-0" id="adds" style="display: none;">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-container mb-4">
                    <div class="card-body">
                        <h5 class="card-title underline mb-3" style="border-bottom: 1px solid #000;">Approved</h5>
                        <div class="mb-3">
                            <label for="sportCategory" class="form-label">Select Sport Category</label>
                            <select class="form-select" id="sportCategory" aria-label="Select Sport Category">
                                <option selected disabled>Choose sport</option>
                                <?php echo fetchSportsOptions($conn); ?>
                            </select>
                        </div>
                        <div class="approved-students">
                            <!-- Approved students will be displayed here -->
                        </div>
                    </div>
                </div>
                <div class="card shadow-container">
                    <div class="card-body">
                        <h5 class="card-title underline mb-3" style="border-bottom: 1px solid #000;">Student QR Code Generator</h5>
                        <form id="qrCodeForm">
                            <div class="mb-3">
                                <label for="studentQRInput" class="form-label">Enter Student No. or Name</label>
                                <input type="text" class="form-control" id="studentQRInput" placeholder="Enter Student No. or Name">
                            </div>
                            <button type="button" class="btn btn-outline-primary" id="generateQRButton">Generate QR Code</button>
                        </form>
                        <div id="qrCodeDisplay" class="mt-4 text-center">
                            <p>No QR Code generated yet.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-container">
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

