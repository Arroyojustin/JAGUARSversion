<?php
require_once '../../dbconn.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the submitted data from the POST request
    $phone_number = $_POST['phone_number'];
    $height = !empty($_POST['height']) ? $_POST['height'] : null;
    $weight = !empty($_POST['weight']) ? $_POST['weight'] : null;
    $bmi = !empty($_POST['bmi']) ? $_POST['bmi'] : null;

    // Prepare an SQL query to insert the data into the requirements table
    $stmt = $conn->prepare("UPDATE `requirements` 
                            SET phone_number = ?, height = ?, weight = ?, bmi = ? 
                            WHERE id = (SELECT MAX(id) FROM `requirements`)");
    $stmt->bind_param("sddd", $phone_number, $height, $weight, $bmi);

    if ($stmt->execute()) {
        // Redirect to the next page if the query was successful
        header("Location: protocol.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for Tryout</title>
    <link rel="stylesheet" href="../../assets/css/guest css/fill-in.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid p-0 m-0" id="page2">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="text-center mb-4">
        <h2 class="fillin-requirements-title">Requirements</h2>
      </div>

      <!-- Form -->
      <form class="requirementsForm" method="POST" action="" onsubmit="return confirmSkip()">
          <div class="fillin-form-group mb-3">
            <label for="phone-number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone-number" name="phone_number" required>
          </div>
          <div class="fillin-form-group mb-3">
            <label for="height" class="form-label">Height (cm)</label>
            <input type="number" class="form-control" id="height" name="height">
          </div>
          <div class="fillin-form-group mb-3">
            <label for="weight" class="form-label">Weight (kg)</label>
            <input type="number" class="form-control" id="weight" name="weight">
          </div>
          <div class="fillin-form-group mb-3">
            <label for="bmi" class="form-label">BMI</label>
            <input type="number" class="form-control" id="bmi" name="bmi" readonly>
          </div>
          <div class="fillin-button-container">
              <button type="submit" class="btn btn-lg btn-success">Next</button>
              <button type="button" class="btn btn-lg btn-secondary" onclick="backPage1()">Back</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
    function backPage1() {
        window.location.href = './fillup.php'; // Redirect to fillup.php
    }

    document.addEventListener('DOMContentLoaded', function () {
        const heightInput = document.getElementById('height');
        const weightInput = document.getElementById('weight');
        const bmiInput = document.getElementById('bmi');

        function calculateBMI() {
            const height = parseFloat(heightInput.value);
            const weight = parseFloat(weightInput.value);

            if (height && weight) {
                const heightInMeters = height / 100;
                const bmi = weight / (heightInMeters * heightInMeters);
                bmiInput.value = bmi.toFixed(2);
            } else {
                bmiInput.value = '';
            }
        }

        heightInput.addEventListener('input', calculateBMI);
        weightInput.addEventListener('input', calculateBMI);
    });

    function confirmSkip() {
        const height = document.getElementById('height').value;
        const weight = document.getElementById('weight').value;
        const bmi = document.getElementById('bmi').value;

        if (!height || !weight || !bmi) {
            return confirm('Are you sure you want to skip filling in your height, weight, and BMI?');
        }
        return true;
    }
</script>
</body>
</html>
