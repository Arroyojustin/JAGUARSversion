<?php
require_once '../../dbconn.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the submitted data from the POST request
    $gender = $conn->real_escape_string($_POST['gender']);
    $health_protocol = $conn->real_escape_string($_POST['health_protocol']);

    // Prepare an SQL query to update the most recent entry in the requirements table
    $stmt = $conn->prepare("UPDATE `requirements` 
                            SET gender = ?, health_protocol = ? 
                            WHERE id = (SELECT MAX(id) FROM `requirements`)");
    $stmt->bind_param("ss", $gender, $health_protocol);

    if ($stmt->execute()) {
        // Redirect to the next page if the query was successful
        header("Location: sport-pic.php");
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
    <link rel="stylesheet" href="../../assets/css/guest css/protocol.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid p-0 m-0" id="page3">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <!-- Title -->
            <div class="text-center mb-4">
                <h2 class="health-requirements-title">Requirements</h2>
            </div>

            <!-- Form -->
            <form class="health-form" method="POST" action="">
                <!-- Gender Field -->
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="" disabled selected>Select your gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <!-- Health Protocol Field -->
                <div class="mb-3">
                    <label for="health-protocol" class="form-label">Health Protocol</label>
                    <input class="form-control" id="health-protocol" name="health_protocol" type="text" placeholder="Describe any health protocols you follow or concerns" required />
                </div>

                <!-- Health Reminder -->
                <div class="text-center mb-4">
                    <h4 class="text-danger">Reminder:</h4>
                    <p><strong>Please be honest in your health condition</strong>. If there is any pain, that is still an obligation of the school.</p>
                </div>

                <!-- Buttons -->
                <div class="health-button-container">
                    <button type="submit" class="btn btn-lg btn-success">Next</button>
                    <button type="button" class="btn btn-lg btn-secondary" onclick="goBack2()">Back</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function goBack2() {
        window.location.href = './fillin.php'; // Redirect to fillin.php
    }
</script>
</body>
</html>
