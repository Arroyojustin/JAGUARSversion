$(document).ready(function () {
    // Fetch sports on page load
    $.ajax({
        url: 'controller/retrieve-sport.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data.length > 0) {
                const sportDropdown = $('#sportCategory');
                sportDropdown.empty(); // Clear existing options
                sportDropdown.append('<option value="" disabled selected>Select Sport</option>');
                
                // Populate the dropdown with sports
                data.forEach(sport => {
                    sportDropdown.append(`<option value="${sport.id}">${sport.sport_name}</option>`);
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('Error fetching sports:', error);
        }
    });
});
