$(document).ready(function() {
    // Handle form submission
    $('#addSportForm').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Gather form data
        var sportName = $('#sport_name').val();
        var positions = []; // Store positions as an array

        // Loop through the dynamically added positions
        $('#positionList li').each(function() {
            positions.push($(this).text());
        });

        // AJAX request
        $.ajax({
            url: 'controller/fetch-sport.php', // Your PHP file to handle the data
            method: 'POST',
            data: {
                sport_name: sportName,
                positions: JSON.stringify(positions) // Send as JSON string
            },
            success: function(response) {
                var result = JSON.parse(response);
                if (result.success) {
                    alert('Sport added successfully!');
                    $('#addSportModal').modal('hide'); // Close the modal

                    // Save sport name to localStorage
                    let existingSports = JSON.parse(localStorage.getItem('sports')) || [];
                    existingSports.push(sportName);
                    localStorage.setItem('sports', JSON.stringify(existingSports));

                    // Update the display
                    displaySportsFromLocalStorage();
                } else {
                    alert('Error adding sport!');
                }
            },
            error: function(xhr, status, error) {
                alert('Error adding sport!');
            }
        });
    });

    // Function to display sports from localStorage
    function displaySportsFromLocalStorage() {
        let sportsContainer = $('#sportsContainer');
        sportsContainer.empty(); // Clear existing sports

        let sports = JSON.parse(localStorage.getItem('sports')) || [];
        sports.forEach(function(sportName) {
            sportsContainer.append(`
                <button class="btn btn-outline-secondary w-100 mb-2">${sportName}</button>
            `);
        });
    }

    // Initialize sports display on page load
    displaySportsFromLocalStorage();

    // Add new position to the list
    $('#addPositionBtn').click(function() {
        var position = $('#position_input').val();
        if (position) {
            $('#positionList').append(`<li class="list-group-item">${position} <button type="button" class="btn btn-danger btn-sm float-end remove-position">Remove</button></li>`);
            $('#position_input').val(''); // Clear the input field
        }
    });

    // Remove position from the list
    $(document).on('click', '.remove-position', function() {
        $(this).closest('li').remove(); // Remove the li element
    });
});
