let studentlistsPage = 1;
let studentlistsPageLength = 10;

// Function to load student data with sports dropdown populated
function loadTableData() {
    $.ajax({
        url: 'controller/studentlist/cate-stud.php',
        type: 'GET',
        dataType: 'json',
        data: {
            page: studentlistsPage,
            length: studentlistsPageLength
        },
        success: function(response) {
            if (response.html) {
                $('#studentlisted tbody').html(response.html);
                // Populate sports dropdown
                let sportOptions = '<option value="" disabled selected>Select a Sport</option>';
                response.sports.forEach(function(sport) {
                    sportOptions += `<option value="${sport}">${sport}</option>`;
                });
                $('#categorySelect').html(sportOptions);
            } else {
                $('#studentlisted tbody').html('<tr><td colspan="4">No data available</td></tr>');
            }

            if (response.pagination) {
                $('#studentlists-pagination').html(response.pagination);
            } else {
                $('#studentlists-pagination').html('');
            }

            $('#studentlists-tableInfo').text(response.total > 0 ? `Showing ${response.start} to ${response.end} of ${response.total} entries` : 'No entries available');
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
            console.log('Response Text:', xhr.responseText);
        }
    });
}

// Event handler for pagination
$('#studentlists-pagination').on('click', '.page-link', function(e) {
    e.preventDefault();
    studentlistsPage = $(this).data('page');
    loadTableData();
});

// Event handler for page length selection
$('#studentlists-pageLengthSelect').on('change', function() {
    studentlistsPageLength = parseInt($(this).val());
    studentlistsPage = 1;
    loadTableData();
});

loadTableData(); // Initial data load
