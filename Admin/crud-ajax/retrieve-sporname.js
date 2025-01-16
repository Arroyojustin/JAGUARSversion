$(document).ready(function() {
    // Function to retrieve sports
    function fetchSports() {
        $.ajax({
            url: 'controller/retrieve-sporname.php', // Path to your PHP script
            method: 'GET',
            success: function(response) {
                var sports = JSON.parse(response); // Parse JSON response
                displaySports(sports); // Display sports in the container
            },
            error: function(xhr, status, error) {
                console.error('Error fetching sports:', error);
            }
        });
    }

    // Function to display sports in the container
    function displaySports(sports) {
        var sportsContainer = $('#sportsContainer');
        sportsContainer.empty(); // Clear existing buttons

        if (sports.length > 0) {
            sports.forEach(function(sportName) {
                sportsContainer.append(`
                    <button class="btn btn-outline-secondary w-100 mb-2">${sportName}</button>
                `);
            });
        } else {
            sportsContainer.append('<p>No sports found.</p>');
        }
    }

    // Call the function to fetch and display sports
    fetchSports();
});
