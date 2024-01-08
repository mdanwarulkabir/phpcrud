<?php
// Start the session
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['email'])) {
    // Display an error message and redirect to the login page
    echo "<script>alert('You need to log in to access this page.');</script>";
    header("Location: signin.php");
    exit(); 
}
    require_once("includes/database.php");
    $utype=$appdb->getUserType($_SESSION['email']);

    if($utype!='admin'){
        exit('<h3 style="text-align:center">Only admin can add user</h3>');
  }

//Including header
require("includes\myheader.php");
?>
<main class="container">
      <section class="form-row row justify-content-center">
        <form class="form-horizontal col-md-6 col-md-offset-3" method="post" action="useradded.php">
          <h1>User Entry</h1><br>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" minlength="8" required>
            <div class="form-text">Enter a password longer than 8 characters</div>
          </div>
          <label for="usertype" class="form-label"><strong>User Type:</strong></label>
            <select id="usertype" name="usertype" class="form-select" required>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select><br>
            <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Submit">
            <input type="reset" class="btn btn-dark reset"  value="Clear">
            <a href="index.php"><button type="button" class="btn btn-secondary col-md-2 col-md-offset-10">Cancel</button></a>
	       </form>
</section>
</main>
<!--Including footer-->
<?php require("includes\myfooter.php");?>
  </body>
</html>