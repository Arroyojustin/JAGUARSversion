$(document).ready(function() {
    // Fetch training schedules on document ready
    $.ajax({
        url: 'controller/date-time.php', // Path to your PHP script
        method: 'GET',
        success: function(data) {
            var trainings = JSON.parse(data);
            var trainingSchedule = $(".training-schedule");

            trainings.forEach(function(training) {
                var newTrainingItem = $("<div>").addClass("training-item");
                newTrainingItem.html(`<span>${training.Time}</span> <span>-</span> <span>${training.Location}</span>`);
                trainingSchedule.append(newTrainingItem);
            });
        },
        error: function(err) {
            console.error("Error fetching training data:", err);
        }
    });
});

