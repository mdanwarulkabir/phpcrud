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
    $garment = $appdb->displayRecordById($editId);
    $feature=explode(",",$garment['feature']);
    $addby=$appdb->getAddby($editId);
    if($_SESSION['email']!=$addby){
        exit('<h3 style="text-align:center">You can edit only your entry</h3>');
    }
  }
?>

<!--Including header-->
<?php require("includes\myheader.php");?>
    
      <section class="form-row row justify-content-center">
        <form class="form-horizontal col-md-6 col-md-offset-3" method="post" action="garment_edit.php" enctype="multipart/form-data">
          <h1>Edit Garment Entry</h1><br>
          <div class="mb-3">
            <label for="gender" class="form-label"><strong>Gender:</strong></label>
            <select id="gender" name="gender" class="form-select">
                <option value="men"
                <?php
                if($garment['gender']=="men"){
                    echo "selected='selected'";
                }
                ?>  
                >Men</option>
                <option value="women"
                <?php
                if($garment['gender']=="women"){
                    echo "selected='selected'";
                }
                ?>  
                >Women</option>
                <option value="boys"
                <?php
                if($garment['gender']=="boys"){
                    echo "selected='selected'";
                }
                ?>  
                >Boys</option>
                <option value="girls"
                <?php
                if($garment['gender']=="girls"){
                    echo "selected='selected'";
                }
                ?>  
                >Girls</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="clothes_type" class="form-label"><strong>Type of Clothes:</strong></label>
            <select id="clothes_type" name="clothes_type" class="form-select"  >
                <option value="Trousers"
                <?php
                if($garment['clothes_type']=="Trousers"){
                    echo "selected='selected'";
                }
                ?>  
                >Trousers</option>
                <option value="T-shirt"
                <?php
                if($garment['clothes_type']=="T-shirt"){
                    echo "selected='selected'";
                }
                ?>  
                >T-shirt</option>
                <option value="Jacket"
                <?php
                if($garment['clothes_type']=="Jacket"){
                    echo "selected='selected'";
                }
                ?>  
                >Jacket</option>
                <option value="Sweater"
                <?php
                if($garment['clothes_type']=="Sweater"){
                    echo "selected='selected'";
                }
                ?>  
                >Sweater</option>
                <option value="Shorts"
                <?php
                if($garment['clothes_type']=="Shorts"){
                    echo "selected='selected'";
                }
                ?>  
                >Shorts</option>
                <option value="Skirt"
                <?php
                if($garment['clothes_type']=="Skirt"){
                    echo "selected='selected'";
                }
                ?>  
                >Skirt</option>
                <option value="Shirt"
                <?php
                if($garment['clothes_type']=="Shirt"){
                    echo "selected='selected'";
                }
                ?>  
                >Shirt</option>
                <option value="Blouse"
                <?php
                if($garment['clothes_type']=="Blouse"){
                    echo "selected='selected'";
                }
                ?>  
                >Blouse</option>
                <option value="Leggings"
                <?php
                if($garment['clothes_type']=="Leggings"){
                    echo "selected='selected'";
                }
                ?>  
                >Leggings</option>
                <option value="Polo shirt"
                <?php
                if($garment['clothes_type']=="Polo shirt"){
                    echo "selected='selected'";
                }
                ?> 
                >Polo shirt</option>
                <option value="Cardigan"
                <?php
                if($garment['clothes_type']=="Cardigan"){
                    echo "selected='selected'";
                }
                ?>
                >Cardigan</option>
                <option value="Swimsuit"
                <?php
                if($garment['clothes_type']=="Swimsuit"){
                    echo "selected='selected'";
                }
                ?> 
                >Swimsuit</option>
            </select><br>
        
            <div class="mb-3">
            <label class="form-label"><strong>Size:</strong></label>
            <div class="form-check form-check-inline">
                <input type="radio" id="small" name="size" value="small" class="form-check-input" required
                <?php
                if($garment['size']=="small"){
                    echo "checked";
                }
                ?>                
                >
                <label for="small" class="form-check-label">Small</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="medium" name="size" value="medium" class="form-check-input" required
                <?php
                if($garment['size']=="medium"){
                    echo "checked";
                }
                ?>  
                >
                <label for="medium" class="form-check-label">Medium</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="large" name="size" value="large" class="form-check-input" required
                <?php
                if($garment['size']=="large"){
                    echo "checked";
                }
                ?>  
                >
                <label for="large" class="form-check-label">Large</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="extra_large" name="size" value="extra_large" class="form-check-input" required
                <?php
                if($garment['size']=="extra_large"){
                    echo "checked";
                }
                ?>  
                >
                <label for="extra_large" class="form-check-label">Extra Large</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="color" class="form-label"><strong>Color:</strong></label>
            <input type="text" id="color" name="color" value="<?php echo $garment['color']; ?>" class="form-control" placeholder="e.g., Red, Blue, Green">
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Features:</strong></label>
            <div class="form-check form-check-inline">
                <input type="checkbox" id="long_sleeves" name="features[]" value="Long Sleeves" class="form-check-input"
                <?php
                if(in_array("Long Sleeves",$feature)){
                    echo "checked";
                }
                ?>
                >
                <label for="long_sleeves" class="form-check-label">Long Sleeves</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" id="short_sleeves" name="features[]" value="Short Sleeves" class="form-check-input"
                <?php
                if(in_array("Short Sleeves",$feature)){
                    echo "checked";
                }
                ?>
                >
                <label for="short_sleeves" class="form-check-label">Short Sleeves</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" id="hooded" name="features[]" value="Hooded" class="form-check-input"
                <?php
                if(in_array("Hooded",$feature)){
                    echo "checked";
                }
                ?>
                >
                <label for="hooded" class="form-check-label">Hooded</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label"><strong>Price:</strong></label>
            <input type="number" id="price" name="price" value="<?php echo $garment['price']; ?>" class="form-control" placeholder="Enter the price" step="0.50" min="0">
        </div>
        <label class="form-label" for="customFile"><strong>Garment Image:</strong></label>
        <input type="file" name="garment_image">
        <input type="hidden" name="garment_image_old" value="<?php echo $garment['img_name']; ?>" >
        <input type="hidden" name="garment_image_path_old" value="<?php echo $garment['img_name_path']; ?>" >
        <input type="hidden" name="id" value="<?php echo $editId; ?>" >
        
        <div><br>
            <label for="stockdate"><strong>Stock Date:</strong></label>
            <input type="date" id="stockdate" name="stockdate" value="<?php echo $garment['sdate']; ?>" max="now()">
        </div><br>

        <div class="mb-3">
            <label for="description" class="form-label"><strong>Description:</strong></label>
            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter a description" ><?php echo $garment['description'];?></textarea>
        </div>

            <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Update">
            <a href="view.php"><button type="button" class="btn btn-secondary col-md-2 col-md-offset-10">Cancel</button></a>
	       </form>
</section>

<!--Including footer-->
<?php require("includes\myfooter.php");?>
  </body>
</html>