<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASIATECH Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Petrona&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <!-- Left Section with Background and Text -->
        <div class="left-section">
            <div class="text-container">
                <h1>ASIATECH</h1>
                <p>Student Athlete Progress Portal</p>
            </div>
            <div class="logo-container">
                <img src="./Upload/ASAPP.png" alt="Logo 1" class="logo">
                <img src="./Upload/RAWR.png" alt="Logo 2" class="logo">
            </div>
        </div>
        <!-- Right Section with Login Form -->
        <div class="right-section">
            <form class="login-form" id="loginForm" method="POST" action="">
                <input type="email" name="email" placeholder="Email" required>
                <div class="password-container">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <label for="show-password">
                        <input type="checkbox" id="show-password"> Show Password
                    </label>
                </div>
                <button type="submit">LOGIN</button>
            </form>
            <!-- Added Text at the Bottom -->
            <div class="centered-text">
                <span class="tryout-text" onclick="redirectToTryout()">
                    Wanna join the tryout? Register here.
                </span>
            </div>
        </div>
    </div>

    <script>
        // Redirect to tryout.php
        function redirectToTryout() {
            window.location.href = './Guest/pages/tryout.php';
        }
    </script>
    <script src="login function/crud-ajax/login.js"></script>
</body>
</html>
