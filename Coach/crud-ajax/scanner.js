let scanner;

    function startScanner() {
        // Get the video element
        const videoElement = document.getElementById("preview");
        const resultsElement = document.getElementById("qr-reader-results");

        // Initialize the Instascan scanner
        scanner = new Instascan.Scanner({ video: videoElement });

        // Handle scanned QR code
        scanner.addListener("scan", function (content) {
            // Display scanned content
            resultsElement.innerHTML = `
                <div class="alert alert-success">
                    QR Code Scanned: <strong>${content}</strong>
                </div>`;

            // Send scanned data to the server
            fetch("controller/scanner.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ qrCode: content }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        alert("Attendance marked successfully!");
                    } else {
                        alert("Failed to mark attendance. Error: " + data.error);
                    }
                })
                .catch((error) => {
                    console.error("Error sending QR code to the server:", error);
                });
        });

        // Get available cameras
        Instascan.Camera.getCameras()
            .then(function (cameras) {
                if (cameras.length > 0) {
                    // Use the first available camera
                    scanner.start(cameras[0]);
                } else {
                    alert("No cameras found. Please connect a camera and refresh the page.");
                }
            })
            .catch(function (error) {
                console.error("Error accessing cameras:", error);
            });
    }

    function stopScanner() {
        if (scanner) {
            scanner.stop();
        }
    }

    // Start the scanner when the page loads
    document.addEventListener("DOMContentLoaded", startScanner);