<div class="container-fluid p-0 m-0" id="scanners" style="display: none;">
    <div class="custom-scan-container"> 
        <h1 class="custom-scan-h1">Attendance</h1>
        <input type="file" id="qrUpload" accept="image/*" class="form-control mb-3" onchange="processQRCode(event)">
        <div id="qrResult" class="alert alert-info mt-3" style="display: none;"></div>
    </div> 
    <div class="custom-scan-footer">
        <button class="btn btn-secondary custom-back-button" onclick="showSection(event, 'strong')">Back</button>
    </div>
</div>
