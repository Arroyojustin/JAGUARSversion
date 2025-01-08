document.addEventListener('DOMContentLoaded', function () {
    const positionList = [];
    const positionListElement = document.getElementById('positionList');
    const positionInput = document.getElementById('position_input');
    const addPositionBtn = document.getElementById('addPositionBtn');
    const sportsContainer = document.getElementById('sportsContainer');
    const rolesContainer = document.getElementById('rolesContainer');

    // Add Position Logic
    addPositionBtn.addEventListener('click', function () {
        const position = positionInput.value.trim();
        if (position && !positionList.includes(position)) {
            positionList.push(position);

            const li = document.createElement('li');
            li.className = 'list-group-item d-flex justify-content-between align-items-center';
            li.textContent = position;

            const removeBtn = document.createElement('button');
            removeBtn.className = 'btn btn-sm btn-danger';
            removeBtn.textContent = 'Remove';
            removeBtn.addEventListener('click', function () {
                positionList.splice(positionList.indexOf(position), 1);
                li.remove();
            });

            li.appendChild(removeBtn);
            positionListElement.appendChild(li);
            positionInput.value = '';
        }
    });

    // Add Sport Form Submission
    document.getElementById('addSportForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const sportName = document.getElementById('sport_name').value.trim();

        if (sportName) {
            fetch('controller/add-sportss.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({
                    sport_name: sportName,
                    positions: positionList.join(', ')
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Sports Added',
                        timer: 2000,
                        background: '#ab9f6ca',
                        iconColor: '#a2e7d32',
                        color: '#a155724',
                        showConfirmButton: false
                    }).then(() => {
                        
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: `Error: ${data.message}`,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'Error!',
                    text: `Error adding sport: ${error.message}`,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        }
    });

    // Handle Click on Sports Buttons
    sportsContainer.addEventListener('click', function (e) {
        if (e.target.classList.contains('sport-button')) {
            const sportId = e.target.getAttribute('data-id');
            fetch(`controller/get-positions.php?id=${sportId}`)
                .then(response => response.json())
                .then(data => {
                    rolesContainer.innerHTML = '';
                    if (data.positions && data.positions.length > 0) {
                        data.positions.forEach(position => {
                            const roleButton = document.createElement('button');
                            roleButton.className = 'btn btn-outline-secondary mb-2';
                            roleButton.textContent = position;
                            rolesContainer.appendChild(roleButton);
                        });
                    } else {
                        rolesContainer.innerHTML = '<p>No roles available for this sport.</p>';
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: `Error fetching positions: ${error.message}`,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
        }
    });
});
