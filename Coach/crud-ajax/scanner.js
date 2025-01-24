    function initializeScanner() {
        const qrCodeReader = new Html5Qrcode("reader");

        const config = { fps: 10, qrbox: 250 };

        qrCodeReader.start(
            { facingMode: "environment" }, // Use back camera
            config,
            (decodedText) => {
                // Handle the decoded text (QR code content)
                document.getElementById("result-text").innerText = `Attendance marked for ID: ${decodedText}`;

                // Optionally, send the data to the server
                markAttendance(decodedText);

                // Stop the scanner
                qrCodeReader.stop().then(() => console.log("Scanner stopped")).catch(console.error);
            },
            (errorMessage) => {
                // Handle scan errors or warnings
                console.log(errorMessage);
            }
        ).catch((err) => {
            console.error("Failed to start QR Code scanner:", err);
        });
    }

    function markAttendance(studentId) {
        // Send the scanned data to your server
        fetch("controller/scanner.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ student_id: studentId }),
        })
            .then(response => response.json())
            .then(data => {
                console.log("Attendance Response:", data);
            })
            .catch(error => console.error("Error marking attendance:", error));
    }

    // Call initializeScanner when the page loads or when you show the scanner section
    document.getElementById("scanners").addEventListener("show", initializeScanner);
