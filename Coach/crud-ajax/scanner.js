// Function to start the QR Code scanner
function startQRCodeScanner() {
    const qrCodeReader = new Html5Qrcode("qr-reader");

    // Start scanning using the rear camera
    qrCodeReader.start(
        { facingMode: "environment" }, // Use rear camera
        {
            fps: 10,  // Frames per second
            qrbox: 250 // Size of the scanning box
        },
        (decodedText, decodedResult) => {
            // Handle the QR code result here
            console.log(decodedText);  // For debugging

            // Example: Mark attendance based on decoded QR code
            markAttendance(decodedText);
        },
        (errorMessage) => {
            console.error(errorMessage); // In case of error
        }
    ).catch((err) => {
        console.error(err); // If scanning fails
    });
}

// Function to mark attendance (example)
function markAttendance(studentId) {
    alert("Attendance marked for student ID: " + studentId);
}

// Show the scanner when the button is clicked
function showScanner() {
    // Show the QR scanner section
    document.getElementById("scanners").style.display = "block";  
    startQRCodeScanner();  // Start the QR code scanning
}
