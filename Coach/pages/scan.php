<div class="container-fluid p-0 m-0" id="scanners" style="display: none;">
    <div class="custom-scan-container">
        <h1 class="custom-scan-h1">Attendance</h1>
        <video id="preview" style="width: 100%; max-width: 500px; border: 1px solid #ccc; border-radius: 8px;"></video>
        <div id="qr-reader-results" style="text-align: center; margin-top: 20px;"></div>
    </div>
    <div class="custom-scan-footer">
        <button class="btn btn-secondary custom-back-button" onclick="showSection(event, 'strong'); stopScanner();">Back</button>
    </div>
</div>

<script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
<script>
    // Initialize the QR code scanner
    const videoElementId = "preview"; // ID of the video element in your HTML
    const qrReaderResultsId = "qr-reader-results"; // ID for displaying results

    function onScanSuccess(decodedText, decodedResult) {
        // Display the scanned QR code
        document.getElementById(qrReaderResultsId).innerHTML = `
            <div class="alert alert-success">
                QR Code Scanned: <strong>${decodedText}</strong>
            </div>`;
        
        // Send the scanned QR code to the backend
        fetch('controller/scanner.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ qrCode: decodedText })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Attendance marked successfully!");
            } else {
                alert("Failed to mark attendance. Error: " + data.error);
            }
        })
        .catch(err => console.error(err));
    }

    function onScanFailure(error) {
        // Optional: Log errors to the console
        console.warn(`QR Code scan failed: ${error}`);
    }

    // Configure the scanner using html5-qrcode
    const html5QrCode = new Html5Qrcode(videoElementId);

    // Start the camera and scanner
    Html5Qrcode.getCameras().then(devices => {
        if (devices && devices.length) {
            const cameraId = devices[0].id; // Select the first camera
            html5QrCode.start(
                cameraId,
                {
                    fps: 10, // Frames per second for scanning
                    qrbox: { width: 250, height: 250 } // Size of the scanning area
                },
                onScanSuccess,
                onScanFailure
            );
        } else {
            document.getElementById(qrReaderResultsId).innerHTML = `
                <div class="alert alert-danger">
                    No camera found. Please connect a camera and refresh the page.
                </div>`;
        }
    }).catch(err => {
        console.error("Error fetching cameras:", err);
    });

    // Stop the scanner when leaving the page
    function stopScanner() {
        html5QrCode.stop().then(() => {
            console.log("Scanner stopped successfully.");
        }).catch(err => {
            console.error("Error stopping scanner:", err);
        });
    }
</script>
