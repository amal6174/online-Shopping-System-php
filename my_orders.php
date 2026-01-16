<?php
include('connection.inc.php');
session_start();

// Check if user is logged in
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

$uid = $_SESSION['uid'];

// Fetch user orders
$query = "SELECT order_id, name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price, order_date 
          FROM orders 
          WHERE u_id = ? 
          ORDER BY order_date DESC";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $uid);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="include/style.css">
</head>
<body>

<div class="order-container">
    <h2>My Orders</h2>

    <?php if ($result->num_rows > 0): ?>
        <table class="order-table">
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Products</th>
                <th>Total Price</th>
                <th>Payment</th>
                <th>Address</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td>#<?= $row['order_id'] ?></td>
                    <td><?= $row['order_date'] ?></td>
                    <td><?= htmlspecialchars($row['total_products']) ?></td>
                    <td>₹<?= number_format($row['total_price'], 2) ?></td>
                    <td><?= ucfirst($row['method']) ?></td>
                    <td>
                        <?= htmlspecialchars($row['flat'] . ", " . $row['street'] . ", " . $row['city']) ?><br>
                        <?= htmlspecialchars($row['state'] . ", " . $row['country'] . " - " . $row['pin_code']) ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No orders found.</p>
    <?php endif; ?>

</div>

</body>
</html>

<style>
/* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: auto;
    padding: 20px;
}

/* Orders Container */
.order-container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 90%;
    max-width: 800px;
}

/* Order Table */
.order-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.order-table th, .order-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}

.order-table th {
    background: #1bc4de;
    color: white;
}
</style>
