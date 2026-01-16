<?php

include("connection.inc.php");

$u_id = $_POST['u_id'];
$p_id = $_POST['p_id'];
$product_name = $_POST['product_name'];
$product_image = $_POST['product_image'];
$product_price = $_POST['product_price'];
    $product_quantity = isset($_POST['product_quantity']) ? (int)$_POST['product_quantity'] : 1;

$sql = "SELECT * FROM cart WHERE u_id = ? AND p_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ii", $u_id, $p_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $update = $con->prepare("UPDATE cart SET product_quantity = product_quantity + ? WHERE u_id = ? AND p_id = ?");
    $update->bind_param("iii", $product_quantity, $u_id, $p_id);
    $update->execute();
    echo "Cart updated successfully.";
} else {
    $insert = $con->prepare("INSERT INTO cart (u_id, p_id, product_name, product_image, product_price, product_quantity) VALUES (?, ?, ?, ?, ?, ?)");
    $insert->bind_param("iissdi", $u_id, $p_id, $product_name, $product_image, $product_price, $product_quantity);
    $insert->execute();
    echo "Product added to cart.";
}
?>
