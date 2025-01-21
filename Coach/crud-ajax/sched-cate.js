$(document).ready(function () {
    // Assume sport_id of the logged-in coach is available
    const coachSportId = 123; // Replace this with the dynamic retrieval of the sport_id

    // Handle form submission
    $('#scheduleForm').submit(function (event) {
        event.preventDefault();

        const scheduleData = {
            date: $('#scheduleDate').val(),
            time: $('#scheduleTime').val(),
            location: $('#scheduleLocation').val(),
            created_by: coachSportId, // Pass the sport_id
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

                    // Dynamically append the new schedule
                    const trainingSchedule = $('.training-schedule');
                    const newTrainingItem = $(`
                        <div class="training-item">
                            <span>${scheduleData.time}</span>
                            <span>-</span>
                            <span>${scheduleData.location}</span>
                        </div>
                    `);
                    trainingSchedule.append(newTrainingItem);

                    // Reset and hide the modal
                    $('#scheduleForm')[0].reset();
                    const modal = bootstrap.Modal.getInstance($('#scheduleModal')[0]);
                    modal.hide();
                } else {
                    alert('Failed to save the schedule. Try again.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error saving schedule:', error);
                alert('An error occurred. Please try again.');
            },
        });
    });
});
