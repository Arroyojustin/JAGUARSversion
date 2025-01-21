$(document).ready(function () {
    $('#addCoachForm').on('submit', function (event) {
        event.preventDefault(); // Prevent default form submission
        
        // Collect form data
        const formData = {
            firstName: $('#firstName').val(),
            lastName: $('#lastName').val(),
            middleInitial: $('#middleInitial').val(),
            gender: $('#gender').val(),
            phoneNumber: $('#phoneNumber').val(),
            email: $('#coachemail').val(),
            password: $('#coachpassword').val(),
            sportId: $('#sportCategory').val(),
            userType: 'coach'
        };

        // AJAX request to add coach
        $.ajax({
            url: 'controller/insert-coach.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert('Coach added successfully!');
                    $('#addCoachForm')[0].reset(); // Reset the form
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                alert('An error occurred while adding the coach.');
            }
        });
    });
});
