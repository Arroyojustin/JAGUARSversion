$('#addCoachForm').submit(function (e) {
    e.preventDefault();

    // Collect the form data
    let formData = {
        firstName: $('#firstName').val(),
        lastName: $('#lastName').val(),
        middleInitial: $('#middleInitial').val(),
        gender: $('#gender').val(),
        phoneNumber: $('#phoneNumber').val(),
        sportCategory: $('#sportCategory').val(),
        email: $('#email').val(),
        password: $('#password').val(),
    };

    // Send the data via AJAX
    $.ajax({
        type: 'POST',
        url: 'controller/add-coaches.php', // Path to your PHP file
        data: formData,
        success: function(response) {
            // Use SweetAlert to display the success or error message
            if (response.includes('successfully')) {
                Swal.fire({
                    icon: 'success',
                    title: 'Coach Added',
                    text: response,
                    confirmButtonText: 'OK'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response,
                    confirmButtonText: 'Try Again'
                });
            }
        },
        error: function(xhr, status, error) {
            // Use SweetAlert to display error messages
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred: ' + error,
                confirmButtonText: 'Close'
            });
        }
    });
});
