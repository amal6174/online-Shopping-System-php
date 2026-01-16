
<?php
include 'include/nav.php'; 





// // Check if user is logged in
// if (!isset($_SESSION['uid'])) {
//     echo "<script>alert('You need to log in first!'); window.location.href='login.php';</script>";
//     exit();
// }

// // Check if "Add to Cart" button is clicked and product ID is set
// if (isset($_POST['add_to_cart']) && isset($_POST['p_id'])) {
//     $u_id = intval($_SESSION['uid']); // Ensure it's an integer
//     $p_id = intval($_POST['p_id']);

//     // Check if product exists
//     $query = "SELECT * FROM products WHERE p_id = ?";
//     $stmt = mysqli_prepare($con, $query);
//     mysqli_stmt_bind_param($stmt, "i", $p_id);
//     mysqli_stmt_execute($stmt);
//     $result = mysqli_stmt_get_result($stmt);

//     if (mysqli_num_rows($result) == 0) {
//         die("Product does not exist.");
//     }

//     $product = mysqli_fetch_assoc($result);
//     if (!$product) {
//         die("Product details not found.");
//     }

//     $product_name = $product['p_name'];
//     $product_price = $product['p_price'];
//     $product_image = $product['p_image'];

//     // Check if product is already in the cart
//     $cart_query = "SELECT * FROM cart WHERE u_id = ? AND p_id = ?";
//     $stmt = mysqli_prepare($con, $cart_query);
//     mysqli_stmt_bind_param($stmt, "ii", $u_id, $p_id);
//     mysqli_stmt_execute($stmt);
//     $cart_result = mysqli_stmt_get_result($stmt);

//     if (mysqli_num_rows($cart_result) > 0) {
//         // Update quantity if product already exists in the cart
//         $update_cart = "UPDATE cart SET product_quantity = product_quantity + 1 WHERE u_id = ? AND p_id = ?";
//         $stmt = mysqli_prepare($con, $update_cart);
//         mysqli_stmt_bind_param($stmt, "ii", $u_id, $p_id);

//         if (mysqli_stmt_execute($stmt)) {
//             echo "<script>alert('Cart updated successfully.'); window.location.href='index.php';</script>";
//         } else {
//             die("Error updating cart: " . mysqli_error($con));
//         }
//     } else {
//         // Insert new product into the cart
//         $insert_cart = "INSERT INTO cart (u_id, p_id, product_name, product_price, product_image, product_quantity) 
//                         VALUES (?, ?, ?, ?, ?, 1)";
//         $stmt = mysqli_prepare($con, $insert_cart);
//         mysqli_stmt_bind_param($stmt, "iisss", $u_id, $p_id, $product_name, $product_price, $product_image);

//         if (mysqli_stmt_execute($stmt)) {
//             echo "<script>alert('Product added to cart.'); window.location.href='index.php';</script>";
//         } else {
//             die("Error adding product to cart: " . mysqli_error($con));
//         }
//     }

//     mysqli_close($con);
    
// }

?>


















<?php


if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($con, "UPDATE `cart` SET product_quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
   
   };
};




if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($con, "DELETE FROM `cart` WHERE id = '$remove_id'");
  
};

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
      if(isset($_SESSION['u_id'])) {
    $user_id = $_SESSION['u_id']; // assume karo user login hone pe user_id store hota hai session mein
        $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE u_id = '$user_id'");
        
          
    if(mysqli_num_rows($select_cart) > 0){
        while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            
         ?>
<div class="cart-item" data-price="<?php echo $fetch_cart['product_price']; ?>">
  <div class="product-info">
    <img src="admin/uploaded_img/<?php echo $fetch_cart['product_image'] ?>" alt="Image">
    <div class="product-details">
      <div><?php echo $fetch_cart['product_name'] ?></div>
      <div>Rs. <?php echo number_format($fetch_cart['product_price']); ?></div>
    </div>
  </div>
  <div class="quantity-controls">
    <button onclick="updateQuantity(this, -1)">-</button>
    <span class="qty">1</span>
    <button onclick="updateQuantity(this, 1)">+</button>
   <span class="remove-btn" onclick="removeItem(this, <?php echo $fetch_cart['id']; ?>)">🗑️</span>

  </div>
</div>
     <?php
       
       
            };
         }; 
        };
         ?>



    <div class="cart-footer">
      <div><strong>Estimated Total: </strong>Rs. <span id="total">0.00</span></div>
      <button class="checkout-btn">Place Order</button>
    </div>
  </div>

  <script>
    function updateTotal() {
      let total = 0;
      document.querySelectorAll('.cart-item').forEach(item => {
        const price = parseFloat(item.getAttribute('data-price'));
        const qty = parseInt(item.querySelector('.qty').innerText);
        total += price * qty;
      });
      document.getElementById('total').innerText = total.toFixed(2);
    }

    function updateQuantity(btn, change) {
      const qtySpan = btn.parentElement.querySelector('.qty');
      let qty = parseInt(qtySpan.innerText);
      qty = Math.max(1, qty + change);
      qtySpan.innerText = qty;
      updateTotal();
    }

  function removeItem(span, id) {
  const item = span.closest('.cart-item');

  // AJAX request to delete from database
  fetch('delete_cart_item.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: `id=${id}`
  })
  .then(response => response.text())
  .then(data => {
    if (data.trim() === 'success') {
      item.remove();
      updateTotal();
    } else {
      alert('Failed to delete item');
    }
  });
}

    window.onload = updateTotal;
  </script>
</body>
</html>
