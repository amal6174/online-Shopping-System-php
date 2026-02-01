<?php
session_start();
include "include/connection.inc.php";

if(!isset($_SESSION['user_id'])){
      echo json_encode(["status"=>"error"]);
    exit;
}

$cart_id = $_POST['cart_id'];
$action  = $_POST['action'];


$sql = $con->prepare("SELECT product_quantity, u_id FROM cart WHERE id=?");
$sql->bind_param("i",$cart_id);
$sql->execute();

$res = $sql->get_result()->fetch_assoc();

$qty = $res['product_quantity'];

if($action === 'plus'){
    $qty++;
}elseif($action === 'minus' && $qty > 1){
    $qty--;
}

$update = $con->prepare("UPDATE cart SET product_quantity=? WHERE id=?");
$update->bind_param("ii",$qty,$cart_id);
$update->execute();

$total = 0;
$t = $con->prepare("SELECT product_price, product_quantity FROM cart WHERE u_id=?");
$t->bind_param("i",$_SESSION['user_id']);
$t->execute(); 
$items = $t->get_result();

while($row = $items->fetch_assoc()){
    $total += $row['product_price'] * $row['product_quantity'];

}


echo json_encode([
    "status" => "success",
    "qty"    => $qty,
    "total"  => number_format($total,2)
]);

?>