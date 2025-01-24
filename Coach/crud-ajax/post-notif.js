document.getElementById('postButton').addEventListener('click', function() {
    var message = document.getElementById('notificationMessage').value;
    if (message) {
      // Send the message to the server via AJAX
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'controller/post-notif.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // After successful post, show notification in the container
          var newNotification = document.createElement('div');
          newNotification.classList.add('alert', 'alert-info');
          newNotification.setAttribute('role', 'alert');
          newNotification.textContent = message;
          document.getElementById('notificationContainer').appendChild(newNotification);

          // Clear input
          document.getElementById('notificationMessage').value = '';
        }
      };
      xhr.send('message=' + encodeURIComponent(message));
    }
  });
