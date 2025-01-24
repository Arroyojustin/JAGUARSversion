// Function to handle successful QR code scan
function onScanSuccess(decodedText, decodedResult) {
    // decodedText will be the student QR code data, e.g., student ID
    console.log("QR Code decoded: " + decodedText);
    
    // Call function to mark attendance for the student
    markAttendance(decodedText);
    
    // Optionally, stop the scanner after successful scan
    html5QrCode.stop().then((ignore) => {
        console.log("QR Code scanning stopped.");
    }).catch((err) => {
        console.error("Error stopping scanner", err);
    });
}

// Function to send scanned student ID to PHP to mark attendance
function markAttendance(studentId) {
    // Send the student ID to PHP for processing attendance
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "controller/scanner.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert("Attendance marked for student: " + studentId);
            // Additional logic for marking attendance, if needed
        }
    };
    xhr.send("student_id=" + encodeURIComponent(studentId));
}

// Handle QR scan errors
function onScanError(errorMessage) {
    console.error(errorMessage);
}

// Initialize QR code scanner
window.onload = function() {
    var html5QrCode = new Html5Qrcode("reader");
    
    // Configure the QR scanner
    var config = {
        fps: 10,  // Frames per second for scanning
        qrbox: 250  // Box size for the scanner
    };
    
    // Start the scanner using the camera
    html5QrCode.start({ facingMode: "environment" }, config, onScanSuccess, onScanError)
    .then((_) => {
        // Scanning started successfully
    }).catch((err) => {
        console.error("Error starting QR scanner", err);
    });
};