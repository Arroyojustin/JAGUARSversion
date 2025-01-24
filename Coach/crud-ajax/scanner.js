function processQRCode(event) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(e) {
        const img = new Image();
        img.src = e.target.result;

        img.onload = function() {
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.width = img.width;
            canvas.height = img.height;
            context.drawImage(img, 0, 0, canvas.width, canvas.height);

            const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
            const qrCodeData = jsQR(imageData.data, canvas.width, canvas.height);

            const resultDiv = document.getElementById('qrResult');
            if (qrCodeData) {
                resultDiv.style.display = 'block';
                resultDiv.textContent = `QR Code Data: ${qrCodeData.data}`;
                // Optional: send the data to the server for attendance marking
                // Example:
                // fetch('/mark-attendance', {
                //     method: 'POST',
                //     headers: { 'Content-Type': 'application/json' },
                //     body: JSON.stringify({ qrData: qrCodeData.data })
                // });
            } else {
                resultDiv.style.display = 'block';
                resultDiv.textContent = 'No valid QR code found in the image.';
            }
        };
    };
    reader.readAsDataURL(file);
}