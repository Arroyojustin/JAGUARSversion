document.addEventListener('DOMContentLoaded', function () {
    const addStudentButton = document.getElementById('addStudentButton');
    const firstNameInput = document.getElementById('studentFirstName');
    const lastNameInput = document.getElementById('studentLastName');
    const studentNoInput = document.getElementById('studentNo');
    const emailInput = document.getElementById('studentEmail');
    const passwordInput = document.getElementById('studentPassword');

    // Enable button when inputs are filled (example logic)
    studentNoInput.addEventListener('input', validateForm);
    emailInput.addEventListener('input', validateForm);
    passwordInput.addEventListener('input', validateForm);

    function validateForm() {
        if (
            studentNoInput.value.trim() &&
            emailInput.value.trim() &&
            passwordInput.value.trim()
        ) {
            addStudentButton.disabled = false;
        } else {
            addStudentButton.disabled = true;
        }
    }

    // Handle button click
    addStudentButton.addEventListener('click', function (event) {
        event.preventDefault();

        const studentData = {
            student_no: studentNoInput.value,
            email: emailInput.value,
            password: passwordInput.value,
            first_name: firstNameInput.value,
            last_name: lastNameInput.value,
            sport_id: $('#studentForm').data('sport_id'),
            student_id: $('#studentForm').data('student_id'),
        };

        // Send data to server using AJAX
        fetch('controller/adding-add.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(studentData),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === 'success') {
                    alert('Student added successfully!');
                    // Optionally, reset form fields or refresh the page
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('Failed to add student. Please try again.');
            });
    });
});