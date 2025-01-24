<!-- <div class="container-fluid p-0 m-0" id="scanners" style="display: none;"> -->
    <!-- <div class="custom-scan-container">
        <h1 class="custom-scan-h1">Attendance</h1>
        <div id="reader" style="width: 100%; height: 400px;"></div> 
        <button class="btn btn-secondary custom-back-button" onclick="showSection(event, 'strong')">Back</button>
    </div>
</div> -->

<div class="container-fluid p-0 m-0" id="scanners" style="display: block;">
        <div class="custom-scan-container"> 
            <h1 class="custom-scan-h1">Attendance</h1>
            <!-- Video element to display the camera feed -->
            <video id="qr-video" style="width: 100%; height: auto;"></video>
            <p id="scan-result" style="font-size: 18px; margin-top: 10px;">Scanning QR Code...</p>
        </div>
        <div class="custom-scan-footer">
            <button class="btn btn-secondary custom-back-button" onclick="hideScanner()">Back</button>
        </div>
    </div>