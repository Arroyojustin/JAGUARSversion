$(document).ready(function () {
    // Function to load sports from the database and display them
    function loadSports() {
        $.ajax({
            url: 'controller/retrieve-sporname.php', // Endpoint to fetch sports
            type: 'GET',
            success: function (response) {
                if (response.success) {
                    const sportsContainer = $('#sportsContainer');
                    sportsContainer.empty(); // Clear the container before populating

                    response.sports.forEach(function (sport) {
                        sportsContainer.append(`
                            <button type="button" class="btn btn-outline-secondary mb-2" style="width: 100%; text-align: center;">
                                ${sport}
                            </button>
                        `);
                    });
                } else {
                    console.error('Failed to fetch sports:', response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching sports:', error);
            }
        });
    }

    // Call loadSports on page load
    loadSports();

    // Handle Add Sport Form submission
    $('#addSportForm').on('submit', function (e) {
        e.preventDefault(); // Prevent form from reloading the page

        const sportName = $('#sport_name').val();

        $.ajax({
            url: 'controller/fetch-sport.php', // Endpoint to add a sport
            type: 'POST',
            data: { sport_name: sportName },
            success: function (response) {
                if (response.success) {
                    // Reload the sports list after successfully adding a new sport
                    loadSports();

                    // Reset the form and close the modal
                    $('#addSportForm')[0].reset();
                    $('#addSportModal').modal('hide');
                } else {
                    alert('Failed to add sport: ' + response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error adding sport:', error);
                alert('An error occurred while adding the sport.');
            }
        });
    });
});
