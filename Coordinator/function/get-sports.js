$(document).ready(function() {
    // Fetch sports data using AJAX
    $.ajax({
        url: 'controller/get-sports.php', // URL of your PHP script
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            var sportCategory = $('#sportCategory');
            sportCategory.empty(); // Clear existing options

            // Check if the response was successful and contains sports
            if (response.success && response.sports && response.sports.length > 0) {
                sportCategory.append('<option selected disabled>Choose sport</option>');

                // Loop through the sports data and append options to the select element
                $.each(response.sports, function(index, sport) {
                    sportCategory.append(
                        $('<option>', {
                            value: sport,  // Use sport name as the value
                            text: sport    // Use sport name as the display text
                        })
                    );
                });
            } else {
                sportCategory.append('<option selected disabled>No sports available</option>');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching sports:', error);
        }
    });

    // Fetch students based on the selected sport
    $('#sportCategory').change(function() {
        var sportName = $(this).val(); // Get selected sport name
    
        if (sportName) {
            $.ajax({
                url: 'controller/sports-studGet.php', // PHP script to fetch students
                method: 'POST',
                data: { sport_name: sportName },
                dataType: 'json',
                success: function(response) {
                    var approvedStudentsContainer = $('.approved-students');
                    approvedStudentsContainer.empty(); // Clear previous students
    
                    if (response.success && response.students.length > 0) {
                        $.each(response.students, function(index, student) {
                            approvedStudentsContainer.append(
                                $('<button>', {
                                    class: 'btn btn-md btn-outline-secondary m-1',
                                    text: student.first_name + ' ' + student.last_name,
                                })
                            );
                        });
                    } else {
                        approvedStudentsContainer.append('<p>No students found for this sport.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching students:', error);
                }
            });
        }
    });
});