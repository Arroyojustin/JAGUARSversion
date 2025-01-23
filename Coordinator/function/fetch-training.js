// $(document).ready(function () {
//     // Fetch training date and time on page load
//     $.ajax({
//         url: 'controller/fetch-training.php',
//         type: 'POST',
//         dataType: 'json',
//         success: function (response) {
//             if (response.success) {
//                 // Format and display the training date and time dynamically
//                 const dateTime = ` ${response.date}, ${response.time}`;
//                 $('#modalTrigger').text(dateTime);
//             } else {
//                 console.error(response.message);
//                 $('#modalTrigger').text('No training date or time found.');
//             }
//         },
//         error: function (xhr, status, error) {
//             console.error('AJAX Error: ' + status + ', ' + error);
//             $('#modalTrigger').text('Error fetching training date and time.');
//         }
//     });
// });

$(document).ready(function () {
    // Fetch training date, time, location, and coach details on page load
    $.ajax({
        url: 'controller/fetch-training.php',
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                // Display coach's fullname, date, time, and location
                const dateTime = `${response.date}, ${response.time}`;
                const coachName = response.coach || 'No coach details found';
                const location = response.location || 'No location provided';
                $('#modalTrigger').html(`
                    <div class="coach-name">${coachName}</div>
                    <div>${dateTime}</div>
                    <div class="location">${location}</div>
                `);
            } else {
                console.error(response.message);
                $('#modalTrigger').text('No training details found.');
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + ', ' + error);
            $('#modalTrigger').text('Error fetching training details.');
        }
    });
});
