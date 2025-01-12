$(document).ready(function() {
    // Fetch sports
    $.ajax({
        url: 'controller/get-sports.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            var sportCategory = $('#sportCategory');
            sportCategory.empty();

            if (response.success && response.sports && response.sports.length > 0) {
                sportCategory.append('<option selected disabled>Choose sport</option>');
                response.sports.forEach(function(sport) {
                    sportCategory.append(new Option(sport, sport));
                });
            } else {
                sportCategory.append('<option selected disabled>No sports available</option>');
            }
        },
        error: function() {
            console.error('Error fetching sports');
        }
    });

    // Fetch students based on selected sport
    $('#sportCategory').change(function() {
        var sportName = $(this).val();

        if (sportName) {
            $.ajax({
                url: 'controller/sports-studGet.php',
                method: 'POST',
                data: { sport_name: sportName },
                dataType: 'json',
                success: function(response) {
                    var approvedStudents = $('.approved-students');
                    approvedStudents.empty();

                    if (response.success && response.students.length > 0) {
                        response.students.forEach(function(student) {
                            var studentName = student.first_name + ' ' + student.last_name;
                            var button = $('<button>', {
                                class: 'btn btn-md btn-outline-secondary m-1',
                                text: studentName,
                                click: function() {
                                    $('#studentQRInput').val(studentName);
                                }
                            });
                            approvedStudents.append(button);
                        });
                    } else {
                        approvedStudents.append('<p>No students found for this sport.</p>');
                    }
                },
                error: function() {
                    console.error('Error fetching students');
                }
            });
        }
    });

    // Enable inputs when QR code is generated
    $('#generateQRButton').click(function() {
        $('#studentNo, #studentEmail, #studentPassword').prop('disabled', false);
        $('#addStudentButton').prop('disabled', false);
    });
});
