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
// document.addEventListener("DOMContentLoaded", function () {
//     const tableBody = document.getElementById("student-table-body");

//     // Fetch student data from the server
//     fetch("controller/list-stud.php")
//         .then(response => response.json())
//         .then(data => {
//             data.forEach(student => {
//                 const row = document.createElement("tr");

//                 // Create student name cell
//                 const nameCell = document.createElement("td");
//                 nameCell.textContent = `${student.firstname} ${student.lastname}`;
//                 row.appendChild(nameCell);

//                 // Create scholar cell
//                 const scholarCell = document.createElement("td");
//                 scholarCell.textContent = student.scholar || "Not Assigned";
//                 row.appendChild(scholarCell);

//                 // Add a button to edit scholar
//                 const editCell = document.createElement("td");
//                 const editButton = document.createElement("button");
//                 editButton.classList.add("btn", "btn-secondary");
//                 editButton.textContent = "Edit Scholar";
//                 editButton.addEventListener("click", () => openScholarModal(student.id, student.scholar));
//                 editCell.appendChild(editButton);
//                 row.appendChild(editCell);

//                 tableBody.appendChild(row);
//             });

//             // Show the table if data is present
//             if (data.length > 0) {
//                 document.getElementById("athlete").style.display = "block";
//             }
//         })
//         .catch(error => console.error("Error fetching student data:", error));

//     // Function to open the modal with current student data
//     function openScholarModal(studentId, currentScholar) {
//         document.getElementById("studentId").value = studentId; // Set the student ID
//         document.getElementById("scholar").value = currentScholar || ""; // Set the current scholar info
//         new bootstrap.Modal(document.getElementById("scholarModal")).show();
//     }

//     // Submit the form to update scholar info
//     document.getElementById("scholarForm").addEventListener("submit", function (event) {
//         event.preventDefault();

//         const formData = new FormData(this);

//         fetch("controller/list-stud-scholar.php", {
//             method: "POST",
//             body: formData
//         })
//             .then(response => response.text())
//             .then(data => {
//                 alert(data); // Notify the user
//                 location.reload(); // Reload the page to show updated data
//             })
//             .catch(error => console.error("Error updating scholar info:", error));
//     });
// });
// document.addEventListener("DOMContentLoaded", function () {
//     const tableBody = document.getElementById("student-table-body");

//     // Fetch student data from the server
//     fetch("controller/list-stud.php")
//         .then(response => response.json())
//         .then(data => {
//             data.forEach(student => {
//                 const row = document.createElement("tr");

//                 // Create student name cell
//                 const nameCell = document.createElement("td");
//                 nameCell.textContent = `${student.firstname} ${student.lastname}`;
//                 row.appendChild(nameCell);

//                 // Create scholar cell
//                 const scholarCell = document.createElement("td");
//                 scholarCell.textContent = student.scholar || "--";
//                 row.appendChild(scholarCell);

//                 // Add a button to edit scholar
//                 const editCell = document.createElement("td");
//                 const editButton = document.createElement("button");
//                 editButton.classList.add("btn", "btn-secondary");
//                 editButton.textContent = "Edit Scholar";
//                 editButton.addEventListener("click", () => openScholarModal(student.id, student.scholar));
//                 editCell.appendChild(editButton);
//                 row.appendChild(editCell);

//                 tableBody.appendChild(row);
//             });

//             // Show the table if data is present
//             if (data.length > 0) {
//                 document.getElementById("athlete").style.display = "none";
//             }
//         })
//         .catch(error => console.error("Error fetching student data:", error));

//     // Function to open the modal with current student data
//     function openScholarModal(studentId, currentScholar) {
//         document.getElementById("studentId").value = studentId; // Set the student ID
//         document.getElementById("scholar").value = currentScholar || ""; // Set the current scholar info
//         new bootstrap.Modal(document.getElementById("scholarModal")).show();
//     }

//     // Submit the form to update scholar info
//     document.getElementById("scholarForm").addEventListener("submit", function (event) {
//         event.preventDefault();

//         const formData = new FormData(this);

//         fetch("controller/list-stud-scholar.php", {
//             method: "POST",
//             body: formData
//         })
//             .then(response => response.text())
//             .then(data => {
//                 alert(data); // Notify the user
//                 location.reload(); // Reload the page to show updated data
//             })
//             .catch(error => console.error("Error updating scholarship info:", error));
//     });
// });
// document.addEventListener("DOMContentLoaded", function () {
//     const tableBody = document.getElementById("student-table-body");

//     // Fetch student data from the server
//     fetch("controller/list-stud.php")
//         .then(response => response.json())
//         .then(data => {
//             data.forEach(student => {
//                 const row = document.createElement("tr");

//                 // Create student name cell
//                 const nameCell = document.createElement("td");
//                 nameCell.textContent = `${student.firstname} ${student.lastname}`;
//                 row.appendChild(nameCell);

//                 // Create scholar cell
//                 const scholarCell = document.createElement("td");
//                 scholarCell.textContent = student.scholar || "--";
//                 row.appendChild(scholarCell);

//                 // Add a button to edit scholar
//                 const editCell = document.createElement("td");
//                 const editButton = document.createElement("button");
//                 editButton.classList.add("btn", "btn-secondary");
//                 editButton.textContent = "Edit Scholar";
//                 editButton.addEventListener("click", () => openScholarModal(student.id, student.scholar));
//                 editCell.appendChild(editButton);
//                 row.appendChild(editCell);

//                 tableBody.appendChild(row);
//             });

//             // Show the table if data is present
//             if (data.length > 0) {
//                 document.getElementById("athlete").style.display = "none";
//             }
//         })
//         .catch(error => console.error("Error fetching student data:", error));

//     // Function to open the modal with current student data
//     function openScholarModal(studentId, currentScholar) {
//         document.getElementById("studentId").value = studentId; // Set the student ID
//         document.getElementById("scholar").value = currentScholar || ""; // Set the current scholar info
//         new bootstrap.Modal(document.getElementById("scholarModal")).show();
//     }

//     // Calculate scholarship automatically when grades or skills are changed
//     document.getElementById("grades").addEventListener("input", calculateScholarship);
//     document.getElementById("skills").addEventListener("input", calculateScholarship);

//     function calculateScholarship() {
//         const grades = parseFloat(document.getElementById("grades").value) || 0;
//         const skills = parseFloat(document.getElementById("skills").value) || 0;

//         let scholarshipPercentage = 0;

//         // Scholarship based on grades
//         if (grades >= 96) {
//             scholarshipPercentage += 60;  // 60% for grades between 96-100
//         } else if (grades >= 91) {
//             scholarshipPercentage += 50;  // 50% for grades between 91-95
//         } else if (grades >= 86) {
//             scholarshipPercentage += 40;  // 40% for grades between 86-90
//         } else if (grades >= 80) {
//             scholarshipPercentage += 30;  // 30% for grades between 80-85
//         }

//         // Add extra scholarship based on skills (if skills score is available)
//         if (skills >= 85) {
//             scholarshipPercentage += 10;  // Add 10% for skills 85 and above
//         } else if (skills >=90) {
//             scholarshipPercentage += 20;
//         } else if (skills >=95) {
//             scholarshipPercentage += 30;
//         }

//         // Ensure scholarship does not exceed 100%
//         if (scholarshipPercentage > 100) {
//             scholarshipPercentage = 100;
//         }

//         // Display the calculated scholarship percentage
//         document.getElementById("scholar").value = scholarshipPercentage + "%";
//     }

//     // Submit the form to update scholar info
//     document.getElementById("scholarForm").addEventListener("submit", function (event) {
//         event.preventDefault();

//         const formData = new FormData(this);

//         fetch("controller/list-stud-scholar.php", {
//             method: "POST",
//             body: formData
//         })
//             .then(response => response.text())
//             .then(data => {
//                 alert(data); // Notify the user
//                 location.reload(); // Reload the page to show updated data
//             })
//             .catch(error => console.error("Error updating scholarship info:", error));
//     });
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
                document.getElementById("athlete").style.display = "none";
            }
        })
        .catch(error => console.error("Error fetching student data:", error));

    // Function to open the modal with current student data
    function openScholarModal(studentId, currentScholar) {
        document.getElementById("studentId").value = studentId; // Set the student ID
        document.getElementById("scholar").value = currentScholar || ""; // Set the current scholar info
        new bootstrap.Modal(document.getElementById("scholarModal")).show();
    }

    // Calculate scholarship automatically when grades or skills are changed
    document.getElementById("grades").addEventListener("input", calculateScholarship);
    document.getElementById("skills").addEventListener("input", calculateScholarship);

    function calculateScholarship() {
        const grades = parseFloat(document.getElementById("grades").value) || 0;
        const skills = parseInt(document.getElementById("skills").value) || 0;

        let scholarshipPercentage = 0;

        // Scholarship based on grades
        if (grades >= 96) {
            scholarshipPercentage = 100;  // 100% for grades between 96-100
        } else if (grades >= 91) {
            scholarshipPercentage = 70;   // 70% for grades between 91-95
        } else if (grades >= 86) {
            scholarshipPercentage = 50;   // 50% for grades between 86-90
        } else if (grades >= 80) {
            scholarshipPercentage = 30;   // 30% for grades between 80-85
        }

        // Add bonus based on skills
        if (skills >= 8) {
            scholarshipPercentage += 50;  // 50% bonus for excellent skills (8-10)
        } else if (skills >= 5) {
            scholarshipPercentage += 30;  // 30% bonus for average skills (5-7)
        } else {
            scholarshipPercentage += 0;   // No bonus for poor skills (0-4)
        }

        // Limit the scholarship percentage to 100%
        scholarshipPercentage = Math.min(scholarshipPercentage, 100);

        // Display the calculated scholarship percentage
        document.getElementById("scholar").value = scholarshipPercentage + "%";
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
            .catch(error => console.error("Error updating scholarship info:", error));
    });
});
