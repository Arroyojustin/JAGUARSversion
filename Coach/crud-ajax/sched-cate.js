$(document).ready(function () {
    // Handle form submission
    $('#scheduleForm').submit(function (event) {
        event.preventDefault();

        const scheduleData = {
            title: $('#scheduleTitle').val(), // New title field
            date: $('#scheduleDate').val(),
            time: $('#scheduleTime').val(),
            location: $('#scheduleLocation').val(),
        };

        // Ajax request to insert the training schedule
        $.ajax({
            url: 'controller/sched-cate.php', // Backend script to handle insertion
            method: 'POST',
            data: scheduleData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert('Schedule saved successfully!');
                    $('#scheduleForm')[0].reset();
                    const modal = bootstrap.Modal.getInstance($('#scheduleModal')[0]);
                    modal.hide();
                } else {
                    alert(response.message || 'Failed to save the schedule. Try again.');
                }
            },
            error: function () {
                alert('An error occurred. Please try again.');
            },
        });
    });
});
