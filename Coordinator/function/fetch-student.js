$(document).ready(function () {
    // Fetch students when the page loads
    function fetchStudents() {
        $.ajax({
            url: 'controller/fetch-student.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#studentList').empty();
                data.forEach(function (student) {
                    $('#studentList').append(`
                        <li>
                            <button 
                                class="btn btn-outline-secondary student-btn" 
                                data-student-id="${student.id}" 
                                style="margin: 5px; width:100%;">
                                ${student.first_name} ${student.last_name}
                            </button>
                        </li>
                    `);
                });
            },
            error: function (xhr, status, error) {
                console.error('Failed to fetch students:', error);
            },
        });
    }

    // Fetch student details
    function fetchStudentDetails(studentId) {
        $.ajax({
            url: 'controller/fetch-student-details.php',
            method: 'GET',
            data: { id: studentId },
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    console.error(data.error);
                    return;
                }

                $('#firstName').val(data.first_name).data('student-id', studentId);
                $('#lastName').val(data.last_name);
                $('#middleinitial').val(data.middle_initial || '');
                $('#gender').val(data.gender);
                $('#phonenumber').val(data.phone_number);
                $('#height').val(data.height);
                $('#weight').val(data.weight);
                $('#bmi').val(data.bmi);
                $('#healthprotocol').val(data.health_protocol || '');
                $('#sportCategory1').empty().append(`
                    <option value="${data.sport_id}" selected>${data.sport_name}</option>
                `);

                $('#studAddForm input, #studAddForm select').prop('disabled', false);
                $('#submitStudentButton').prop('disabled', false);
            },
            error: function (xhr, status, error) {
                console.error('Failed to fetch student details:', error);
            },
        });
    }

    // Submit the form
    $('#studAddForm').on('submit', function (e) {
        e.preventDefault();

        const studentData = {
            id: $('#firstName').data('student-id'),
            first_name: $('#firstName').val(),
            middle_initial: $('#middleinitial').val(),
            last_name: $('#lastName').val(),
            gender: $('#gender').val(),
            sport_id: $('#sportCategory1').val(),
            height: $('#height').val(),
            weight: $('#weight').val(),
            bmi: $('#bmi').val(),
            phone_number: $('#phonenumber').val(),
            health_protocol: $('#healthprotocol').val(),
        };

        $.ajax({
            url: 'controller/submit-student.php',
            method: 'POST',
            data: studentData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert('Student successfully approved!');
                    $('#studAddForm')[0].reset();
                    $('#studAddForm input, #studAddForm select').prop('disabled', true);
                    $('#submitStudentButton').prop('disabled', true);
                    fetchStudents(); // Refresh the student list
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Submission failed:', error);
            },
        });
    });

    // Event listener for student button clicks
    $('#studentList').on('click', '.student-btn', function () {
        const studentId = $(this).data('student-id');
        fetchStudentDetails(studentId);
    });

    // Initial fetch
    fetchStudents();
});
