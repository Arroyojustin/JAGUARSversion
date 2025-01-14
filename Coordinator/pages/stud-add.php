<?php
// // Include the database connection
// include('./../dbconn.php');

// // Fetch registered students' full names from the requirements table,
// // excluding those already submitted.
// $sql = "
//     SELECT CONCAT(r.first_name, ' ', r.last_name) AS full_name
//     FROM requirements r
//     LEFT JOIN submitted s ON r.id = s.requirements_id
//     WHERE s.requirements_id IS NULL
// ";
// $result = $conn->query($sql);
// $registeredStudents = [];

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $registeredStudents[] = $row['full_name'];
//     }
// }
?>

<div class="container-fluid p-0 m-0" id="sports" style="display: none;">
    <div class="container mt-1">
        <div class="row mb-3"></div>
        <div class="row">
            <!-- Left Section: Coaches -->
            <div class="col-md-4">
                <!-- New Container for Student Registered -->
                <div class="card shadow-container mb-4">
                    <div class="card-body">
                        <h5 class="card-title underline mb-3" style="border-bottom: 1px solid #000;">Student Registered</h5>
                        <ul id="studentList" style="list-style-type: none; padding-left: 0;"></ul>
                    </div>
                </div>
            </div>

            <!-- Right Section: Students -->
            <div class="col-md-8">
                <div class="card shadow-container">
                    <div class="card-body">
                        <h5 class="card-title underline mb-3" style="border-bottom: 1px solid #000;">Student Requirements</h5>
                        
                        <!-- Student Form -->
                        <form id="studAddForm">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" required disabled>
                                </div>
                               <div class="col-md-4">
                                    <label for="middleinitial" class="form-label">Middle Initial</label>
                                    <input type="text" class="form-control" id="middleinitial" required disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" required disabled>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="sportCategory" class="form-label">Sport Category</label>
                                    <select class="form-select" id="sportCategory1" required disabled>
                                        <option value="" disabled selected>Select a Category</option>
                                    </select>
                                </div>
                                 <div class="col-md-4">
                                    <label for="phonenumber" class="form-label">Phone No.</label>
                                    <input type="text" class="form-control" id="phonenumber" required disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="height" class="form-label">Height (cm)</label>
                                    <input type="number" class="form-control" id="height" min="0" step="0.01" required disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="weight" class="form-label">Weight (kg)</label>
                                    <input type="number" class="form-control" id="weight" min="0" step="0.01" required disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="bmi" class="form-label">BMI</label>
                                    <input type="number" class="form-control" id="bmi" min="0" step="0.01" readonly disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="healthprotocol" class="form-label">Health Protocol</label>
                                    <input type="text" class="form-control" id="healthprotocol" required disabled>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary" id="submitStudentButton" disabled>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

