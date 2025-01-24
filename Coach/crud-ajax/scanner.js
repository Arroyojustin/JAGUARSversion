function onScanSuccess(decodedText, decodedResult) {
    // Here, the decodedText is the student QR code data, which could be student ID or another identifier
    console.log("QR Code decoded: " + decodedText);
    
    // Send the QR code data to PHP to mark attendance
    markAttendance(decodedText);
    
    // Optionally, stop scanning after successful scan
    html5QrCode.stop().then((ignore) => {
        console.log("QR Code scanning stopped.");
    }).catch((err) => {
        console.error("Error stopping scanner", err);
    });
}

function markAttendance(studentId) {
    // Send the studentId to PHP for attendance processing
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "controller/scanner.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert("Attendance marked for student: " + studentId);
            // Additional logic for marking attendance
        }
    };
    xhr.send("student_id=" + encodeURIComponent(studentId));
}

function onScanError(errorMessage) {
    // Handle scan errors
    console.error(errorMessage);
}

// Initialize the QR code scanner when the page is ready
window.onload = function() {
    var html5QrCode = new Html5Qrcode("reader");
    var config = { fps: 10, qrbox: 250 };
    
    // Start the camera and scan the QR code
    html5QrCode.start({ facingMode: "environment" }, config, onScanSuccess, onScanError)
        .catch((err) => {
            console.error("Error starting QR code scanner", err);
        });
}