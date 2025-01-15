document.addEventListener('DOMContentLoaded', function () {
    const addStudentButton = document.getElementById('addStudentButton');
    const studentNoInput = document.getElementById('studentNo');
    const studentEmailInput = document.getElementById('studentEmail');
    const studentPasswordInput = document.getElementById('studentPassword');

    // Enable button when inputs are filled
    studentNoInput.addEventListener('input', validateForm);
    studentEmailInput.addEventListener('input', validateForm);
    studentPasswordInput.addEventListener('input', validateForm);

    function validateForm() {
        if (
            studentNoInput.value.trim() &&
            studentEmailInput.value.trim() &&
            studentPasswordInput.value.trim()
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
            email: studentEmailInput.value,
            password: studentPasswordInput.value,
            student_id: $('#studentForm').data('student_id')
        };

        // Send data to server using AJAX
        fetch('controller/adding-add.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(studentData),
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Student added successfully!');
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to add student. Please try again.');
            });
    });
});
