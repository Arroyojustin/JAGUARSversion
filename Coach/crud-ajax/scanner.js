    // Initialize Instascan
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

    // Handle successful scans
    scanner.addListener('scan', function (content) {
        document.getElementById("qr-reader-results").innerHTML = `
            <div class="alert alert-success">
                QR Code Scanned: <strong>${content}</strong>
            </div>`;

        // Send the scanned data to the server
        markAttendance(content);

        // Optionally stop the scanner after a successful scan
        scanner.stop();
    });

    // Start the scanner when the section is shown
    document.getElementById('scanners').addEventListener('show', function () {
        Instascan.Camera.getCameras()
            .then(function (cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]); // Use the first available camera
                } else {
                    alert('No cameras found.');
                }
            })
            .catch(function (e) {
                console.error(e);
            });
    });

    // Mark attendance via AJAX request
    function markAttendance(qrCodeData) {
        fetch('.../controller/scanner.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ qrCode: qrCodeData })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Attendance marked successfully!");
            } else {
                alert("Failed to mark attendance. Try again.");
            }
        })
        .catch(err => console.error(err));
    }