<?php
include '../../dbconn.php';

// Get JSON data from POST request
$input = json_decode(file_get_contents('php://input'), true);

$student_id = $input['student_id'] ?? null;

if ($student_id) {
    $conn->begin_transaction();
    try {
        // Fetch student data from `approvals` table
        $stmt = $conn->prepare("SELECT first_name, middle_initial, last_name, height, weight, bmi, phone_number, gender, sport_id FROM approvals WHERE id = ?");
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $student_data = $result->fetch_assoc();

            // Validate and hash the password
            if (empty($input['password'])) {
                throw new Exception("Password cannot be empty.");
            }
            $hashedPassword = password_hash($input['password'], PASSWORD_BCRYPT); 

            // Validate email
            if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email format.");
            }

            // Prepare data for `users` table
            $stmt = $conn->prepare(
                "INSERT INTO users 
                (firstname, middle_initial, lastname, student_no, email, password, height, weight, bmi, phone_no, gender, user_type, sports_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'student', ?)"
            );

            $stmt->bind_param(
                "ssssssssssss", 
                $student_data['first_name'], 
                $student_data['middle_initial'], 
                $student_data['last_name'], 
                $input['student_no'], 
                $input['email'], 
                $hashedPassword, 
                $student_data['height'], 
                $student_data['weight'], 
                $student_data['bmi'], 
                $student_data['phone_number'], 
                $student_data['gender'], 
                $student_data['sport_id']
            );

            if (!$stmt->execute()) {
                throw new Exception("Failed to add student to users table.");
            }

            // Remove student from `approvals` table
            $stmt = $conn->prepare("DELETE FROM approvals WHERE id = ?");
            $stmt->bind_param("i", $student_id);

            if (!$stmt->execute()) {
                throw new Exception("Failed to remove student from approvals table.");
            }

            $conn->commit();
            echo json_encode(['status' => 'success', 'message' => 'Student added and removed from approvals successfully.']);
        } else {
            throw new Exception("Student not found in approvals table.");
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid student ID.']);
}

$conn->close();
?>
