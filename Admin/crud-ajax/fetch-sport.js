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
                        const sportButton = $(`
                            <button type="button" class="btn btn-outline-secondary mb-2" style="width: 100%; text-align: center;">
                                ${sport}
                            </button>
                        `);

                        // Attach click event handler to each button
                        sportButton.on('click', function () {
                            fetchPositions(sport);
                        });

                        sportsContainer.append(sportButton);
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

    // Function to fetch positions for a selected sport
    function fetchPositions(sportName) {
        $.ajax({
            url: 'controller/fetch-positions.php', // Endpoint to fetch positions
            type: 'POST',
            data: { sport_name: sportName },
            success: function (response) {
                const rolesContainer = $('#rolesContainer');
                rolesContainer.empty(); // Clear the container before populating
    
                if (response.success) {
                    response.positions.forEach(function (position) {
                        // Add position as a button
                        rolesContainer.append(`
                            <button type="button" class="btn btn-outline-secondary mb-2" style="width: 100%; text-align: center;">
                                ${position}
                            </button>
                        `);
                    });
                } else {
                    rolesContainer.append('<p>' + response.message + '</p>');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching positions:', error);
            }
        });
    }
    // Call loadSports on page load
    loadSports();
});
