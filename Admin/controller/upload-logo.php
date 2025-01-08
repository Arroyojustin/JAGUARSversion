<?php
include '../../dbconn.php'; // Include your DB connection

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['logo_photo']) && isset($_POST['sport_id'])) {
    $sport_id = $_POST['sport_id'];
    $file = $_FILES['logo_photo'];
    
    if ($file['error'] === UPLOAD_ERR_OK) {
        $targetDir = "Uploads/";
        $fileName = basename($file["name"]);
        $targetFile = $targetDir . $fileName;

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            $updateQuery = "UPDATE sports SET logo = ? WHERE id = ?";
            if ($stmt = $conn->prepare($updateQuery)) {
                $stmt->bind_param("si", $targetFile, $sport_id);
                if ($stmt->execute()) {
                    $response['status'] = 'success';
                    $response['message'] = 'Logo updated successfully!';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Error updating the logo.';
                }
                $stmt->close();
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Error preparing the query.';
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error uploading the file.';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'File upload error: ' . $file['error'];
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request.';
}

$conn->close();

// Send the response as JSON
echo json_encode($response);
?>
