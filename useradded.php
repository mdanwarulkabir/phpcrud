
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
		$password = hash('sha512', $password);
		$usertype=$_POST['usertype'];

		$stts=0;
		$stts=$appdb->insertLoginByAdmin($email,$password,$usertype);
		if($stts==1){
		echo '<section class="success-row">';
			echo '<div>';
			echo '<h3 style="text-align:center">User entry completed successfully!</h3>';
			echo '<h6 style="text-align:center"><a href="signin.php">Sign in</a></h6>';
			echo '</div>';
			echo '</section>';
			
		}else{
		echo '<p>User entry failed, try again!</p>';
		}
	}
			
		
	echo '</main>';
	//Including footer
  	require_once("includes/myfooter.php");
	?>
