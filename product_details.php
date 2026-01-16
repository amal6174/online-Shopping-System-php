<?php


require('include/nav.php');

if (isset($_POST['add_to_cart']) && isset($_GET['id'])) {
    
  

if (!isset($_SESSION['USER_LOGIN'])) {
    header("Location: login.php");
    exit();
}

    $u_id = $_SESSION['uid'];
    $p_id = intval($_GET['id']);

    $result = mysqli_query($con, "SELECT * FROM products WHERE p_id = $p_id");
    if (mysqli_num_rows($result) == 0) {
        die("Product does not exist.");
    }

    $product = mysqli_fetch_assoc($result);
    $product_name = mysqli_real_escape_string($con, $product['p_name']);
    $product_price = $product['p_price'];
    $product_image = mysqli_real_escape_string($con, $product['p_image']);

    $cart_query = "SELECT * FROM cart WHERE u_id = $u_id AND p_id = $p_id";
    $cart_result = mysqli_query($con, $cart_query);

    if (mysqli_num_rows($cart_result) > 0) {
        $update_cart = "UPDATE cart SET product_quantity = product_quantity + 1 WHERE u_id = $u_id AND p_id = $p_id";
        if (mysqli_query($con, $update_cart)) {
            echo "<script>alert('Cart updated successfully.'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error updating cart.'); window.location.href='index.php';</script>";
        }
    } else {
        $insert_cart = "INSERT INTO cart (u_id, p_id, product_name, product_price, product_image, product_quantity) 
                        VALUES ('$u_id', '$p_id', '$product_name', '$product_price', '$product_image', 1)";
        if (mysqli_query($con, $insert_cart)) {
            echo "<script>alert('Product added to cart.'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error adding product to cart.'); window.location.href='index.php';</script>";
        }
    }
}





if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']); // always sanitize input
    $query = "SELECT * FROM products WHERE p_id = $product_id";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "<h3>Product not found.</h3>";
        exit;
    }
} else {
    echo "<h3>No product ID provided.</h3>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['p_name']; ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <!-- Thumbnail and Main Image -->
        <div class="col-md-6">
            <div class="row">
                <div class="col-2">
                    <div class="d-flex flex-column">
                        <img src="admin/uploaded_img/<?php echo $product['p_image']; ?>" class="img-thumbnail mb-2" alt="Thumbnail">
                        <img src="admin/uploaded_img/<?php echo $product['p_image']; ?>" class="img-thumbnail mb-2" alt="Thumbnail">
                        <img src="admin/uploaded_img/<?php echo $product['p_image']; ?>" class="img-thumbnail mb-2" alt="Thumbnail">
                    </div>
                </div>
                <div class="col-10">
                    <img src="admin/uploaded_img/<?php echo $product['p_image']; ?>" class="img-fluid rounded shadow" alt="<?php echo $product['p_name']; ?>">
                </div>
            </div>
        </div>

        <!-- Product Information -->
        <div class="col-md-6">
            <h2 class="fw-bold"><?php echo $product['p_name']; ?></h2>
            <p class="text-muted"><?php echo $product['short_desc']; ?></p> 

            <h4 class="text-danger fw-bold">₹<?php echo $product['p_price']; ?>  
                <span class="text-muted text-decoration-line-through">₹<?php echo $product['mrp']; ?></span>
                <span class="text-success"> (<?php echo round((($product['mrp'] - $product['p_price']) / $product['mrp']) * 100); ?>% Off)</span>
            </h4>

            <!-- Star Ratings -->
            <div class="mb-3">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-regular fa-star text-muted"></i>
                <span class="text-muted ms-2">11,656 ratings & 596 reviews</span>
            </div>

            <!-- Size Selection -->
            <h6 class="fw-bold">Size</h6>
            <div class="mb-3">
                <button class="btn btn-outline-secondary">28</button>
                <button class="btn btn-outline-secondary">30</button>
                <button class="btn btn-outline-secondary">32</button>
                <button class="btn btn-outline-secondary">34</button>
            </div>

            <!-- Add to Cart & Buy Now Buttons -->
            <form method="post">
                <button type="submit" name="add_to_cart" class="btn btn-warning btn-lg">
                    <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
                <a href="checkout.php?id=<?php echo $product['p_id']; ?>" class="btn btn-danger btn-lg ms-2">
                    <i class="fas fa-bolt"></i> Buy Now
                </a>
            </form>

            <!-- Available Offers -->
            <div class="mt-4">
                <h6 class="fw-bold">Available Offers</h6>
                <ul class="list-unstyled">
                    <li><i class="fa-solid fa-tag text-success"></i> Bank Offer 5% Unlimited Cashback on Flipkart Axis Bank Credit Card</li>
                    <li><i class="fa-solid fa-tag text-success"></i> 10% off up to ₹1,250 on HDFC Bank Credit Card Transactions</li>
                    <li><i class="fa-solid fa-tag text-success"></i> 10% off up to ₹1,500 on HDFC Bank EMI Transactions</li>
                    <li><i class="fa-solid fa-tag text-success"></i> Combo Offer: Buy 2 or more items save ₹20</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Product Full Description -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h3>Product Details</h3>
            <p><?php echo nl2br($product['description']); ?></p>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<style>
    body {
    background-color: #f8f9fa; /* Light gray background */
}

.container {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
}

h2, h3 {
    color: #333;
}

.text-muted {
    font-size: 16px;
}

.img-fluid {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
}

.btn-lg {
    font-size: 18px;
    padding: 10px 20px;
    border-radius: 8px;
}

.btn-outline-secondary {
    border-radius: 8px;
    padding: 5px 15px;
    margin-right: 5px;
}

p {
    line-height: 1.6;
    font-size: 16px;
    color: #555;
}

.list-unstyled li {
    font-size: 15px;
    margin-bottom: 5px;
}

    </style>