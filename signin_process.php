<?php
session_start();
require_once("includes/database.php");
//Including header
require("includes/myheader.php");
echo '<main class="container">';
	//store the user inputs in variables and hash the password
	$email = $_POST['email'];
	$usertype=$appdb->getUserType($email);
	$password = hash('sha512', $_POST['password']);

	//calling validate function
	$stts=0;
	$stts=$appdb->isUserValid($email,$password);
	if($stts==1){
		echo '<section class="success-row">';
			echo '<div>';
			
			$_SESSION['email'] = $email;
			$_SESSION['type'] = $usertype;
			
			echo '<h3 style="text-align:center">Sign in successfull!</h3>';
			echo '<h6 style="text-align:center">Now you can start entering your products</h6>';
			echo '<h6 style="text-align:center"><a href="add.php">Garment Entry</a></h6>';
			echo '<h6 style="text-align:center"><a href="view.php">Garment List</a></h6>';
            
			echo '</div>';
			echo '</section>';
			
		}else{
		echo '<p style="text-align:center">Icorrect email or password!</p>';
		echo '<p style="text-align:center"><a href="signin.php">Try again</a></p>';
		}
	$conn = null;
echo '</main>';
//Including footer
require_once("includes/myfooter.php");
header("refresh: 0; url=index.php");
?>
