<?php



include 'include/nav.php'; 
// Ensure database connection is included

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['uid'])) {
        die("Please log in to place an order.");
    }

    $u_id = $_SESSION['uid']; // Corrected session variable

    // Fetch product IDs from the cart for the logged-in user
    $p_ids = [];
    $sql = "SELECT p_id FROM cart WHERE u_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $u_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $p_ids[] = $row['p_id']; 
    }

    if (empty($p_ids)) {
        die("Your cart is empty!");
    }

    $p_id_string = implode(",", $p_ids); // Combine product IDs

    // Get user input from form
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $flat = $_POST['flat'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pin_code = $_POST['pin_code'];

    // Calculate total price and product names
    $total_price = 0;
    $total_products = "";

    foreach ($p_ids as $p_id) {
        $query = "SELECT p_name, p_price FROM products WHERE p_id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $p_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($product = $result->fetch_assoc()) {
            $total_products .= $product['p_name'] . ", ";
            $total_price += $product['p_price'];
        } else {
            die("Product with ID $p_id not found.");
        }
    }

    $total_products = rtrim($total_products, ", "); // Remove last comma

    // Insert into orders table
    $query = "INSERT INTO orders (u_id, p_id, name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($query);
    $stmt->bind_param("isssssssssssss", $u_id, $p_id_string, $name, $number, $email, $method, $flat, $street, $city, $state, $country, $pin_code, $total_products, $total_price);

    if ($stmt->execute()) {
        echo "<script>alert('Order placed successfully!'); window.location.href='thank_you.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>



<?php


// Check if user is logged in
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    include 'include/db.php'; // Make sure your database connection is included
    
    $u_id = $_SESSION['uid']; // Logged-in user ID
    $p_id = intval($_GET['id']); // Product ID from URL

    // Sanitize user input
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $method = mysqli_real_escape_string($con, $_POST['method']);
    $flat = mysqli_real_escape_string($con, $_POST['flat']);
    $street = mysqli_real_escape_string($con, $_POST['street']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $pin_code = mysqli_real_escape_string($con, $_POST['pin_code']);
    $quantity = 1; // Default quantity for Buy Now

    // Fetch product details
    $query = "SELECT * FROM products WHERE p_id = $p_id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 0) {
        die("Product does not exist.");
    }

    $product = mysqli_fetch_assoc($result);
    $product_name = $product['p_name'];
    $product_price = $product['p_price'];
    $total_price = $product_price * $quantity;

    // Insert order into 'orders' table
    $insert_order = "INSERT INTO orders (u_id, p_id, name, number, email, method, flat, street, city, state, country, pin_code, quantity, total_products, total_price) 
                     VALUES ('$u_id', '$p_id', '$name', '$number', '$email', '$method', '$flat', '$street', '$city', '$state', '$country', '$pin_code', '$quantity', '$product_name', '$total_price')";

    if (mysqli_query($con, $insert_order)) {
        echo "<script>alert('Order placed successfully!'); window.location.href='thankyou.php';</script>";
    } else {
        echo "<script>alert('Error placing order.'); window.location.href='checkout.php';</script>";
    }

    mysqli_close($con);
}
?>



<?php
/*
    // Insert order details into orders table
    $detail_query = mysqli_query($con, "INSERT INTO orders
        (name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price)
        VALUES('$name', '$number', '$email', '$method', '$flat', '$street', '$city', '$state', '$country', '$pin_code', '$total_product', '$price_total')")
        or die('Query failed: ' . mysqli_error($con));

    if ($detail_query) {
        echo "
        <div class='order-message-container'>
            <div class='message-container'>
                <h3>Thank you for shopping!</h3>
                <div class='order-detail'>
                    <span>$total_product</span>
                    <span class='total'>Total: $" . number_format($price_total, 2) . "/-</span>
                </div>
                <div class='customer-details'>
                    <p>Your name: <span>$name</span></p>
                    <p>Your number: <span>$number</span></p>
                    <p>Your email: <span>$email</span></p>
                    <p>Your address: <span>$flat, $street, $city, $state, $country - $pin_code</span></p>
                    <p>Your payment mode: <span>$method</span></p>
                    <p>(Pay when product arrives)</p>
                </div>
                <a href='products.php' class='btn'>Continue Shopping</a>
            </div>
        </div>
        ";
    }
}
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>
   <!-- Font Awesome CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- Custom CSS file -->
   <link rel="stylesheet" href="css/cart.css">
</head>
<body>



<div class="container">

<section class="checkout-form">

   <h1 class="heading">Complete Your Order</h1>

   <form action="" method="post">

      <div class="display-order">
         <?php
         // Retrieve cart items for display
         $select_cart = mysqli_query($con, "SELECT * FROM cart");
         $grand_total = 0;
         if (mysqli_num_rows($select_cart) > 0) {
             while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                 // Calculate sub-total for each product (as a number)
                 $sub_total = $fetch_cart['product_price'] * $fetch_cart['product_quantity'];
                 $grand_total += $sub_total;
         ?>
         <span><?= $fetch_cart['product_name']; ?>(<?= $fetch_cart['product_quantity']; ?>)</span>
         <?php
             }
         } else {
             echo "<div class='display-order'><span>Your cart is empty!</span></div>";
         }
         ?>
         <!-- Format the grand total as a decimal (two digits) -->
         <span class="grand-total">Grand Total: $<?= number_format($grand_total, 2); ?>/-</span>
      </div>

      <div class="flex">
         <div class="inputBox">
            <span>Your Name</span>
            <input type="text" placeholder="Enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>Your Number</span>
            <input type="number" placeholder="Enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>Your Email</span>
            <input type="email" placeholder="Enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>Payment Method</span>
            <select name="method">
               <option value="cash on delivery" selected>Cash on Delivery</option>
               <option value="credit card">Credit Card</option>
               <option value="paypal">Paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Address Line 1</span>
            <input type="text" placeholder="e.g. Flat no." name="flat" required>
         </div>
         <div class="inputBox">
            <span>Address Line 2</span>
            <input type="text" placeholder="e.g. Street name" name="street" required>
         </div>
         <div class="inputBox">
            <span>City</span>
            <input type="text" placeholder="e.g. Mumbai" name="city" required>
         </div>
         <div class="inputBox">
            <span>State</span>
            <input type="text" placeholder="e.g. Maharashtra" name="state" required>
         </div>
         <div class="inputBox">
            <span>Country</span>
            <input type="text" placeholder="e.g. India" name="country" required>
         </div>
         <div class="inputBox">
            <span>Pin Code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="Order Now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- Custom JS file link -->
<script src="js/script.js"></script>
   
</body>
</html>