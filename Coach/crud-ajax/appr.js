let selectedRequirementId = null;

// Fetch and display student details
function viewStudent(requirementsId) {
    selectedRequirementId = requirementsId;

    fetch(`controller/fetch-stud.php?requirements_id=${requirementsId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const student = data.data;
                document.getElementById("student-info").innerHTML = `
                    <p><strong>Name:</strong> ${student.first_name} ${student.middle_initial || ''} ${student.last_name}</p>
                    <p><strong>Gender:</strong> ${student.gender}</p>
                    <p><strong>Height:</strong> ${student.height} cm</p>
                    <p><strong>Weight:</strong> ${student.weight} kg</p>
                    <p><strong>BMI:</strong> ${student.bmi}</p>
                    <p><strong>Phone:</strong> ${student.phone_number}</p>
                    <p><strong>Health Protocol:</strong> ${student.health_protocol || 'N/A'}</p>
                `;
            } else {
                document.getElementById("student-info").innerHTML = `<p>${data.error}</p>`;
            }
        })
        .catch(error => {
            console.error("Error fetching student info:", error);
        });
}

// Approve student
function approveStudent(requirementsId) {
    if (!requirementsId) {
        alert("No student selected!");
        return;
    }

    if (confirm("Are you sure you want to approve this student?")) {
        fetch("controller/approveee.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ requirements_id: requirementsId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Student approved successfully!");

                // Remove the student name from the requirements container
                const studentElement = document.getElementById(`student-${requirementsId}`);
                if (studentElement) {
                    studentElement.remove();
                }
            } else {
                alert("Error approving student: " + data.error);
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }
}


