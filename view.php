<?php
session_start();
require_once("includes/database.php");
$result = $appdb->displayGarmentData();
  
  require("includes/myheader.php");
  
  // Delete record from table
  if(!empty($_SESSION)){
  if(!empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $utype=$appdb->getUserType($_SESSION['email']);
    if($utype=='admin'){
      $appdb->deleteRecord($deleteId);
  }else{
    exit('<h3 style="text-align:center">Only admin can delete records</h3>');
  }  
}  
  }
?>
    <main class="container">
      <section class="form-row row justify-content-center">
        <h1>Garment List</h1>
	    <div class="row">
		    <table class="table table-hover table-striped">
        <!-- table headings -->
        <tr>
          <th>ID</th>
          <th>Gender</th>
          <th>Clothes Type</th>
          <th>Size</th>
          <th>Color</th>
          <th>Description</th>
          <th>Price</th>
          <th>Features</th>
          <th>Add By</th>
          <th>Stock Date</th>
          <th>Image</th>
          <th class="hidden-column">Image Name</th>
          <th class="hidden-column">Image Destination</th>
          <th style="width: 150px;">Action</th>
        </tr>
        <!-- displaying records -->
        <?php
        if(!empty($result)){
          foreach($result as $key => $res){
            echo "<tr>";
            echo "<td>".$res['id']."</td>";
            echo "<td>".$res['gender']."</td>";
            echo "<td>".$res['clothes_type']."</td>";
            echo "<td>".$res['size']."</td>";
            echo "<td>".$res['color']."</td>";
            echo "<td>".$res['description']."</td>";
            echo "<td>".$res['price']."</td>";
            echo "<td>".$res['feature']."</td>";
            echo "<td>".$res['add_by']."</td>";
            echo "<td>".$res['sdate']."</td>";
            echo "<td><a href=". $res['img_name_path']."><img src='" . $res['img_name_path'] . "' alt='Garment Image' style='max-width: 50px; max-height: 50px;'></a></td>";
            echo '<td class="hidden-column">' . $res['img_name'] . '</td>';
            echo '<td class="hidden-column">' . $res['img_name_path'] . '</td>';
            echo '<td>
                  <button class="btn btn-danger"><a href="edit.php?editId='.$res['id'].'"><i class="fa fa-pencil text-white"></i></a></button>
                  <button class="btn btn-danger"><a href="view.php?deleteId='.$res['id'].'" onclick="return confirm(\'Are you sure?\'); return false;">
                  <i class="fa fa-trash text-white"></i> </a></button>
                  <a href="add.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
                  </td>';
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

