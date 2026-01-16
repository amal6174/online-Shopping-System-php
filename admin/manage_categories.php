<?php
require('top.inc.php');


$category_name = ''; // Avoids undefined variable warning

// if(isset($_POST['submit'])){
//    $categories=get_safe_value($con,$_POST['categories']);
//    $sql="INSERT INTO categories(category_name,status) VALUES('$categories','1')";
//    mysqli_query($con,$sql);
//  header('location:categories.php');
//  die();
// }

// if(isset($_GET['categories_id']) && $_GET['categories_id']!=''){
//    $id=get_safe_value($con,$_GET['categories_id']);
//    $edit="SELECT * FROM categories WHERE categories_id=$id";
//    $res=mysqli_query($con,$edit);
//    $row=mysqli_fetch_assoc($res);
//    $categories=$row['category_name'];



// }

if (isset($_GET['categories_id']) && $_GET['categories_id'] != '') {
    $id = get_safe_value($con, $_GET['categories_id']);
    $edit = "SELECT * FROM categories WHERE categories_id = '$id'";
    $res = mysqli_query($con, $edit);
    
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $category_name = $row['category_name']; // ✅ this is the variable you're missing
    }
}


// ✅ Handle Add or Update
if (isset($_POST['submit'])) {
    $categories = get_safe_value($con, $_POST['categories']);

    if (isset($_GET['categories_id']) && $_GET['categories_id'] != '') {
        // ✳️ Update existing category
        $id = get_safe_value($con, $_GET['categories_id']);
        $sql = "UPDATE categories SET category_name='$categories' WHERE categories_id='$id'";
    } else {
        // ✳️ Insert new category
        $sql = "INSERT INTO categories(category_name,status) VALUES('$categories','1')";
    }

    mysqli_query($con, $sql);
    header('location:categories.php');
    die();
}







?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                        <form method="post">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Categories</label>
									<input type="text" name="categories" placeholder="Enter categories name" class="form-control" required value="<?php echo $category_name ?>">
								</div>
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>