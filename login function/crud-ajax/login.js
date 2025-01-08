$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        // Show the loading spinner (if needed)
        $('#loadingSpinner').removeClass('d-none');

        $.ajax({
            type: 'POST',
            url: 'login function/controller/login_process.php',  // Corrected path
            data: $(this).serialize(),
            success: function(response) {
                // Parse JSON response
                let jsonResponse = typeof response === 'string' ? JSON.parse(response) : response;
        
                // Hide the loading spinner
                $('#loadingSpinner').addClass('d-none');
        
                if (jsonResponse.status === 'success') {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Logged in successfully',
                        timer: 2000,
                        background: '#ab9f6ca',
                        iconColor: '#a2e7d32',
                        color: '#a155724',
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = jsonResponse.redirect;  // Redirect to the appropriate page
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: jsonResponse.message,
                    });
                }
            },
            error: function(xhr, status, error) {
                $('#loadingSpinner').addClass('d-none');
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'An error occurred. Please try again.',
                });
            }
        });        
    });
});

// Toggle password visibility
const showPasswordCheckbox = document.getElementById('show-password');
const passwordField = document.getElementById('password');

showPasswordCheckbox.addEventListener('change', function() {
    if (this.checked) {
        passwordField.type = 'text';
    } else {
        passwordField.type = 'password';
    }
});
