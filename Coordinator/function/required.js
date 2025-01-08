document.getElementById('studAddForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    // Gather form data
    const formData = {
        firstName: document.getElementById('firstName').value,
        lastName: document.getElementById('lastName').value,
        studentID: document.getElementById('studentID').value,
        gender: document.getElementById('gender').value,
        sportCategory: document.getElementById('sportCategory').value,
        height: document.getElementById('height').value,
        weight: document.getElementById('weight').value,
        bmi: document.getElementById('bmi').value,
        phoneNumber: document.getElementById('phone').value,
        healthProtocol: document.getElementById('healthProtocol').value,
    };

    // Send the data to the server via AJAX
    fetch('controller/submit.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Success SweetAlert
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Submitted successfully',
                timer: 2000,
                background: '#ab9f6ca',
                iconColor: '#a2e7d32',
                color: '#a155724',
                showConfirmButton: false
            });
            document.getElementById('studAddForm').reset(); // Clear the form
        } else {
            // Error SweetAlert
            Swal.fire({
                title: 'Error!',
                text: 'Error: ' + data.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Failure SweetAlert
        Swal.fire({
            title: 'Oops!',
            text: 'Failed to add requirements. Please try again.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
});
