
<?php

include "include/nav.php";



if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$u_id = $_SESSION['user_id'];






?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Cart</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }
    body { padding: 20px; }
    .cart-container { max-width: 1000px; margin: auto; }
    .cart-header, .cart-item, .cart-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 0;
      border-bottom: 1px solid #ccc;
    }
    .cart-header { font-weight: bold; }
    .cart-item img { width: 80px; height: 80px; object-fit: cover; margin-right: 10px; }
    .product-info { flex: 1; display: flex; align-items: center; }
    .product-details { max-width: 300px; }
    .quantity-controls {
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .quantity-controls button {
      width: 30px;
      height: 30px;
      cursor: pointer;
    }
    .remove-btn { cursor: pointer; color: red; font-size: 18px; }
    .cart-footer {
      justify-content: flex-end;
      gap: 20px;
    }
    .checkout-btn {
      background: red;
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }
    @media (max-width: 768px) {
      .cart-header, .cart-item, .cart-footer { flex-direction: column; align-items: flex-start; }
      .product-info { flex-direction: column; align-items: flex-start; }
    }
  </style>
</head>
<body>
  <div class="cart-container">
    <div class="cart-header">
      <div>Product</div>
      <div>Quantity</div>
    </div>
 <?php 
    
        
  $grand_total = 0;

$sql = $con->prepare("SELECT * FROM cart WHERE u_id=?");
$sql->bind_param("i",$u_id);
$sql->execute();
$result = $sql->get_result();

if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
     $total = $row['product_price'] * $row['product_quantity'];
     $grand_total += $total; 
 
   
            
         ?>
<div class="cart-item" data-price="<?php echo $row['product_price']; ?>">
  <div class="product-info">
    <img src="admin/uploaded_img/<?php echo $row['product_image'] ?>" alt="Image">
    <div class="product-details">
      <div><?php echo $row['product_name'] ?></div>
      <div>Rs. <?php echo number_format($row['product_price']); ?></div>
    </div>
  </div>
  
  <div class="quantity-controls">
       <button class="qty-btn minus" data-id="<?= $row['id']; ?>">-</button>

    <span class="qty-value" id="qty-<?= $row['id']; ?>">
        <?= $row['product_quantity']; ?>
    </span>

       <button class="qty-btn plus" data-id="<?= $row['id']; ?>">+</button>
   <span class="remove-btn" onclick="removeItem(this, <?php echo $row['id']; ?>)">🗑️</span>

  </div>
</div>
     <?php
        
            };
         }; 
        
         ?>



    <div class="cart-footer">
      <div><strong>Estimated Total: </strong>Rs.<?php echo $grand_total; ?> <span id="total">0.00</span></div>
      <!-- <button class="checkout-btn" >Place Order</button> -->
       <a href="checkout.php"  class="checkout-btn" > Proceed to Checkout</a>
    </div>
  </div>



<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="js/cart.js"></script>
  
</body>
</html>
