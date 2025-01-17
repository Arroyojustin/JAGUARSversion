<?php include '../../dbconn.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for Tryout</title>
    <link rel="stylesheet" href="../../assets/css/guest css/fill.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid p-0 m-0" id="page1">
  <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <!-- Title -->
            <div class="text-center mb-4">
                <h2 class="fillup-requirements-title">Requirements</h2>
            </div>

            <!-- Form Start -->
            <form class="fillup-form" method="POST" action="">
                <!-- First Name -->
                <div class="mb-3">
                    <label for="first-name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first-name" name="first_name" required>
                </div>

                <!-- Last Name -->
                <div class="mb-3">
                    <label for="last-name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last-name" name="last_name" required>
                </div>

                <!-- Middle Initial -->
                <div class="mb-3">
                    <label for="middle-initial" class="form-label">Middle Initial</label>
                    <input type="text" class="form-control" id="middle-initial" name="middle_initial" maxlength="1" required>
                </div>

                <!-- Buttons -->
                <div class="fillup-button-container">
                    <button type="submit" class="btn btn-lg btn-success">Next</button>
                    <button type="button" class="btn btn-lg btn-secondary" onclick="backTryout()">Back</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function backTryout() {
        window.location.href = './tryout.php';
    }
</script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $middle_initial = $conn->real_escape_string($_POST['middle_initial']);

    // Insert into the requirements table
    $sql = "INSERT INTO requirements (first_name, last_name, middle_initial) VALUES ('$first_name', '$last_name', '$middle_initial')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to fillin.php after successful submission
        header("Location: ./fillin.php");
        exit();
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>
