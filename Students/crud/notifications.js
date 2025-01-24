// Function to fetch notifications and display them
function fetchNotifications() {
    // Send an AJAX request to the PHP script
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "controller/notifications.php", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Parse the JSON response
            var notifications = JSON.parse(xhr.responseText);
            var notificationsContainer = document.querySelector('.studnotification-container');

            // Clear previous notifications
            notificationsContainer.innerHTML = '';

            // Display each notification in its own container
            notifications.forEach(function(message) {
                // Create a container for each notification
                var notificationWrapper = document.createElement('div');
                notificationWrapper.classList.add('notification-wrapper');
                notificationWrapper.style.marginBottom = '10px';  // Optional spacing between notifications
                
                // Create the alert box for the notification
                var notificationDiv = document.createElement('div');
                notificationDiv.classList.add('sudalert', 'alert-info');
                notificationDiv.setAttribute('role', 'alert');
                notificationDiv.textContent = message;

                // Append the notification div to the wrapper
                notificationWrapper.appendChild(notificationDiv);

                // Append the wrapper to the notifications container
                notificationsContainer.appendChild(notificationWrapper);
            });
        } else {
            console.error('Error fetching notifications');
        }
    };
    xhr.send();
}

// Call the function when the page is loaded
window.onload = fetchNotifications;