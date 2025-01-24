$(document).ready(function () {
    // Fetch training date, time, location, coach details, and sport on page load
    $.ajax({
        url: 'controller/fetch-training.php',
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                // Display coach's fullname, date, time, location, and sport
                const dateTime = `${response.date}, ${response.time}`;
                const coachName = response.coach || 'No coach details found';
                const location = response.location || 'No location provided';
                const sportName = response.sport || 'No sport assigned'; // Get the sport name
                $('#modalTrigger').html(`
                    <div class="coach-name">${coachName}</div>
                    <div class="sport-name">${sportName}</div> <!-- Display the sport name -->
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
