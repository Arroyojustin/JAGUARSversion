document.querySelector('.approve-card-title').addEventListener('click', function () {
    var userId = 1; // Replace with dynamic user ID if available
    var trainingId = 1; // Replace with dynamic training ID if available

    // AJAX request to fetch user and training details
    fetch('controller/fetch-training.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `user_id=${userId}&training_id=${trainingId}`,
    })
    .then((response) => response.json())
    .then((data) => {
        // Populate the modal with the retrieved data
        document.getElementById('trainingDate').value = data.Date;
        document.getElementById('trainingTime').value = data.Time;
        document.getElementById('trainingLocation').value = data.Location;
        document.querySelector('.modal-title').textContent = `${data.firstname} ${data.lastname}`;
    })
    .catch((error) => {
        console.error('Error fetching details:', error);
    });

    // Show the modal
    var modal = new bootstrap.Modal(document.getElementById('trainingApprovalModal'));
    modal.show();
});
