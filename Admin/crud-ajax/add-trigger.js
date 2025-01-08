$(document).ready(function(){
    $('#add-coordinator-form').on('submit', function(e){
        e.preventDefault();
        var formData = $(this).serialize(); // Get form data

        $.ajax({
            type: 'POST',
            url: 'controller/add-coordinator.php', // Your PHP file to handle the request
            data: formData,
            success: function(response){
                var res = JSON.parse(response);
                if(res.status == 'success'){
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Coordinator added successfully',
                        timer: 2000,
                        background: '#ab9f6ca',
                        iconColor: '#a2e7d32',
                        color: '#a155724',
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: res.message, // Display the error message from PHP
                        icon: 'error',
                        confirmButtonText: 'Okay'
                    });
                }
            }
        });
    });
});
