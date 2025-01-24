let scanner;

        // Function to start the QR Code scanner (camera mode)
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

        // Function to handle the file upload and process the QR code from the uploaded image
        function handleFileUpload(event) {
            const file = event.target.files[0];
            if (!file) {
                return;
            }
            
            // Create a file reader to read the uploaded file
            const reader = new FileReader();
            reader.onload = function(e) {
                const imageUrl = e.target.result;

                // Use Html5Qrcode to scan the uploaded image
                Html5Qrcode.scanFile(imageUrl, true)
                    .then((decodedText) => {
                        document.getElementById("scan-result").innerText = `Scanned Result: ${decodedText}`;
                        markAttendance(decodedText);
                    })
                    .catch((error) => {
                        console.error("Scan error:", error);
                        document.getElementById("scan-result").innerText = "Failed to scan the QR Code from the image.";
                    });
            };
            reader.readAsDataURL(file);
        }

        // Automatically start scanning when the page loads (optional)
        window.onload = function() {
            document.getElementById("scanners").style.display = "block";  // Show the scanner section
            startScanner();  // Start the camera scanner
        };