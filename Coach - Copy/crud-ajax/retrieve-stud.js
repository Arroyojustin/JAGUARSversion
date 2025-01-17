$(document).ready(function () {
    // Fetch approvals when the page loads
    function fetchStudents() {
        $.ajax({
            url: 'controller/retrieve-stud.php', // Ensure this path is correct
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Clear the list before appending
                $('#approvalList').empty();

                // Append each student's name as a button in the list
                data.forEach(function (student) {
                    $('#approvalList').append(`
                        <li>
                            <button 
                                class="btn btn-outline-secondary student-btn" 
                                data-student-id="${student.id}" 
                                style="margin: 5px; width:100%;">
                                ${student.first_name} ${student.last_name}
                            </button>
                        </li>
                    `);
                });
            },
            error: function (xhr, status, error) {
                console.error('Failed to fetch students:', xhr.responseText, status, error);
            },
        });
    }

    // Fetch students when the page loads
    fetchStudents();
});
