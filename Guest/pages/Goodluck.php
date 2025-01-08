<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for Tryout</title>
    <!-- You can include Bootstrap or your own styles here -->
    <link rel="stylesheet" href="../../assets/css/guest css/goo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid p-0 m-0" id="proceed">
  <div class="container text-center d-flex flex-column justify-content-center">
    <h3 class="gl-h3 mb-4 fixed-header">Good choice</h3>

    <div class="content">
      <img src="../../Upload/check-removebg-preview.png" alt="Green Check Icon" class="gl-image mb-4 animate-check">
      <h3 class="gl-h4 gl-bottom-text">Goodluck!</h3>
      <p class="gl-notification">We'll notify you</p>
      <button class="btn btn-lg btn-secondary mt-auto" onclick="rediRlo()">Proceed</button>
    </div>
  </div>
</div>

<script>
    function rediRlo() {
        window.location.href = '../../index.php';
    }
</script>
