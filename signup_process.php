
<?php
	 //Including header
	 require_once("includes/myheader.php");
	 echo '<main class="container">';
		// connection
		//require './includes/database.php';
		require_once("includes/database.php");
		// variables
		if(!empty($_POST)){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];
		}
		// validate inputs
		$ok = true;
		
			if (empty($email)) {
				echo '<p>email required</p>';
				$ok = false;
			}
			if (empty($password)) {
				echo '<p>password required</p>';
				$ok = false;
			}
			if (empty($confirm_password)) {
				echo '<p>confirm_password required</p>';
				$ok = false;
			}
			
		if ($password===$confirm_password) {
				$ok=TRUE;
			}else{
				echo '<h3 style="text-align:center">Confirm password do not match!</h3>';
				echo '<h6 style="text-align:center"><a href="signup.php">Try again</a></h6>';
				$ok = false;
			}
			if ($appdb->isUserExist($email)===1) {
				echo '<h3 style="text-align:center">User already exist!</h3>';
				echo '<h6 style="text-align:center"><a href="signin.php">Sign in</a></h6>';
				$ok = false;
			}
		// decide if we are saving or not
		if ($ok){
			$password = hash('sha512', $password);
			// Calling database method
		$stts=0;
		$stts=$appdb->insertLogin($email,$password);
		if($stts==1){
		echo '<section class="success-row">';
			echo '<div>';
			echo '<h3 style="text-align:center">Sign up completed successfully!</h3>';
			echo '<h6 style="text-align:center"><a href="signin.php">Sign in</a></h6>';
			echo '</div>';
			echo '</section>';
			
		}else{
		echo '<p>Sign up failed, try again!</p>';
		}
		}
	echo '</main>';
	//Including footer
  	require_once("includes/myfooter.php");
	?>
