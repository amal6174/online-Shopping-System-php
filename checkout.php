
<?php
session_start();
include "include/connection.inc.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$u_id = $_SESSION['user_id'];

$cart = $con->prepare("SELECT * FROM cart WHERE u_id=?");
$cart->bind_param("i", $u_id);
$cart->execute();
$result = $cart->get_result();

$total_amount = 0;
$total_products = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Checkout</title>

<!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="row">

        <!-- LEFT : ORDER SUMMARY -->
        <div class="col-lg-7 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">🛒 Order Summary</h5>
                </div>

                <div class="card-body p-0">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = $result->fetch_assoc()):
                            $sub = $row['product_price'] * $row['product_quantity'];
                            $total_amount += $sub;
                            $total_products += $row['product_quantity'];
                        ?>
                            <tr>
                                <td><?= $row['product_name']; ?></td>
                                <td>₹ <?= $row['product_price']; ?></td>
                                <td><?= $row['product_quantity']; ?></td>
                                <td>₹ <?= $sub; ?></td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <strong>Total Products: <?= $total_products; ?></strong>
                    <strong>Total Amount: ₹ <?= $total_amount; ?></strong>
                </div>
            </div>
        </div>

        <!-- RIGHT : ADDRESS + PAYMENT -->
        <div class="col-lg-5">
            <form method="POST" action="place_order.php">
                <input type="hidden" name="total_amount" value="<?= $total_amount; ?>">

                <!-- ADDRESS -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">🏠 Delivery Address</h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="Mobile Number" required>
                        </div>

                        <div class="mb-3">
                            <textarea name="address" class="form-control" placeholder="Full Address" rows="3" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="district" class="form-control" placeholder="District" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <input type="text" name="state" class="form-control" placeholder="State" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="pincode" class="form-control" placeholder="Pincode" required>
                        </div>
                    </div>
                </div>

                <!-- PAYMENT -->
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">💳 Payment Method</h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <select name="payment_method" class="form-select" required>
                                <option value="">-- Select Payment --</option>
                                <option value="COD">Cash on Delivery</option>
                                <option value="UPI">UPI</option>
                            </select>
                        </div>

                        <button type="submit" name="place_order" class="btn btn-success w-100 btn-lg">
                            PLACE ORDER
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>

</body>
</html>
