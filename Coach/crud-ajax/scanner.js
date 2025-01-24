// Initialize the QR Code scanner
function startQRCodeScanner() {
    const qrCodeReader = new Html5Qrcode("qr-reader");

    // Start scanning
    qrCodeReader.start(
        { facingMode: "environment" }, // Use the rear camera
        {
            fps: 10,  // Frames per second
            qrbox: 250 // The size of the scanning box
        },
        (decodedText, decodedResult) => {
            // Handle the QR code result here
            console.log(decodedText);  // For debugging

            // Example: If you want to log the student ID based on QR code data
            // You can call a function here to mark attendance
            markAttendance(decodedText);
        },
        (errorMessage) => {
            console.error(errorMessage); // In case of error
        }
    ).catch((err) => {
        console.error(err); // If scanning fails
    });
}

// Example function to mark attendance (this can be expanded as needed)
function markAttendance(studentId) {
    alert("Attendance marked for student ID: " + studentId);
}

// Call this function when the section is shown
function showScanner() {
    document.getElementById("scanners").style.display = "block";  // Show scanner section
    startQRCodeScanner();  // Start scanning
}

// Show the scanner when needed
showScanner();
