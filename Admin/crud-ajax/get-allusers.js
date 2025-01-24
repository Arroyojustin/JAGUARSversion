$(document).ready(function() {
    // Function to fetch and populate user data dynamically
    function fetchUserData() {
        $.ajax({
            url: 'controller/get-allusers.php',  // This PHP file will handle the SQL query
            type: 'GET',
            dataType: 'json',  // Expecting JSON response
            success: function(response) {
                // Clear the table before adding new data
                $('#tdata').empty();

                // Loop through the response data and add it to the table
                $.each(response, function(index, user) {
                    const row = `<tr>
                        <td><input type="checkbox" class="userCheckbox"></td>
                        <td>${user.firstname}</td>
                        <td>${user.lastname}</td>
                        <td>${user.gender}</td>
                        <td>${user.email}</td>
                    </tr>`;
                    $('#tdata').append(row);
                });
            },
            error: function() {
                alert('Error fetching user data');
            }
        });
    }

    // Call fetchUserData on page load
    fetchUserData();

    // Optional: Select all checkbox functionality
    $('#selectAllCheckbox').on('change', function() {
        const isChecked = $(this).prop('checked');
        $('.userCheckbox').prop('checked', isChecked);
    });
});
