 <?php
require('top.inc.php');
// $categories_id='';
// $name='';
// $mrp='';
// $price='';
// $qty='';

// $image='';
// $short_desc	='';
// $description	='';
// $meta_title	='';
// $meta_description	='';
// $meta_keyword='';

$msg='';
$image_required='required';


if(isset($_POST['submit'])){
	$categories_id = get_safe_value($con,$_POST['categories_id']);
	$brand_id = get_safe_value($con,$_POST['brand_id']);
    $product_name = get_safe_value($con,$_POST['name']);
	
	

	$mrp = get_safe_value($con,$_POST['mrp']);
	$price = get_safe_value($con,$_POST['price']);
	$qty = get_safe_value($con,$_POST['qty']);


	$short_desc = get_safe_value($con,$_POST['short_desc']);
	$description = get_safe_value($con,$_POST['description']);
	$meta_title = get_safe_value($con,$_POST['meta_title']);
	$meta_desc = get_safe_value($con,$_POST['meta_desc']);	
	$meta_keyword = get_safe_value($con,$_POST['meta_keyword']);



$cat_res = mysqli_query($con,"SELECT category_name FROM categories WHERE categories_id='$categories_id'");
$cat_row = mysqli_fetch_assoc($cat_res);
$category_name = $cat_row['category_name'];

   $brand_check = mysqli_query($con, "SELECT id, brand_name FROM brands WHERE id='$brand_id'");
    if (mysqli_num_rows($brand_check) == 0) {
    die("Invalid brand selected");
}
   $brand_row = mysqli_fetch_assoc($brand_check);
   $brand_name = $brand_row['brand_name'];



  mysqli_query($con,"INSERT INTO products(categories_id,brand_id,p_name,category_name,brand_name,mrp,p_price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status)VALUES
  ('$categories_id','$brand_id','$product_name','$category_name','$brand_name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1)");






	// $res = mysqli_query($con,"SELECT * FROM products WHERE p_name='$product_name'");
	// $check = mysqli_num_rows($res);

	// if($check > 0){
	// 	if(isset($_GET['id']) && $_GET['id']!= '' ){
	// 		$getData = mysqli_fetch_assoc($res);
	// 		if($id==$getData['id']){


	// 		}else{
	// 			$msg="Product already exist";
	// 		}
	// 	}else{
	// 		$msg="Product already exist";
	// 	}

	// }


	// if($msg == ''){
	// 	if(isset($_GET['id']) && $_GET['id']!=''){
    //     //   mysqli_query($con,"UPDATE products SET categories_id='$categories_id',p_name='$product_name',mrp='$mrp',
	// 	//               price='$price',qty='$qty',short_desc='$short_desc',");

	// 	}else{
	// 		mysqli_query($con,"INSERT INTO products(categories_id,p_name,mrp,p_price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status)
	// 		VALUES('$categories_id','$product_name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1)");

	// 	}







		header("location:product.php");
	// }





}


 












?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">

									<label for="categories" class=" form-control-label">Categories</label>
									<select class="form-control" name="categories_id">
										 <option value="">Select Category</option>
										<?php
										$res=mysqli_query($con,"select categories_id,category_name from categories order by category_name asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['categories_id']==$categories_id){
												echo "<option selected value=".$row['categories_id'].">".$row['category_name']."</option>";
											}else{
												echo "<option value=".$row['categories_id'].">".$row['category_name']."</option>";
											}
											
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Product Name</label>
									<input type="text" name="name" placeholder="Enter product name" class="form-control" required value="">
								</div>
                                  <?php 
								  $sql= "SELECT * FROM brands";
								  $rel= mysqli_query($con,$sql);
								  ?>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Brand Name</label>
									<select class="form-control" name="brand_id" required>
										 <option value="">Select Barand</option>
										<?php
									  while ($row = mysqli_fetch_assoc($rel)) {
								  echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['brand_name']) . '</option>';
									  }
										?>
									</select>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">MRP</label>
									<input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Price</label>
									<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Qty</label>
									<input type="text" name="qty" placeholder="Enter qty" class="form-control" required value="">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control" >
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Short Description</label>
									<textarea name="short_desc" placeholder="Enter product short description" class="form-control" required></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<textarea name="description" placeholder="Enter product description" class="form-control" required></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Title</label>
									<textarea name="meta_title" placeholder="Enter product meta title" class="form-control"></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Description</label>
									<textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"></textarea>
								</div>
								
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Keyword</label>
									<textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"></textarea>
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