//   // JavaScript to handle date changes
//   const prevDateButton = document.getElementById('prev-date');
//   const nextDateButton = document.getElementById('next-date');
//   const calendarDate = document.getElementById('calendar-date');

//   let currentDate = new Date();

//   // Function to format date to "22 Dec 2024"
//   function formatDate(date) {
//     const options = { day: '2-digit', month: 'short', year: 'numeric' };
//     return date.toLocaleDateString('en-GB', options);
//   }

//   // Update displayed date
//   function updateDisplayedDate() {
//     calendarDate.textContent = formatDate(currentDate);
//   }

//   // Navigate to the previous date
//   prevDateButton.addEventListener('click', function() {
//     currentDate.setDate(currentDate.getDate() - 1);
//     updateDisplayedDate();
//   });

//   // Navigate to the next date
//   nextDateButton.addEventListener('click', function() {
//     currentDate.setDate(currentDate.getDate() + 1);
//     updateDisplayedDate();
//   });

//   // Initial display
//   updateDisplayedDate();

// JavaScript to handle date changes, fetching attendance data,and student search
const prevDateButton = document.getElementById('prev-date');
const nextDateButton = document.getElementById('next-date');
const calendarDate = document.getElementById('calendar-date');
const categorySelect = document.getElementById('categorySelect');
const studentNameInput = document.getElementById('studentName');

let currentDate = new Date(); // Initialize current date

// Function to format date to "22 Dec 2024"
function formatDate(date) {
  const options = { day: '2-digit', month: 'short', year: 'numeric' };
  return date.toLocaleDateString('en-GB', options);
}

// Update displayed date
function updateDisplayedDate() {
  calendarDate.textContent = "Today " + formatDate(currentDate);
  fetchAttendanceData();
}

// Fetch attendance data for the current date, category, and student name
function fetchAttendanceData() {
  const dateString = currentDate.toISOString().split('T')[0];  // Format: "2024-12-22"
  const category = categorySelect.value; // Selected category (e.g., sport)
  const studentName = studentNameInput.value; // Search term for student name

  const url = `controller/attendance.php?date=${dateString}&category=${category}&student_name=${studentName}`;

  // Use AJAX to fetch the data from the server
  fetch(url)
    .then(response => response.json())
    .then(data => {
      const tbody = document.getElementById('attendance-body');
      tbody.innerHTML = ''; // Clear existing data

      // Loop through the data and populate the table
      data.forEach(student => {
        const row = document.createElement('tr');

        // Create and append student name cell
        const nameCell = document.createElement('td');
        nameCell.textContent = student.name;
        row.appendChild(nameCell);

        // Create and append attendance status cell (button to mark attendance)
        const statusCell = document.createElement('td');
        statusCell.innerHTML = `<button class="btn btn-sm btn-success mark-attendance" data-student-id="${student.student_id}">Mark Present</button>`;
        row.appendChild(statusCell);

        // Append the row to the table
        tbody.appendChild(row);
      });
    })
    .catch(error => console.error('Error fetching attendance data:', error));
}

// Navigate to the previous date
prevDateButton.addEventListener('click', function() {
  currentDate.setDate(currentDate.getDate() - 1);
  updateDisplayedDate();
});

// Navigate to the next date
nextDateButton.addEventListener('click', function() {
  currentDate.setDate(currentDate.getDate() + 1);
  updateDisplayedDate();
});

// Handle category change or student name change to fetch data again
categorySelect.addEventListener('change', updateDisplayedDate);
studentNameInput.addEventListener('input', updateDisplayedDate);

// Initial display of attendance data for today
updateDisplayedDate();

// // Mark attendance button functionality
// document.addEventListener('click', function(event) {
//   if (event.target && event.target.classList.contains('mark-attendance')) {
//     const studentId = event.target.getAttribute('data-student-id');
    
//     // Send AJAX request to mark attendance as present
//     fetch('mark-attendance.php', {
//       method: 'POST',
//       headers: {
//         'Content-Type': 'application/json',
//       },
//       body: JSON.stringify({ student_id: studentId, date: currentDate.toISOString().split('T')[0] })
//     })
//     .then(response => response.json())
//     .then(data => {
//       // Optionally, update the button or status on success
//       event.target.textContent = "Marked Present";
//       event.target.disabled = true;  // Disable the button after marking
//     })
//     .catch(error => console.error('Error marking attendance:', error));
//   }
// });