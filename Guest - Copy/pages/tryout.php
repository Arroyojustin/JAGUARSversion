<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for Tryout</title>
    <!-- You can include Bootstrap or your own styles here -->
    <link rel="stylesheet" href="../../assets/css/guest css/remind.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid p-0 m-0" id="guest">
        <div class="logo-section">
            <img src="../../Upload/ASAPP.png" alt="Logo 1" class="img-fluid" style="max-height: 80px;">
            <img src="../../Upload/RAWR.png" alt="Logo 2" class="img-fluid" style="max-height: 90px;">
        </div>

        <!-- Reminder Section -->
        <h3 class="reminder">REMINDER</h3>
        <p class="note">If you want to join in the tryout session, you must choose your proper sport.</p>

        <!-- Button Section -->
        <div class="button-container">
            <button class="btn btn-lg btn-success" onclick="proceedFillup()">Get Start</button>
            <button class="btn btn-lg btn-secondary" onclick="cancelTryout()">Cancel</button>
        </div>
    </div>

    <script>
        function proceedFillup() {
            window.location.href = 'fillup.php';  // Redirect to the homepage
        }
        // Redirect to index.php if the user cancels the tryout
        function cancelTryout() {
            window.location.href = '../../index.php';  // Redirect to the homepage
        }
    </script>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>