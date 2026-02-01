<?php

session_start();
include "include/connection.inc.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// user ke orders
$sql = $con->prepare("
    SELECT * FROM orders 
    WHERE u_id = ?
    ORDER BY order_id DESC
");
$sql->bind_param("i", $user_id);
$sql->execute();
$result = $sql->get_result();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
    <h3>🛒 My Orders</h3>

    <?php if($result->num_rows > 0){ ?>
    <table class="table table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>Order ID</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()){ ?>
            <tr>
                <td>#<?php echo $row['order_id']; ?></td>
                <td>₹<?php echo $row['total_amount']; ?></td>
                <td><?php echo $row['order_status']; ?></td>
                <td><?php echo date("d M Y", strtotime($row['created_at'])); ?></td>
                <td>
                    <a href="order_details.php?order_id=<?php echo $row['order_id']; ?>" 
                       class="btn btn-sm btn-primary">
                        View
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php }else{ ?>
        <div class="alert alert-info">No orders found</div>
    <?php } ?>
</div>
</body>
</html>
