<?php

include ('connection.inc.php'); // Ensure this file contains $con for database connection





if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
 //  $category_name = $_POST['category_name'];
  // $brand_name= $_POST['brand_name'];
  // $mrp = $_POST['mrp'];
  // $p_price = $_POST['p_price'];
 //  $qty = $_POST['qty'];
  // $p_image = $_FILES['p_image']['name'];
 //  $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
 //  $p_image_folder = 'uploaded_img/'.$p_image;
  // $short_desc= $_POST['short_desc'];
  // $description= $_POST['description'];
//   $meta_title= $_POST['meta_title'];
  // $meta_desc= $_POST['meta_desc'];
  // $meta_keyword= $_POST['meta_keyword'];

 //  $insert_query = mysqli_query($con, "INSERT INTO products(p_name, category_name, brand_name, mrp, p_price, qty, p_image, short_desc, description, meta_title, meta_desc, meta_keyword) 
   // VALUES('$p_name', '$category_name', '$brand_name', '$mrp', '$p_price', '$qty', '$p_image', '$short_desc', '$description', '$meta_title', '$meta_desc', '$meta_keyword')");

   $insert_query ="INSERT INTO amal(p_name) 
   VALUES('$p_name')";
   mysqli_query($con,$insert_query);
 /*  
   if($insert_query){
    move_uploaded_file($p_image_tmp_name, $p_image_folder);
    $message[] = 'product add succesfully';
 }else{
    $message[] = 'could not add the product';
 }*/
} 
?>














<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            text:white;
        }
        .container {
            width: 100%;
            margin: 15px auto;
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        select, input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #008cba;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #005f73;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Product Form</h2>
        <form action="add-product.php" method="POST">
            <label>Select Category</label>
            <select>
                <option>Choose Category</option>
            </select>


            <label>Enter Product Name</label>
            <input name="p_name" type="text" placeholder="Enter product name">

            <label>Select Best Seller or Not</label>
            <select>
                <option>Yes</option>
                <option>No</option>
            </select>

            <label>Enter Product MRP</label>
            <input name="mrp" type="number" placeholder="Enter MRP">

            <label>Enter Selling Price</label>
            <input type="number" name="p_price" placeholder="Enter selling price">

            <label>Enter Product Quantity</label>
            <input type="number" name="qty" placeholder="Enter quantity">

            <label>Upload Product Image</label>
            <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg">

            <label>Short Description</label>
            <textarea name="description" placeholder="Write short description"></textarea>

            <label>Full Description</label>
            <textarea placeholder="Write about the product"></textarea>

            <label>Select Date</label>
            <input type="date">
`
            <label>Select Supplier</label>
            <select>
                <option>Choose Supplier</option>
            </select>

            <button type="submit" name="add_product">Submit</button>
        </form>
    </div>
</body>
</html>
