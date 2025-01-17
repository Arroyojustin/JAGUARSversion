<?php
include('../../dbconn.php');
session_start(); // Ensure session is started to access session variables

// Fetch sports data for the dropdown
$sportsData = [];

$sql = "SELECT id, sport_name FROM sports";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sportsData[] = $row;
    }
}

// Check if the form is submitted and update the sport_id in the last inserted row
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedSport = $conn->real_escape_string($_POST['selected_sport']);

    // Fetch the maximum ID for the last inserted row in the requirements table
    $sql = "SELECT MAX(id) as max_id FROM requirements";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $maxId = $row['max_id'];

    if ($maxId) {
        // Update the sport_id (not sport_name) in the last inserted row
        $sql = "UPDATE requirements SET sport_id = '$selectedSport' WHERE id = $maxId";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href = './Goodluck.php';</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('No record found to update. Please fill out the previous page first.');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for Tryout</title>
    <link rel="stylesheet" href="../../assets/css/guest css/img-slide.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid p-0 m-0" id="slider">
  <h3 class="text-center">Choose Your Sport</h3>
  
  <!-- Logo Container -->
  <div class="sport-logo-container">
    <i class='bx bxs-chevron-left arrow left' onclick="changeSlide(-1)"></i>
    <div class="logo-wrapper">
      <p class="sport-name" id="sportName"></p> <!-- The sport name -->
    </div>
    <i class='bx bxs-chevron-right arrow right' onclick="changeSlide(1)"></i>
  </div>
  
  <!-- Button Group -->
  <div class="sport-button-container">
    <form method="POST" action="">
      <input type="hidden" name="selected_sport" id="selectedSport">
      <button type="submit" class="btn btn-lg btn-success" id="registerBtn">Register</button>
    </form>
    <button type="button" class="btn btn-lg btn-secondary" onclick="previewsP()" id="backBtn">Back</button>
  </div>
</div>

<script>
  // Fetch sports data from PHP and convert it to a JavaScript array
  const sportsData = <?php echo json_encode($sportsData); ?>;
  let currentIndex = 0;

  // Initialize the first sport on page load
  document.addEventListener('DOMContentLoaded', () => {
    if (sportsData.length > 0) {
        updateSlide();
    } else {
        console.error('No sports data found.');
    }
  });

  function updateSlide() {
    const sportName = document.getElementById('sportName');
    const selectedSportInput = document.getElementById('selectedSport');

    const currentSport = sportsData[currentIndex];
    sportName.textContent = currentSport.sport_name; // Set the sport name

    // Set the selected sport ID in the hidden input field
    selectedSportInput.value = currentSport.id;
  }

  function changeSlide(direction) {
    currentIndex = (currentIndex + direction + sportsData.length) % sportsData.length;
    updateSlide();
  }

  function previewsP() {
    window.location.href = './protocol.php'; // Redirect to the protocol page
  }
</script>
</body>
</html>
