$(document).ready(function() {
    function fetchAttendance() {
        var category = $('#categorySelect').val();
        var studentName = $('#studentName').val();
        
        $.ajax({
            url: 'controller/retrieve-stud.php',
            type: 'GET',
            data: { category: category, studentName: studentName },
            success: function(response) {
                $('#attendance-body').html(response);
            },
            error: function() {
                alert("Error fetching attendance data.");
            }
        });
    }

    // Event listeners
    $('#categorySelect').change(fetchAttendance);
    $('#studentName').keyup(function() {
        clearTimeout(this.typingTimer);
        this.typingTimer = setTimeout(fetchAttendance, 500); // Debounce typing
    });

    // Initial load
    fetchAttendance();
});
