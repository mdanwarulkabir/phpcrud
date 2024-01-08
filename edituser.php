<?php
// Start the session
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['email'])) {
    // Display an error message and redirect to the login page
    //echo "<script>alert('You need to log in to access this page.');</script>";
    header("Location: signin.php");
    exit(); 
}

require_once("includes/database.php");
if(!empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    
    $utype=$appdb->getUserType($_SESSION['email']);
    if($utype=='admin'){
        $user = $appdb->displayUserById($editId);
  }else{
    exit('<h3 style="text-align:center">Only admin can edit user records</h3>');
  }  
  }
?>

<!--Including header-->
<?php require("includes\myheader.php");?>
<main class="container">
      <section class="form-row row justify-content-center">
        <form class="form-horizontal col-md-6 col-md-offset-3" method="post" action="user_edit.php" enctype="multipart/form-data">
          <h1>Edit User Entry</h1><br>
          <input type="hidden" id="uid" name="uid" value="<?php echo $editId; ?>">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required value="<?php echo $user['email']; ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" minlength="8" readonly value="<?php echo $user['password']; ?>">
            <div class="form-text">Enter a password longer than 8 characters</div>
          </div>
          <label for="usertype" class="form-label"><strong>User Type:</strong></label>
            <select id="usertype" name="usertype" class="form-select" required>
                <option value="Admin"
                <?php
                if($user['type']=="Admin"){
                    echo "selected='selected'";
                }
                ?>  
                >Admin</option>
                <option value="User"
                <?php
                if($user['type']=="User"){
                    echo "selected='selected'";
                }
                ?> 
                >User</option>
            </select><br>

            <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Update">
            <a href="viewuser.php"><button type="button" class="btn btn-secondary col-md-2 col-md-offset-10">Cancel</button></a>
	       </form>
</section>
            </main>
<!--Including footer-->
<?php require("includes\myfooter.php");?>
  </body>
</html>