<?php
// Start the session
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['email'])) {
    // Display an error message and redirect to the login page
    echo "<script>alert('You need to log in to access this page.');</script>";
    header("Location: signin.php");
    exit(); 
}
//Including header
require("includes\myheader.php");
?>
      <section class="form-row row justify-content-center">
        <form class="form-horizontal col-md-6 col-md-offset-3" method="post" action="garment_entry.php" enctype="multipart/form-data">
          <h1>Garment Entry</h1><br>
          <div class="mb-3">
            <label for="gender" class="form-label"><strong>Gender:</strong></label>
            <select id="gender" name="gender" class="form-select" required>
                <option value="men">Men</option>
                <option value="women">Women</option>
                <option value="boys">Boys</option>
                <option value="girls">Girls</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="clothes_type" class="form-label"><strong>Type of Clothes:</strong></label>
            <select id="clothes_type" name="clothes_type" class="form-select" required>
                <option value="Trousers">Trousers</option>
                <option value="T-shirt">T-shirt</option>
                <option value="Jacket">Jacket</option>
                <option value="Sweater">Sweater</option>
                <option value="Shorts">Shorts</option>
                <option value="Skirt">Skirt</option>
                <option value="Shirt">Shirt</option>
                <option value="Blouse">Blouse</option>
                <option value="Leggings">Leggings</option>
                <option value="Polo shirt">Polo shirt</option>
                <option value="Cardigan">Cardigan</option>
                <option value="Swimsuit">Swimsuit</option>
            </select><br>
        
            <div class="mb-3">
            <label class="form-label"><strong>Size:</strong></label>
            <div class="form-check form-check-inline">
                <input type="radio" id="small" name="size" value="small" class="form-check-input" required>
                <label for="small" class="form-check-label">Small</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="medium" name="size" value="medium" class="form-check-input" required>
                <label for="medium" class="form-check-label">Medium</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="large" name="size" value="large" class="form-check-input" required>
                <label for="large" class="form-check-label">Large</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="extra_large" name="size" value="extra_large" class="form-check-input" required>
                <label for="extra_large" class="form-check-label">Extra Large</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="color" class="form-label"><strong>Color:</strong></label>
            <input type="text" id="color" name="color" class="form-control" placeholder="e.g., Red, Blue, Green">
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Features:</strong></label>
            <div class="form-check form-check-inline">
                <input type="checkbox" id="long_sleeves" name="features[]" value="Long Sleeves" class="form-check-input">
                <label for="long_sleeves" class="form-check-label">Long Sleeves</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" id="short_sleeves" name="features[]" value="Short Sleeves" class="form-check-input">
                <label for="short_sleeves" class="form-check-label">Short Sleeves</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" id="hooded" name="features[]" value="Hooded" class="form-check-input">
                <label for="hooded" class="form-check-label">Hooded</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label"><strong>Price:</strong></label>
            <input type="number" id="price" name="price" class="form-control" placeholder="Enter the price" step="0.50" min="0" required>
        </div>
        <label class="form-label" for="customFile"><strong>Garment Image:</strong></label>
        <input type="file" name="garment_image" required>
        

        <div><br>
            <label for="stockdate"><strong>Stock Date:</strong></label>
            <input type="date" id="stockdate" name="stockdate" max="now()">
        </div><br>

        <div class="mb-3">
            <label for="description" class="form-label"><strong>Description:</strong></label>
            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter a description"></textarea>
        </div>

            <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Submit">
            <input type="reset" class="btn btn-dark reset"  value="Clear">
            <a href="index.php"><button type="button" class="btn btn-secondary col-md-2 col-md-offset-10">Cancel</button></a>
	       </form>
</section>

<!--Including footer-->
<?php require("includes\myfooter.php");?>
  </body>
</html>