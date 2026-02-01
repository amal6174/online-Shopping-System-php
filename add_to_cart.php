<?php
session_start();
include("connection.inc.php");

if(!isset($_SESSION['user_id'])){
       echo "Please login first";
    exit;
}

$u_id    = $_SESSION['user_id'];
$p_id    = $_POST['p_id'];
$p_name  = $_POST['p_name'];
$p_image = $_POST['p_image'];
$p_price = $_POST['p_price'];
$qty     = $_POST['quantity'];

// check already exist

$check = $con->prepare("SELECT * FROM cart WHERE u_id=? AND p_id=?");
$check->bind_param("ii",$u_id,$p_id);
$check->execute();

$result = $check->get_result();

if($result->num_rows > 0){
    $upadate = $con->prepare("UPDATE cart SET product_quantity = product_quantity + 1 WHERE u_id=? AND p_id=?");
    $upadate->bind_param("ii",$u_id,$p_id);
    $upadate->execute();
    
    echo "Cart quantity updated";

}else{
    $insert = $con->prepare("INSERT INTO cart(u_id,p_id,product_name,product_image,product_price,product_quantity) VALUES(?,?,?,?,?,?)");
    $insert->bind_param("iissdi",$u_id,$p_id,$p_name,$p_image,$p_price,$qty);
    $insert->execute();
      echo "Product added to cart";

}




?>