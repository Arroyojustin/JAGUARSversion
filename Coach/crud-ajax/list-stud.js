document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.getElementById("student-table-body");

    // Fetch student data from the server
    fetch("controller/list-stud.php") // Replace with your PHP file path
        .then(response => response.json())
        .then(data => {
            // Populate the table
            data.forEach(student => {
                const row = document.createElement("tr");
                const cell = document.createElement("td");
                cell.textContent = `${student.firstname} ${student.lastname}`;
                row.appendChild(cell);
                tableBody.appendChild(row);
            });

            // Show the table if data is present
            if (data.length > 0) {
                document.getElementById("athlete").style.display = "block";
            }
        })
        .catch(error => console.error("Error fetching student data:", error));
});
