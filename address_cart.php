<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}
?>

<h2>Delivery Address</h2>

<form method="POST" action="buy_cart.php">

<input type="text" name="full_name" placeholder="Full Name" required>

<input type="text" name="phone" placeholder="Mobile Number" required>

<textarea name="address" placeholder="Full Address" required></textarea>

<input type="text" name="district" placeholder="District" required>

<input type="text" name="state" placeholder="State" required>

<input type="text" name="pincode" placeholder="Pincode" required>

<button type="submit" name="place_order">
    PLACE ORDER
</button>

</form>
