 // Function to initialize the QR Scanner
 function startQRScanner() {
    // Select the video element where the camera feed will be shown
    const videoElem = document.getElementById('qr-video');
    
    // Create an instance of the QR scanner with a callback to handle the scanned result
    const qrScanner = new QrScanner(videoElem, result => {
        // Display the result from the QR code scan
        document.getElementById('scan-result').innerText = `Student ID: ${result}`;

        // Send the scanned student ID to the server
        markAttendance(result);
    });

    // Start the camera for scanning QR codes
    qrScanner.start();
}

// Function to send the student ID to the server and mark attendance
function markAttendance(studentId) {
    // Create a FormData object to send the student ID to the server via POST
    const formData = new FormData();
    formData.append('student_id', studentId);

    // Use Fetch API to send a POST request to the server
    fetch('controller/scanner.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Get the response text
    .then(data => {
        // Display the server's response (Success or Error message)
        alert(data);
    })
    .catch(error => {
        console.error('Error marking attendance:', error);
        alert('Error marking attendance.');
    });
}

// Start the QR scanner when the page is loaded
window.onload = function() {
    startQRScanner();
};