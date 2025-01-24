// Function to fetch and display attendance records
function fetchAttendance() {
    fetch('controller/record_attendance.php')  // Replace with the actual path to the PHP script
      .then(response => response.json())
      .then(data => {
        const tbody = document.getElementById('attendance-body');
        tbody.innerHTML = ''; // Clear existing rows
  
        data.forEach(record => {
          // Create a new row for each record
          const row = document.createElement('tr');
          
          // Create a cell for Student ID
          const studentIdCell = document.createElement('td');
          studentIdCell.textContent = record.student_id;
          row.appendChild(studentIdCell);
  
          // Create a cell for Timestamp
          const timestampCell = document.createElement('td');
          timestampCell.textContent = record.timestamp;
          row.appendChild(timestampCell);
  
          // Append the row to the table body
          tbody.appendChild(row);
        });
      })
      .catch(error => {
        console.error('Error fetching attendance data:', error);
      });
  }
  
  // Call the function to fetch data when the page loads
  window.onload = fetchAttendance;