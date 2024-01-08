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
        $gender = $_POST['gender'];
        $clothes_type = $_POST['clothes_type'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        if(isset($_POST['features'])){
          $features = $_POST['features'];
          $features_str=implode(",",$features);
        }else{
          $features_str=null;
        }
        $price = $_POST['price'];
        $description = $_POST['description'];
        $sdate=$_POST['stockdate'];
               
        $add_by=$_SESSION['email'];
        if(empty($_POST['garment_image'])){
          $filename = $_POST['garment_image_old'];
        }else{
          $filename = $_POST['garment_image'];
        }
  
        $destination = './uploads/'. $filename;
        $id=$_POST['id'];
        }
      
        if (!empty($_POST['garment_image'])) {
      if ($_FILES["garment_image"]["error"] !== UPLOAD_ERR_OK) {
      
          switch ($_FILES["garment_image"]["error"]) {
              case UPLOAD_ERR_PARTIAL:
                  exit('File only partially uploaded');
                  break;
              //case UPLOAD_ERR_NO_FILE:
                //  exit('No file was uploaded');
                  //break;
              case UPLOAD_ERR_EXTENSION:
                  exit('File upload stopped by a PHP extension');
                  break;
              case UPLOAD_ERR_FORM_SIZE:
                  exit('File exceeds MAX_FILE_SIZE in the HTML form');
                  break;
              case UPLOAD_ERR_INI_SIZE:
                  exit('File exceeds upload_max_filesize in php.ini');
                  break;
              case UPLOAD_ERR_NO_TMP_DIR:
                  exit('Temporary folder not found');
                  break;
              case UPLOAD_ERR_CANT_WRITE:
                  exit('Failed to write file');
                  break;
              default:
              echo '<h6 style="text-align:center"><a href="view.php">View Garment List</a></h6>';
                  exit('unknown upload error');
                  break;
          }
      }
      
      // Reject uploaded file larger than 1MB
      if ($_FILES["garment_image"]["size"] > 2097152) {
          exit('File too large (max 2MB)');
      }
      
      // Use fileinfo to get the mime type
      $finfo = new finfo(FILEINFO_MIME_TYPE);
      $mime_type = $finfo->file($_FILES["garment_image"]["tmp_name"]);
      
      $mime_types = ["image/gif", "image/png", "image/jpeg"];
              
      if ( ! in_array($_FILES["garment_image"]["type"], $mime_types)) {
          exit("Invalid file type");
      }
      
      // Replace any characters not \w- in the original filename
      $pathinfo = pathinfo($_FILES["garment_image"]["name"]); 
      
      $base = $pathinfo["filename"];
      
      $base = preg_replace("/[^\w-]/", "_", $base);
      
      $filename = $base . "." . $pathinfo["extension"];
      
      //$destination = __DIR__ . "/uploads/" . $filename;
      $destination = './uploads/'. $filename;
      
      
      // Add a numeric suffix if the file already exists
      $i = 1;
      
      while (file_exists($destination)) {
      
          $filename = $base . "($i)." . $pathinfo["extension"];
          $destination =  "./uploads/" . $filename;
      
          $i++;
      }
      
      if ( ! move_uploaded_file($_FILES["garment_image"]["tmp_name"], $destination)) {
      
          exit("Can't move uploaded file");
      
      }
    }
   
		  // create validate objects
      $valid = new validate();
      // Taking all values from the input form
      $msg = $valid->checkEmpty($_POST, array('size', 'color', 'price'));
    
      //Checking validity of the fields
      // Handling empty fields
        if($msg != null){
          echo $msg;
          //link to the previous page
          echo "<a href='javascript:self.history.back();'>Go Back</a>";
        }
        else{
        // if all the fields are valid
			// Calling database method
		$stts=0;
		$stts=$appdb->updateGarment($id,$gender, $clothes_type, $size, $color, $features_str, $price, $description,$add_by,$sdate,$filename,$destination);
		if($stts==1){
		echo '<section class="success-row">';
			echo '<div>';
			echo '<h3 style="text-align:center">Garment Update Successful!</h3>';
			echo '<h6 style="text-align:center"><a href="view.php">View Garment List</a></h6>';
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