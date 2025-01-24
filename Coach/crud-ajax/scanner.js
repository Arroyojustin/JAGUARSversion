let qrCodeScanner;

// Start scanning using camera
function startScan() {
    document.getElementById("qr-reader").innerHTML = '';  // Clear previous scans
    qrCodeScanner = new Html5QrcodeScanner("qr-reader", {
        fps: 10,
        qrbox: 250
    });
    qrCodeScanner.render(onScanSuccess, onScanError);
}

// Handle QR code scan success
function onScanSuccess(decodedText, decodedResult) {
    console.log(`QR Code scanned: ${decodedText}`);
    // Here, send decodedText (user info from QR code) to your server to identify the user
    alert(`User identified: ${decodedText}`);
    qrCodeScanner.clear();  // Stop scanning after successful scan
}

// Handle QR code scan error
function onScanError(errorMessage) {
    console.warn(`QR code scan error: ${errorMessage}`);
}

// Handle image upload and scan
function handleImageUpload(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = new Image();
            img.onload = function() {
                const canvas = document.createElement('canvas');
                canvas.width = img.width;
                canvas.height = img.height;
                canvas.getContext('2d').drawImage(img, 0, 0);
                const imageData = canvas.toDataURL('image/jpeg');
                
                // Scan the image for QR code
                Html5Qrcode.scanFile(imageData, false)
                    .then(decodedText => {
                        console.log(`QR Code scanned: ${decodedText}`);
                        alert(`User identified: ${decodedText}`);
                    })
                    .catch(err => {
                        console.error("QR code scan error: ", err);
                    });
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}