<div class="container-fluid p-0 m-0" id="scanners" style="display: none;">
    <div class="custom-scan-container"> 
        <h1 class="custom-scan-h1">Attendance</h1>

        <!-- Options to upload a photo or take a picture -->
        <div class="scan-options">
            <label for="file-upload" class="btn btn-primary">Upload a Picture</label>
            <input type="file" id="file-upload" accept="image/*" style="display: none;" onchange="handleImageUpload(event)">
            <button class="btn btn-primary" onclick="openCamera()">Take a Picture</button>
        </div>

        <!-- Display the scanned QR code information -->
        <div id="scanned-info" class="mt-4" style="display: none;">
            <h3>Scanned Information:</h3>
            <p id="person-info"></p>
        </div>
    </div> 

    <div class="custom-scan-footer">
        <button class="btn btn-secondary custom-back-button" onclick="showSection(event, 'strong')">Back</button>
    </div>
</div>