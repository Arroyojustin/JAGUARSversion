$(document).ready(function () {
    // Handle QR code generation and enabling inputs
    $('#generateQRButton').on('click', function () {
        // Get the input value for the QR code
        const studentName = $('#studentQRInput').val();

        // Check if input is empty
        if (!studentName) {
            alert('Please enter a name to generate the QR Code.');
            return;
        }

        // Enable all inputs and the Add Student button in the Student Account form
        $('#studentForm input, #addStudentButton').prop('disabled', false);

        // Clear any existing QR code
        $('#qrCodeDisplay').empty();

        // Generate the QR code
        QRCode.toCanvas(
            document.createElement('canvas'), // Temporary canvas
            studentName,
            {
                width: 200, // Set the size of the QR code
            },
            function (error, canvas) {
                if (error) {
                    console.error(error);
                    alert('Error generating QR Code.');
                    return;
                }

                // Append the QR code canvas to the display div
                $('#qrCodeDisplay').append(canvas);
            }
        );
    });
});
