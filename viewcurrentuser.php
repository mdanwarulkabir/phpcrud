<?php
session_start();
require_once("includes/database.php");
if(isset($_SESSION['email'])){
  $result = $appdb->displayCurrentUserData($_SESSION['email']);  
}

  require("includes/myheader.php");
  
  // Delete record from table
  if(!empty($_SESSION)){
  if(!empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $utype=$appdb->getUserType($_SESSION['email']);
    if($utype=='admin'){
      $appdb->deleteUserRecord($deleteId);
  }else{
    exit('<h3 style="text-align:center">Only admin can delete user</h3>');
  }  
}  
  }
?>
    <main class="container">
      <section class="form-row row justify-content-center">
        <h1>User List</h1>
	    <div class="row">
		    <table class="table table-hover table-striped">
        <!-- table headings -->
        <tr>
        <th class="hidden-column">User ID</th>
          <th class='hidden-column'>ID</th>
          <th>User Email</th>
          <th>User Type</th>
          <th>Action</th>
        </tr>
        <!-- displaying records -->
        <?php
        if(!empty($result)){
          foreach($result as $key => $res){
            echo "<tr>";
            echo "<td class='hidden-column'>".$res['uid']."</td>";
            echo "<td>".$res['email']."</td>";
            echo "<td>".$res['type']."</td>";
            if($res['email']=='rootuser@root.com'){
              echo '<td>
                  <button class="btn btn-danger" disabled><a href="edituser.php?editId='.$res['uid'].'"><i class="fa fa-pencil text-white"></i></a></button>
                  <button class="btn btn-danger" disabled><a href="viewuser.php?deleteId='.$res['uid'].'" onclick="return confirm(\'Are you sure?\');">
                  <i class="fa fa-trash text-white"></i> </a></button>
                  <a href="adduser.php" style="float:right;"><button class="btn btn-success" disabled><i class="fas fa-plus"></i></button></a>
                  </td>';
            }else{
            echo '<td>
                  <button class="btn btn-danger" ><a href="edituser.php?editId='.$res['uid'].'"><i class="fa fa-pencil text-white"></i></a></button>
                  <button class="btn btn-danger"><a href="viewuser.php?deleteId='.$res['uid'].'" onclick="return confirm(\'Are you sure?\');">
                  <i class="fa fa-trash text-white"></i> </a></button>
                  <a href="adduser.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
                  </td>';
            }
            echo "</tr>";
          }
        }
        ?>
		</table>
	 </div>
   </div>
	</form>
       </div>
	</section>
    </main>
<?php require("includes/myfooter.php");?>
  </body>
</html>

