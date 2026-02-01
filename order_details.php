<?php
session_start();
include "include/connection.inc.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$order_id = $_GET['order_id'];

$sql = $con->prepare("
    SELECT 
        oi.product_name,
        oi.product_price,
        oi.product_quantity,
        p.p_image
    FROM order_items oi
    JOIN products p ON oi.p_id = p.p_id
    WHERE oi.order_id = ?
");
$sql->bind_param("i", $order_id);
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
    <h4>📦 Order Details (Order #<?php echo $order_id; ?>)</h4>

    <table class="table table-bordered align-middle mt-3">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>

        <?php 
        $grandTotal = 0;
        while($row = $result->fetch_assoc()){ 
            $total = $row['product_price'] * $row['product_quantity'];
            $grandTotal += $total;
        ?>
            <tr>
                <td>
                    <img src="admin/uploaded_img/<?php echo $row['p_image']; ?>" 
                         width="70" class="img-thumbnail">
                </td>
                <td><?php echo $row['product_name']; ?></td>
                <td>₹<?php echo $row['product_price']; ?></td>
                <td><?php echo $row['product_quantity']; ?></td>
                <td>₹<?php echo $total; ?></td>
            </tr>
        <?php } ?>

        </tbody>

        <tfoot>
            <tr>
                <th colspan="4" class="text-end">Grand Total</th>
                <th>₹<?php echo $grandTotal; ?></th>
            </tr>
        </tfoot>
    </table>

    <a href="my_orders.php" class="btn btn-secondary">← Back to Orders</a>
</div>
    
</body>
</html>