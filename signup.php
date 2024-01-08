<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Sign Up</title>
</head>
<body>

<!-- Sign Up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="signup_process.php" method="post">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" minlength="8" required>
            <div class="form-text">Enter a password longer than 8 characters</div>
          </div>
          <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" minlength="8" required>
            
          </div>
          <button type="submit" class="btn btn-primary">Create My Account</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS and Popper.js (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script to navigate to the home page when the modal is dismissed -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var signupModal = new bootstrap.Modal(document.getElementById('signupModal'));

    // Event listener for modal dismissal
    signupModal._element.addEventListener('hidden.bs.modal', function () {
      window.location.href = 'index.php';
    });

    // Show the modal
    signupModal.show();
  });
</script>
<?php
$conn=mysqli_connect("localhost","root","","mydb");
?>
</body>
</html>
