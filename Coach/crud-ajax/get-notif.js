$(document).ready(function () {
    // Function to load notifications
    window.loadNotifications = function() {
        $.ajax({
            url: "controller/get-notif.php", // The PHP file to fetch notifications
            method: "GET",
            dataType: "json",
            success: function (data) {
                const notificationContainer = $("#notificationContainer");
                notificationContainer.empty(); // Clear previous content
                if (data.length > 0) {
                    data.forEach(function (notification) {
                        const notificationItem = `
                            <div class="notif-post">
                                <p>${notification.message}</p>
                            </div>
                        `;
                        notificationContainer.append(notificationItem);
                    });
                } else {
                    notificationContainer.html("<p class='text-muted'>No notifications found.</p>");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error fetching notifications:", error);
            },
        });
    }

    // Initial load
    loadNotifications();
  
    // Reload notifications every 10 seconds
    setInterval(loadNotifications, 10000);
});