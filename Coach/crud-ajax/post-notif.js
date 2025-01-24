// document.getElementById('postButton').addEventListener('click', function() {
//     var message = document.getElementById('notificationMessage').value;
//     if (message) {
//       // Send the message to the server via AJAX
//       var xhr = new XMLHttpRequest();
//       xhr.open('POST', 'controller/post-notif.php', true);
//       xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//       xhr.onreadystatechange = function () {
//         if (xhr.readyState == 4 && xhr.status == 200) {
//           // After successful post, show notification in the container
//           var newNotification = document.createElement('div');
//           newNotification.classList.add('alert', 'alert-info');
//           newNotification.setAttribute('role', 'alert');
//           newNotification.textContent = message;
//           document.getElementById('notificationContainer').appendChild(newNotification);

//           // Clear input
//           document.getElementById('notificationMessage').value = '';
//         }
//       };
//       xhr.send('message=' + encodeURIComponent(message));
//     }
//   });

document.getElementById('postButton').addEventListener('click', function() {
    var message = document.getElementById('notificationMessage').value;
    if (message) {
      // Send the message to the server via AJAX
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'post-notif.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // After successful post, show notification in the container
          var newNotification = document.createElement('div');
          newNotification.classList.add('alert', 'alert-info');
          newNotification.setAttribute('role', 'alert');
          newNotification.textContent = message;

          // Create a delete button
          var deleteButton = document.createElement('button');
          deleteButton.classList.add('btn', 'btn-danger', 'ms-2');
          deleteButton.textContent = 'Delete';
          deleteButton.onclick = function() {
            deleteNotification(xhr.responseText); // Pass the ID to delete
            newNotification.remove();
          };

          // Append the delete button to the notification
          newNotification.appendChild(deleteButton);
          
          // Append the notification to the container
          document.getElementById('notificationContainer').appendChild(newNotification);

          // Clear input
          document.getElementById('notificationMessage').value = '';
        }
      };
      xhr.send('message=' + encodeURIComponent(message));
    }
  });

  // Function to handle deletion via AJAX
  function deleteNotification(notificationId) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'controller/post-delete-notif.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('id=' + notificationId);
  }

  hindi pa nagana yung delete