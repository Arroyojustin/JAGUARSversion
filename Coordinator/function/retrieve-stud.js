$(document).ready(function() {
    var currentDate = new Date(); // Store the current date as a Date object
    var allAttendanceData = []; // Store all fetched attendance data

    // Fetch attendance data and current date when the page is loaded
    $.ajax({
        url: 'controller/retrieve-stud.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Set the current date from the server response and update the calendar span
            currentDate = new Date(data.currentDate); // Set the currentDate variable from response
            $('#calendar-date').text(formatDate(currentDate));

            // Store all attendance data in a variable
            allAttendanceData = data.attendance;

            // Initially, populate the table with records matching the current date
            updateAttendanceTable(currentDate);
        },
        error: function(xhr, status, error) {
            console.error("Error fetching attendance data: " + error);
        }
    });

    // Function to format the date as 'Weekday, Month Day, Year'
    function formatDate(date) {
        return date.toLocaleDateString('en-US', {
            weekday: 'short',
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
    }

    // Function to update the attendance table with filtered data based on the current date
    function updateAttendanceTable(date, searchQuery = "") {
        var attendanceBody = $('#attendance-body');
        attendanceBody.empty(); // Clear any existing data

        // Filter attendance data to match the selected date
        var formattedDate = formatDateForComparison(date);

        // Iterate through the attendance data and display only the ones that match the date
        allAttendanceData.forEach(function(item) {
            var timestampDate = new Date(item.timestamp);
            var formattedTimestampDate = formatDateForComparison(timestampDate);

            // Filter by date and search query (student_id)
            if (formattedDate === formattedTimestampDate && 
                (item.student_id.toLowerCase().includes(searchQuery.toLowerCase()) || searchQuery === "")) {
                
                var row = '<tr>';
                row += '<td>' + item.student_id + '</td>';
                row += '<td>' + item.timestamp + '</td>';
                row += '</tr>';
                attendanceBody.append(row);
            }
        });
    }

    // Function to format the date in 'Weekday, Month Day, Year' for comparison
    function formatDateForComparison(date) {
        return date.toLocaleDateString('en-US', {
            weekday: 'short',
            month: 'short',
            day: 'numeric',
            year: 'numeric'
        });
    }

    // Handle previous date button click
    $('#prev-date').click(function() {
        currentDate.setDate(currentDate.getDate() - 1); // Go back one day
        $('#calendar-date').text(formatDate(currentDate)); // Update the calendar date

        // Update the attendance table for the new selected date
        updateAttendanceTable(currentDate, $('#studentName').val());
    });

    // Handle next date button click
    $('#next-date').click(function() {
        currentDate.setDate(currentDate.getDate() + 1); // Go forward one day
        $('#calendar-date').text(formatDate(currentDate)); // Update the calendar date

        // Update the attendance table for the new selected date
        updateAttendanceTable(currentDate, $('#studentName').val());
    });

    // Handle the student name search
    $('#studentName').on('input', function() {
        var searchQuery = $(this).val(); // Get the search query from the input field
        updateAttendanceTable(currentDate, searchQuery); // Update the table with the search query
    });
});
