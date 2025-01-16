let studentlistsPage = 1;
let studentlistsPageLength = 10;
let selectedSport = '';  // Default to an empty value

function loadstudentlistsTableData() {
    $.ajax({
        url: 'controller/studentlist/cate-stud.php',
        type: 'GET',
        dataType: 'json',
        data: {
            page: studentlistsPage,
            length: studentlistsPageLength,
            sport: selectedSport,  // Send the selected sport (empty when "All Sports")
        },
        success: function(response) {
            if (response.html) {
                $('#student-lists tbody').html(response.html);
            } else {
                $('#student-lists tbody').html('<tr><td colspan="3">No data available</td></tr>');
            }
            if (response.pagination) {
                $('#student-lists-pagination').html(response.pagination);
            } else {
                $('#student-lists-pagination').html('');
            }
            $('#student-lists-tableInfo').text(response.total > 0 ? `Showing ${response.start} to ${response.end} of ${response.total} entries` : 'No entries available');
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
            console.log('Response Text:', xhr.responseText);
        }
    });
}

function loadSportsOptions() {
    $.ajax({
        url: 'controller/studentlist/retrieve-sports.php', // Create this file to fetch sports
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.sports && response.sports.length) {
                response.sports.forEach((sport) => {
                    $('#student-lists-sportSelect').append(
                        $('<option>', {
                            value: sport.id,
                            text: sport.sport_name,
                        })
                    );
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error:', status, error);
            console.log('Response Text:', xhr.responseText);
        },
    });
}

// Event listener for sport selection change
$('#student-lists-sportSelect').on('change', function () {
    selectedSport = $(this).val();  // If empty, it will pass an empty string
    studentlistsPage = 1;
    loadstudentlistsTableData();
});

$('#student-lists-pageLengthSelect').on('change', function() {
    studentlistsPageLength = parseInt($(this).val());
    studentlistsPage = 1;
    loadstudentlistsTableData();
});

$('#student-lists-pagination').on('click', '.page-link', function(e) {
    e.preventDefault();
    studentlistsPage = $(this).data('page');
    loadstudentlistsTableData();
});

loadSportsOptions();
loadstudentlistsTableData();