let scanner;

        // Function to start the QR Code scanner automatically
        function startScanner() {
            const videoElement = document.getElementById("qr-video");

            // Initialize the QR scanner
            scanner = new Html5QrcodeScanner("qr-video", {
                fps: 10, // Frames per second
                qrbox: 250, // Size of the scanning box
                aspectRatio: 1.0
            });

            // Start the scanner with the rear camera
            scanner.render(onScanSuccess, onScanError);
        }

        // Function to handle successful scan
        function onScanSuccess(decodedText, decodedResult) {
            document.getElementById("scan-result").innerText = `Scanned Result: ${decodedText}`;
            markAttendance(decodedText);
        }

        // Function to handle scan errors
        function onScanError(errorMessage) {
            console.error("Scan error:", errorMessage);
        }

        // Function to mark attendance (you can extend this as needed)
        function markAttendance(studentId) {
            alert("Attendance marked for student ID: " + studentId);
        }

        // Function to hide the scanner when the back button is clicked
        function hideScanner() {
            document.getElementById("scanners").style.display = "none"; // Hide the scanner
            scanner.clear();  // Stop the scanner
        }

        // Automatically start scanning when the page loads
        window.onload = function() {
            document.getElementById("scanners").style.display = "block";  // Show the scanner section
            startScanner();  // Start the scanner
        };