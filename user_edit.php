<?php
    session_start();
	 //Including header
	 require_once("includes/myheader.php");
	 echo '<main class="container">';
		// connection
		//require './includes/database.php'; this is also ok.
    require_once("includes/database.php");
    require_once("includes/validate.php");
		// variables
			// variables
      if(!empty($_POST)) {
        $uid=$_POST['uid'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $usertype = $_POST['usertype'];
        
        $stts=0;
        $stts=$appdb->updateUser($uid, $usertype);
        if($stts==1){
        echo '<section class="success-row">';
          echo '<div>';
          echo '<h3 style="text-align:center">User type edit Successful!</h3>';
          echo '<h6 style="text-align:center"><a href="viewuser.php">View User List</a></h6>';
          echo '</div>';
          echo '</section>';
          
        }else{
        echo '<p>Garment update failed, try again!</p>';
        }
		}
	echo '</main>';
	//Including footer
  	require_once("includes/myfooter.php");
	?>