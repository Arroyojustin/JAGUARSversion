<!-- Section for uploading or scanning QR code -->
<div class="container-fluid p-0 m-0" id="scanners" style="display: none;">
    <div class="custom-scan-container">
        <h1 class="custom-scan-h1">Attendance</h1>
        
        <!-- Upload or take a picture button -->
        <div class="mb-3">
            <button id="startScan" class="btn btn-primary" onclick="startScan()">Scan QR Code</button>
            <input type="file" id="uploadQRCode" accept="image/*" onchange="handleImageUpload(event)" style="display: none;">
            <button class="btn btn-secondary" onclick="document.getElementById('uploadQRCode').click();">Upload QR Code</button>
        </div>

        <!-- QR code scanning container -->
        <div id="qr-reader" style="width: 100%;"></div>
    </div>

    <div class="custom-scan-footer">
        <button class="btn btn-secondary custom-back-button" onclick="showSection(event, 'strong')">Back</button>
    </div>
</div>