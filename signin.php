<?php
session_start();

// // Check for the alert parameter in the URL
// $alert = isset($_GET['alert']) ? $_GET['alert'] : 'not_logged_in';

// // Display an alert message based on the parameter
// if ($alert === 'not_logged_in') {
//     echo '<script>alert("You need to log in to access this page.");</script>';
    
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Login</title>
</head>
<body>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="signin_process.php" method="post">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS and Popper.js (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script to navigate to the home page when the login modal is dismissed -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));

    // Event listener for modal dismissal
    loginModal._element.addEventListener('hidden.bs.modal', function () {
      window.location.href = 'index.php';
    });

    // Show the modal
    loginModal.show();
  });
  </script>

</body>
</html>
