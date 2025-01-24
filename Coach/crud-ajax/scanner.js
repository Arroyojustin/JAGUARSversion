function handleImageUpload(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = new Image();
            img.src = e.target.result;
            img.onload = function() {
                scanQRCodeFromImage(img);
            };
        };
        reader.readAsDataURL(file);
    }
}

function openCamera() {
    // This function would activate the camera to capture an image
    // For simplicity, we will use a predefined method or library to handle QR scanning from live feed
    alert("Camera functionality needs to be implemented.");
}

function scanQRCodeFromImage(img) {
    // Use a library like 'jsQR' or 'QRCodeScanner' to scan the QR code from the uploaded image
    // For demonstration, we assume the QR code contains the user ID or student number
    const qrCodeData = scanQRCode(img); // A function to scan the QR code from the image

    if (qrCodeData) {
        fetchUserDetails(qrCodeData); // Query the database to get user details
    } else {
        alert("No QR code found in the image.");
    }
}

function scanQRCode(img) {
    // Placeholder function to simulate QR code scanning
    // In practice, you can integrate libraries to decode the QR code from the image
    return { student_no: "12345" }; // Example QR code data (can be student number or ID)
}

function fetchUserDetails(qrCodeData) {
    // Make an AJAX request to the server to get user details using the scanned QR code data
    const userIdentifier = qrCodeData.student_no; // You can use student_no or id depending on your QR code structure

    // Example AJAX call to fetch user details from the database
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `controller/scanner.php?student_no=${userIdentifier}`, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const user = JSON.parse(xhr.responseText);
            if (user) {
                document.getElementById('scanned-info').style.display = 'block';
                document.getElementById('person-info').innerText = `
                    Name: ${user.firstname} ${user.lastname}
                    ID: ${user.student_no}
                    Gender: ${user.gender}
                    Email: ${user.email}
                    Civil Status: ${user.civil_status}
                `;
            } else {
                alert("User not found.");
            }
        }
    };
    xhr.send();
}