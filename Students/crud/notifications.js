// Function to fetch notifications and display them
function fetchNotifications() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "controller/notifications.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var notifications = JSON.parse(xhr.responseText);
            var notificationsContainer = document.querySelector('.studnotification-container');

            // Clear previous notifications
            notificationsContainer.innerHTML = '';

            // Display each notification
            notifications.forEach(function (message) {
                var notificationCard = document.createElement('div');
                notificationCard.classList.add('notification-card');

                var notificationText = document.createElement('span');
                notificationText.textContent = message;

                var closeButton = document.createElement('button');
                closeButton.textContent = 'Dismiss';
                closeButton.onclick = function () {
                    notificationCard.style.opacity = '0';
                    setTimeout(function () {
                        notificationCard.remove();
                    }, 300);
                };

                notificationCard.appendChild(notificationText);
                notificationCard.appendChild(closeButton);
                notificationsContainer.appendChild(notificationCard);
            });
        } else {
            console.error('Error fetching notifications');
        }
    };
    xhr.send();
}

window.onload = fetchNotifications;
