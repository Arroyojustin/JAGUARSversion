async function fetchTrainingData() {
    // Fetch data from the PHP script
    const response = await fetch('controller/calendar.php'); // Replace with the actual path to your PHP file
    return await response.json();
  }

  async function generateCalendar() {
    const currentDate = new Date();
    const monthNames = ["January", "February", "March", "April", "May", "June", 
                        "July", "August", "September", "October", "November", "December"];
    const currentMonth = currentDate.getMonth();
    const year = currentDate.getFullYear();
    const firstDay = new Date(year, currentMonth, 1).getDay();
    const daysInMonth = new Date(year, currentMonth + 1, 0).getDate();

    document.getElementById('current-month').textContent = `${monthNames[currentMonth]} ${year}`;
    const tbody = document.getElementById('calendar-table').getElementsByTagName('tbody')[0];
    tbody.innerHTML = ""; // Clear previous content

    const trainingData = await fetchTrainingData(); // Fetch training data
    const trainingDates = trainingData.map(item => item.Date);

    let date = 1;
    let row = document.createElement('tr');

    for (let i = 0; i < 42; i++) {
      if (i < firstDay || date > daysInMonth) {
        row.appendChild(document.createElement('td'));
      } else {
        const cell = document.createElement('td');
        const fullDate = `${year}-${String(currentMonth + 1).padStart(2, '0')}-${String(date).padStart(2, '0')}`;

        cell.textContent = date;

        if (trainingDates.includes(fullDate)) {
          cell.style.backgroundColor = 'white'; // Highlight the date in red
          cell.style.color = 'red';
        }

        row.appendChild(cell);
        date++;
      }

      if (i % 7 === 6) {
        tbody.appendChild(row);
        row = document.createElement('tr');
      }
    }
  }

  generateCalendar();