<?php
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sqlCoach = "SELECT id, sports_id FROM users WHERE user_type = 'coach' LIMIT 1";
    $resultCoach = $conn->query($sqlCoach);

    if ($resultCoach->num_rows > 0) {
        $coach = $resultCoach->fetch_assoc();
        $coachId = $coach['id'];
        $sportsId = $coach['sports_id'];

        // Fetch the Date, Time, Location, and Coach's firstname & lastname
        $sqlTraining = "SELECT Date, Time, Location, created_by FROM training WHERE created_by = $coachId LIMIT 1";
        $resultTraining = $conn->query($sqlTraining);

        if ($resultTraining->num_rows > 0) {
            $training = $resultTraining->fetch_assoc();
            $trainingDate = $training['Date'];
            $trainingTime = $training['Time'];
            $location = $training['Location'];
            $coachId = $training['created_by'];

            // Fetch the firstname and lastname of the coach
            $sqlCoachDetails = "SELECT firstname, lastname, sports_id FROM users WHERE id = $coachId";
            $resultCoachDetails = $conn->query($sqlCoachDetails);

            if ($resultCoachDetails->num_rows > 0) {
                $coachDetails = $resultCoachDetails->fetch_assoc();
                $firstname = $coachDetails['firstname'];
                $lastname = $coachDetails['lastname'];

                // Fetch the sport name from the sports table
                $sqlSport = "SELECT sport_name FROM sports WHERE id = $sportsId";
                $resultSport = $conn->query($sqlSport);
                $sportName = 'No sport found'; // Default value in case the sport doesn't exist
                if ($resultSport->num_rows > 0) {
                    $sport = $resultSport->fetch_assoc();
                    $sportName = $sport['sport_name'];
                }

                // Format date and time
                $date = DateTime::createFromFormat('Y-m-d', $trainingDate);
                $formattedDate = $date ? $date->format('M d Y') : $trainingDate;

                $time = DateTime::createFromFormat('H:i:s', $trainingTime);
                $formattedTime = $time ? $time->format('g:i A') : $trainingTime;

                echo json_encode([
                    'success' => true,
                    'date' => $formattedDate,
                    'time' => $formattedTime,
                    'location' => $location,
                    'coach' => "$firstname $lastname", // Add coach's fullname
                    'sport' => $sportName // Add the sport name here
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'No coach details found.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'No training found for this coach.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No coach found.']);
    }

    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>