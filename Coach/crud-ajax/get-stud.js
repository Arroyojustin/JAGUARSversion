$(document).ready(function () {
    // Fetch student details on button click
    $("#fetch-student-btn").click(function () {
        $.ajax({
            url: "controller/get-stud.php", // PHP handler
            method: "POST",
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    // Populate student details
                    $("#student-info").html(
                        "<p><strong>First Name:</strong> " + response.first_name + "</p>" +
                        "<p><strong>Middle Initial:</strong> " + response.middle_initial + "</p>" +
                        "<p><strong>Last Name:</strong> " + response.last_name + "</p>"
                    );
                } else {
                    $("#student-info").html("<p>No student details found.</p>");
                }
            },
            error: function () {
                $("#student-info").html("<p>An error occurred while fetching data.</p>");
            }
        });
    });
});