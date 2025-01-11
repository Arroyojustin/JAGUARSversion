<?php
// Include the database connection
include('./../dbconn.php');

// Fetch registered students' full names from the requirements table,
// excluding those already submitted.
$sql = "
    SELECT CONCAT(r.first_name, ' ', r.last_name) AS full_name
    FROM requirements r
    LEFT JOIN submitted s ON r.id = s.requirements_id
    WHERE s.requirements_id IS NULL
";
$result = $conn->query($sql);
$registeredStudents = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $registeredStudents[] = $row['full_name'];
    }
}
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
                        <ul style="list-style-type: none; padding-left: 0;">
                            <?php
                            // Display registered student names as buttons
                            if (!empty($registeredStudents)) {
                                foreach ($registeredStudents as $student) {
                                    echo "<li><button class='btn btn-outline-secondary w-100 mb-2' data-student-name='$student'>$student</button></li>";
                                }
                            } else {
                                echo "<li>No registered students yet.</li>";
                            }
                            ?>
                        </ul>
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
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" required disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" required disabled>
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
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="height" class="form-label">Height (cm)</label>
                                    <input type="number" class="form-control" id="height" min="0" step="0.01" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="weight" class="form-label">Weight (kg)</label>
                                    <input type="number" class="form-control" id="weight" min="0" step="0.01" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="bmi" class="form-label">BMI</label>
                                    <input type="number" class="form-control" id="bmi" min="0" step="0.01" readonly disabled>
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

<!-- JavaScript (AJAX to retrieve student details) -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add click event listeners to the student name buttons
    const studentButtons = document.querySelectorAll('.btn-outline-secondary');
    studentButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const studentName = this.getAttribute('data-student-name');

            // Make AJAX request to fetch student details
            fetch(`controller/get_student_details.php?student_name=${encodeURIComponent(studentName)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error); // Show error if any
                    } else {
                        // Populate the form with student details
                        document.getElementById('firstName').value = data.first_name;
                        document.getElementById('lastName').value = data.last_name;
                        document.getElementById('gender').value = data.gender;
                        document.getElementById('height').value = data.height;
                        document.getElementById('weight').value = data.weight;
                        document.getElementById('bmi').value = data.bmi;

                        // Populate the sport category dropdown
                        const sportCategorySelect = document.getElementById('sportCategory1');
                        sportCategorySelect.innerHTML = ''; // Clear any existing options
                        const option = document.createElement('option');
                        option.value = data.sport_id;
                        option.textContent = data.sport_name;
                        sportCategorySelect.appendChild(option);

                        // Enable the form for editing
                        document.getElementById('firstName').disabled = false;
                        document.getElementById('lastName').disabled = false;
                        document.getElementById('gender').disabled = false;
                        document.getElementById('sportCategory').disabled = false;
                        document.getElementById('height').disabled = false;
                        document.getElementById('weight').disabled = false;
                        document.getElementById('bmi').disabled = false;
                        document.getElementById('submitStudentButton').disabled = false;

                        // Store the student name for later use
                        document.getElementById('submitStudentButton').setAttribute('data-student-name', studentName);
                    }
                })
                .catch(error => {
                    alert('Error fetching student data.');
                    console.error(error);
                });
        });
    });

    // Add event listener for the submit button
    document.getElementById('studAddForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        const studentName = document.getElementById('submitStudentButton').getAttribute('data-student-name');

        if (!studentName) {
            alert('No student selected');
            return;
        }

        // Submit the student data (AJAX)
        fetch('controller/submit_student.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                student_name: studentName,
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Successfully added to 'submitted' table
                alert('Student submitted successfully!');

                // Remove the student name from the registered list
                const studentButton = document.querySelector(`[data-student-name="${studentName}"]`);
                if (studentButton) {
                    studentButton.parentElement.remove(); // Remove the list item
                }

                // Reset the form after submission
                document.getElementById('studAddForm').reset();
                document.getElementById('submitStudentButton').disabled = true;
            } else {
                alert('Failed to submit student');
            }
        })
        .catch(error => {
            alert('Error submitting student data.');
            console.error(error);
        });
    });
});
</script>