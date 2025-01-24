// $(document).ready(function() {
//     // Fetch training schedules on document ready
//     $.ajax({
//         url: 'controller/stud-train.php', // Path to your PHP script
//         method: 'GET',
//         success: function(data) {
//             var trainings = JSON.parse(data);
//             var trainingSchedule = $("#training-tbody");

//             // Clear the current table content
//             trainingSchedule.empty();

//             trainings.forEach(function(training) {
//                 // Create a new table row for each training session
//                 var newRow = $("<tr>");
//                 newRow.html(`
//                     <td class="training-title">${training.Title}</td>  <!-- Added Title column -->
//                     <td class="training-time">${training.Time}</td>
//                     <td class="training-location">${training.Location}</td>
//                 `);
//                 // Append the new row to the tbody
//                 trainingSchedule.append(newRow);
//             });
//         },
//         error: function(err) {
//             console.error("Error fetching training data:", err);
//         }
//     });
// });
// $(document).ready(function() {
//     // Fetch attendance records on document ready
//     $.ajax({
//         url: 'controller/stud-train.php', // Path to your PHP script (adjusted for attendance)
//         method: 'GET',
//         success: function(data) {
//             var attendances = JSON.parse(data);
//             var attendanceTable = $("#training-tbody");

//             // Clear the current table content
//             attendanceTable.empty();

//             attendances.forEach(function(attendance) {
//                 // Create a new table row for each attendance record
//                 var newRow = $("<tr>");
//                 newRow.html(`
//                     <td class="attendance-student">${attendance.StudentID}</td>  <!-- Added StudentID column -->
//                     <td class="attendance-time">${attendance.Timestamp}</td>  <!-- Timestamp -->
//                 `);
//                 // Append the new row to the tbody
//                 attendanceTable.append(newRow);
//             });
//         },
//         error: function(err) {
//             console.error("Error fetching attendance data:", err);
//         }
//     });
// });
$(document).ready(function() {
    // Fetch attendance records on document ready
    $.ajax({
        url: 'controller/stud-train.php', // Path to your PHP script
        method: 'GET',
        success: function(data) {
            var attendances = JSON.parse(data);
            var attendanceTable = $("#training-tbody");

            // Clear the current table content
            attendanceTable.empty();

            attendances.forEach(function(attendance) {
                // Create a new table row for each attendance record
                var newRow = $("<tr>");
                newRow.html(`
                    <td class="attendance-time">${attendance.Timestamp}</td>  <!-- Timestamp -->
                `);
                // Append the new row to the tbody
                attendanceTable.append(newRow);
            });
        },
        error: function(err) {
            console.error("Error fetching attendance data:", err);
        }
    });
});
