<div class="container-fluid p-0 m-0" id="qqr" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;">
  <h1 class="qr-heading">Attendance</h1>
    <div id="qr-reader" style="width: 300px;"></div>
    <div id="result">
      <p>Scanned Result:</p>
      <pre id="result-value">No QR code scanned yet</pre>
    </div>
    <p id="error-message"></p>
</div>

<script>
    // Initialize the QR Code Scanner
    function onScanSuccess(decodedText, decodedResult) {
      document.getElementById("result-value").innerText = decodedText;
      console.log(`Decoded text: ${decodedText}`, decodedResult);
    }

    function onScanFailure(error) {
      console.warn(`Scan failed: ${error}`);
    }

    function displayError(message) {
      document.getElementById("error-message").innerText = message;
    }

    try {
      const qrCodeScanner = new Html5QrcodeScanner("qr-reader", {
        fps: 10,
        qrbox: 250
      });

      qrCodeScanner.render(onScanSuccess, onScanFailure);
    } catch (e) {
      console.error("Error initializing QR Code scanner:", e);
      displayError("Could not initialize QR Code scanner. Please check your browser and device compatibility.");
    }

    // Check if the browser supports camera access
    if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
      displayError("Camera access is not supported in your browser. Please try another browser.");
    }
  </script>