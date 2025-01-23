// document.addEventListener("DOMContentLoaded", function () {
//     const tableBody = document.getElementById("student-table-body");

//     // Fetch student data from the server
//     fetch("controller/list-stud.php") // Replace with your PHP file path
//         .then(response => response.json())
//         .then(data => {
//             // Populate the table
//             data.forEach(student => {
//                 const row = document.createElement("tr");
//                 const cell = document.createElement("td");
//                 cell.textContent = `${student.firstname} ${student.lastname}`;
//                 row.appendChild(cell);
//                 tableBody.appendChild(row);
//             });

//             // Show the table if data is present
//             if (data.length > 0) {
//                 document.getElementById("athlete").style.display = "block";
//             }
//         })
//         .catch(error => console.error("Error fetching student data:", error));
// });
document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.getElementById("student-table-body");

    // Fetch student data from the server
    fetch("controller/list-stud.php")
        .then(response => response.json())
        .then(data => {
            data.forEach(student => {
                const row = document.createElement("tr");

                // Create student name cell
                const nameCell = document.createElement("td");
                nameCell.textContent = `${student.firstname} ${student.lastname}`;
                row.appendChild(nameCell);

                // Create scholar cell
                const scholarCell = document.createElement("td");
                scholarCell.textContent = student.scholar || "Not Assigned";
                row.appendChild(scholarCell);

                // Add a button to edit scholar
                const editCell = document.createElement("td");
                const editButton = document.createElement("button");
                editButton.classList.add("btn", "btn-secondary");
                editButton.textContent = "Edit Scholar";
                editButton.addEventListener("click", () => openScholarModal(student.id, student.scholar));
                editCell.appendChild(editButton);
                row.appendChild(editCell);

                tableBody.appendChild(row);
            });

            // Show the table if data is present
            if (data.length > 0) {
                document.getElementById("athlete").style.display = "block";
            }
        })
        .catch(error => console.error("Error fetching student data:", error));

    // Function to open the modal with current student data
    function openScholarModal(studentId, currentScholar) {
        document.getElementById("studentId").value = studentId; // Set the student ID
        document.getElementById("scholar").value = currentScholar || ""; // Set the current scholar info
        new bootstrap.Modal(document.getElementById("scholarModal")).show();
    }

    // Submit the form to update scholar info
    document.getElementById("scholarForm").addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch("controller/list-stud-scholar.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                alert(data); // Notify the user
                location.reload(); // Reload the page to show updated data
            })
            .catch(error => console.error("Error updating scholar info:", error));
    });
});
