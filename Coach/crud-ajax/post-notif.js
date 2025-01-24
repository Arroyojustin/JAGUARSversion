$('#postButton').click(function() {
  var message = $('#notificationMessage').val();
  if (message) {
      // Send the message to the server via AJAX
      $.ajax({
          url: 'controller/post-notif.php',
          method: 'POST',
          data: { message: message },
          success: function(response) {
              // Clear input
              $('#notificationMessage').val('');

              // Dynamically load and display the latest notifications
              loadNotifications();
          },
          error: function() {
              console.log('An error occurred.');
          }
      });
  }
});