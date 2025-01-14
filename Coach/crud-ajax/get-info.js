$(document).ready(function () {
    function fetchStudentDetails(studentId) {
        $.ajax({
            url: 'controller/get-info.php',
            method: 'POST',
            data: { id: studentId },
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    const student = data.student;

                    // Update the student details section
                    $('#student-details').html(`
                        <strong>Name:</strong> ${student.first_name} ${student.middle_initial || ''} ${student.last_name}<br>
                        <strong>Gender:</strong> ${student.gender}<br>
                        <strong>Sport:</strong> ${student.sport_name}<br>
                        <strong>Height:</strong> ${student.height} cm<br>
                        <strong>Weight:</strong> ${student.weight} kg<br>
                        <strong>BMI:</strong> ${student.bmi}<br>
                        <strong>Phone Number:</strong> ${student.phone_number}<br>
                        <strong>Health Protocol:</strong> ${student.health_protocol || 'None'}<br>
                        <strong>Approved At:</strong> ${student.formatted_approved_at}
                    `);
                } else {
                    $('#student-details').text('Failed to fetch student details.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Failed to fetch student details:', xhr.responseText, status, error);
            },
        });
    }

    // Event listener for student name click
    $('#approvalList').on('click', '.student-btn', function () {
        const studentId = $(this).data('student-id'); // Get the student's ID
        fetchStudentDetails(studentId); // Call the function to fetch and display details
    });
});
