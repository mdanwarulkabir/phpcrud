<?php

class database{
  private $servername = "bq9jiie2yajk6qbdh5fw-mysql.services.clever-cloud.com";//"srv200531498.mysql.database.azure.com";
  private $username   = "ubtoj2dpnrwa3pjp";//"admin200531498";
  private $password   = "xOKjIgCkdyGsEvCIpIo3";//"*Anwar@M#";
  private $database   = "bq9jiie2yajk6qbdh5fw";
  public  $con;

  // Database Connection
  public function __construct()
  {
    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
    if(mysqli_connect_error()) {
      die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
  }

  
  // Insert user into login table
  public function insertLogin($email, $password)
  {
    $query="INSERT INTO login(email,password) VALUES('$email','$password')";
    $sql = $this->con->query($query);
    if ($sql==true) {
      return 1;
    }else{
      return 0;
    }
  }

  
  // Insert user into login table by admin user
  public function insertLoginByAdmin($email, $password,$usertype)
  {
    $query="INSERT INTO login(email,password,type) VALUES('$email','$password','$usertype')";
    $sql = $this->con->query($query);
    if ($sql==true) {
      return 1;
    }else{
      return 0;
    }
  }
// Insert grament data into clothes table
public function insertGarment($gender, $clothes_type, $size, $color, $features_str, $price, $description,$add_by,$sdate,$filename,$destination)
{
  $query="INSERT INTO clothes(gender, clothes_type, size, color, feature, price, description,add_by,sdate,img_name,img_name_path) VALUES('$gender', '$clothes_type', '$size', '$color', '$features_str', '$price', '$description', '$add_by','$sdate','$filename','$destination')";
  $sql = $this->con->query($query);
  if ($sql==true) {
    return 1;
  }else{
    return 0;
  }
}


// Update grament data into clothes table
public function updateGarment($id,$gender, $clothes_type, $size, $color, $features_str, $price, $description,$add_by,$sdate,$filename,$destination)
{
  $query="UPDATE clothes set gender='$gender', clothes_type='$clothes_type', size='$size', color='$color', feature='$features_str', price='$price', description='$description',add_by='$add_by',sdate='$sdate',img_name='$filename',img_name_path='$destination' where id='$id'";
  $sql = $this->con->query($query);
  if ($sql==true) {
    return 1;
  }else{
    return 0;
  }
}

// Update grament data into clothes table
public function updateUser($id,$usertype)
{
  $query="UPDATE login set type='$usertype' where uid='$id'";
  $sql = $this->con->query($query);
  if ($sql==true) {
    return 1;
  }else{
    return 0;
  }
}


  // validate user
  public function isUserValid($email, $password)
  {
    $query="SELECT uid FROM login WHERE email = '$email' AND password = '$password'";
    $sql = $this->con->query($query);
    $count = $sql->num_rows;

    if ($count==1) {
      return 1;
    }else{
      return 0;
    }
  }

   // checking of existing user
   public function isUserExist($email)
   {
     $query="SELECT uid FROM login WHERE email = '$email'";
     $sql = $this->con->query($query);
     $count = $sql->num_rows;
 
     if ($count==1) {
       return 1;
     }else{
       return 0;
     }
   }

  // Fetch garment records for show listing
  public function displayGarmentData()
  {
    $query = "SELECT * FROM clothes";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }
  }

  // Fetch garment records for show listing
  public function displayUserData()
  {
    $query = "SELECT * FROM login";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }else{
      echo "No found records";
    }
  }

  // Fetch single data for edit from clothes table
  public function displayRecordById($id)
  {
    $query = "SELECT * FROM clothes WHERE id = '$id'";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }
  }

  // Fetch single data for edit from login table
  public function displayUserById($id)
  {
    $query = "SELECT * FROM login WHERE uid = '$id'";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }
  }

    // Fetch usertype from login table
    public function getUserType($email)
    {
      $query = "SELECT type FROM login WHERE email = '$email'";
      $result = $this->con->query($query);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['type'];
      }
    }

    
    // Fetch usertype from login table
    public function getAddby($id)
    {
      $query = "SELECT add_by FROM clothes WHERE id = '$id'";
      $result = $this->con->query($query);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['add_by'];
      }
    }
  
  // Delete garment data from clothes table
  public function deleteRecord($id)
  {
    $query = "DELETE FROM clothes WHERE id = '$id'";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:view.php?msg3=delete");
    }else{
      echo "Record dletion filed, try again";
    }
  }
  // Delete user data from login table
  public function deleteUserRecord($id)
  {
    $query = "DELETE FROM login WHERE uid = '$id'";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:viewuser.php?msg3=delete");
    }else{
      echo "Record dletion filed, try again";
    }
  }
  
}
$appdb = new database();
?>
