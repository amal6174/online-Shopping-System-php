<?php
include 'include/nav.php'; 
// Ensure database connection is included



// Check if "Add to Cart" button is clicked and product ID is set
if (isset($_POST['add_to_cart']) && isset($_POST['p_id'])) {
    $u_id = intval($_SESSION['uid']); // Ensure it's an integer
    $p_id = intval($_POST['p_id']);

    // Check if product exists
    $query = "SELECT * FROM products WHERE p_id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $p_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {
        die("Product does not exist.");
    }

    $product = mysqli_fetch_assoc($result);
    if (!$product) {
        die("Product details not found.");
    }

    $product_name = $product['p_name'];
    $product_price = $product['p_price'];
    $product_image = $product['p_image'];

    // Check if product is already in the cart
    $cart_query = "SELECT * FROM cart WHERE u_id = ? AND p_id = ?";
    $stmt = mysqli_prepare($con, $cart_query);
    mysqli_stmt_bind_param($stmt, "ii", $u_id, $p_id);
    mysqli_stmt_execute($stmt);
    $cart_result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($cart_result) > 0) {
        // Update quantity if product already exists in the cart
        $update_cart = "UPDATE cart SET product_quantity = product_quantity + 1 WHERE u_id = ? AND p_id = ?";
        $stmt = mysqli_prepare($con, $update_cart);
        mysqli_stmt_bind_param($stmt, "ii", $u_id, $p_id);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Cart updated successfully.'); window.location.href='index.php';</script>";
        } else {
            die("Error updating cart: " . mysqli_error($con));
        }
    } else {
        // Insert new product into the cart
        $insert_cart = "INSERT INTO cart (u_id, p_id, product_name, product_price, product_image, product_quantity) 
                        VALUES (?, ?, ?, ?, ?, 1)";
        $stmt = mysqli_prepare($con, $insert_cart);
        mysqli_stmt_bind_param($stmt, "iisds", $u_id, $p_id, $product_name, $product_price, $product_image);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Product added to cart.'); window.location.href='index.php';</script>";
        } else {
            die("Error adding product to cart: " . mysqli_error($con));
        }
    }

    mysqli_close($con);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="cart.css">
  <link rel="stylesheet" href="styles.css">

   <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
   <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/brands.min.css">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
<!-- slider css and other inks-->
<!--
<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="assets/css/plugins/swiper.min.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
-->


    
</head>

<body>



<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="slider_men.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="#" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>









<!--

<section id="hero">
  
    
    <h4>trade-in-offer</h4>
    <h2>Super value deals</h2>
    <h1>On all products</h1>
    <p>Save more with coupons & up to 70% off</p>
    <button>Shop Now</button>

  </section>
-->




  <!-- Circle category section  -->
    <!--
  <div class="product-section" class="product-card1">
    <div class="product-card">
      <img src="" alt="Product 1" class="product-image">
      <div class="product-info">
        <span class="shipping-badge">Men</span>
      </div>
    </div>
    <div class="product-card" class="product-card">
      <img src="https://via.placeholder.com/150" alt="Product 2" class="product-image">
      <div class="product-info">
        <span class="shipping-badge">Women</span>
      </div>
    </div>
    <div class="product-card" class="product-card3">
      <img src="https://via.placeholder.com/150" alt="Product 3" class="product-image">
      <div class="product-info">
        <span class="shipping-badge">Free Shipping</span>
      </div>
    </div>
    <div class="product-card" class="product-card4">
      <img src="https://via.placeholder.com/150" alt="Product 4" class="product-image">
      <div class="product-info">
        <span class="shipping-badge">Free Shipping</span>
      </div>
    </div>
  </div>


-->
<!-- start product -->
<?php
   
     
      ?>
  <section id="product1" class="section-p1">
    <p>Featured Products</p>
    <p>Summmer Collection New Modern Designed</p>
   
 
         
       <div class="pro-container">
     
       <?php
   
          
      $select_products = mysqli_query($con, "SELECT * FROM `products`  WHERE category_name='men dress'");
        if(mysqli_num_rows($select_products) > 0){
          while($fetch_product = mysqli_fetch_assoc($select_products)){ 
            ?>
      
         <div class="pro">
     
         <form action="index.php?id=<?php echo $fetch_product['p_id']; ?>" method="POST">

         <a href="product_details.php?id=<?php echo $fetch_product['p_id']; ?>">
                <img src="admin/uploaded_img/<?php echo $fetch_product['p_image']; ?>" alt="">
            </a>
            <div class="des">
              <span>Zara</span>
                <h5><?php echo $fetch_product['p_name']; ?></h5>
                  <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                  </div>
                  <h4>Rs-<?php echo $fetch_product['p_price']; ?></h4>
            </div>

                 
             <div class="button-container">
            
             <input type="hidden" name="p_id" value="<?php echo $fetch_product['p_id']; ?>">
         
    <button type="submit" name="add_to_cart" class="cart-btn"> 
        🛒 Add to Cart </a>
    </button>
 <!-- <button type="submit" name="buy_now" class="buy-btn">⚡ Buy Now</button> -->

  <form action="checkout.php" method="GET">
  <input type="hidden" name="id" value="<?php echo $fetch_product['p_id']; ?>">
    <button type="submit" class="buy-btn">Buy Now</button>
    
</form>


             <!--   <input type="submit" name="add_to_cart" value="🛒 Add to Cart" 
                class="btn btn-info text-white fw-bold px-4 py-2 rounded-pill shadow-lg"> -->

              
              </div>  <!-- Hidden input for product ID -->
   
            
         </div>
         </form>
                <?php
      };
      }; 
         ?>
      
        
    
      </div>
    
 
    </div>


   

  </section>

    <!-- end women section-->







<!-- men section start -->

  <section id="banner" class="section-m1">
    <h4>Repair service</h4>
    <h2>Up to<span> 70% Off</span> All Dress & Aceessories</h2>
    <button class="norman"> Explore More</button>
  </section>



<!-- men section start -->

  <section id="product1" class="section-p1">
  
    <h2>New Arrival</h2>
    <p>Summmer Collection New Modern Designed</p>
              <?php
                   $select_products = mysqli_query($con, "SELECT * FROM `products` WHERE category_name='men dress' ORDER BY p_id DESC");
               //    $select_products = mysqli_query($con, "SELECT * FROM `products`  WHERE category_name='men dress'");
              ?>

<div class="pro-container">
<?php

        if(mysqli_num_rows($select_products) > 0){
          while($fetch_product = mysqli_fetch_assoc($select_products)){ 
            ?>
      
         <div class="pro">
     
         <form action="" method="POST">
         <a href="product_details.php?id=<?php echo $fetch_product['p_id']; ?>">
                <img src="admin/uploaded_img/<?php echo $fetch_product['p_image']; ?>" alt="">
            </a>
            <div class="des">
              <span>Zara</span>
                <h5><?php echo $fetch_product['p_name']; ?></h5>
                  <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                  </div>
                  <h4>Rs-<?php echo $fetch_product['p_price']; ?></h4>
            </div>

                 
                 <div class="button-container">
            
             <input type="hidden" name="p_id" value="<?php echo $fetch_product['p_id']; ?>">
         
    <button type="submit" name="add_to_cart" class="cart-btn"> 
        🛒 Add to Cart </a>
    </button>
 <!-- <button type="submit" name="buy_now" class="buy-btn">⚡ Buy Now</button> -->

  <form action="checkout.php" method="GET">
  <input type="hidden" name="id" value="<?php echo $fetch_product['p_id']; ?>">
    <button type="submit" class="buy-btn">Buy Now</button>
    
</form>


             <!--   <input type="submit" name="add_to_cart" value="🛒 Add to Cart" 
                class="btn btn-info text-white fw-bold px-4 py-2 rounded-pill shadow-lg"> -->

              
              </div>  
                <input type="hidden" name="product_image" value="<?php echo $fetch_product['p_image'];?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_product['p_name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_product['p_price']; ?>">
                <input type="submit" class="btn" value="add to cart" name="add_to_cart">  

            
         </div>
         </form>
                <?php
      };
      }; 
         ?>
      
        
    
      </div>
    </div>




  </section>



  <section id="sm-banner" class="section-p1">
    <div class="banner-box">
      <h4>crazy deals</h4>
      <h2>buy 1 get 1 free</h2>
      <span>The best classic dress is on sale at cara</span>
      <button class="white">Learn More</button>

    </div>


    <div class="banner-box banner-box2">
      <h4>spring/summer</h4>
      <h2>upcoming season</h2>
      <span>The best classic dress is on sale at cara</span>
      <button class="white">collection</button>

    </div>
  </section>

<!-- footer banner-->


  <section id="banner3">
        <div class="banner-box">
      
      <h2>upcoming season</h2>
      <h3>Winter Collection -50% OFF</h3>

    </div>
    <div class="banner-box banner-box2">
      
      <h2>upcoming season</h2>
      <h3>Winter Collection -50% OFF</h3>

    </div>
    <div class="banner-box banner-box3">
      
      <h2>upcoming season</h2>
      <h3>Winter Collection -50% OFF</h3>

    </div>
   
  
  </section>

 
  





  </section>
<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
        <h4>Sign Up for newsletter</h4>
        <p>
            Get e-mail Updates about Our latest shop and <span>special offers</span>
        </p>
    </div>
    <div class="from">
        <input type="text" placeholder="your e-mail address">
        <button class="normal" >Sign Up</button>
    </div>
</section>











  <script src="script.js"></script>






    <!-- slider js
<script src="assets/js/plugins/jquery.min.js"></script>
<script src="assets/js/plugins/swiper.min.js"></script>
<script src="assets/js/theme.js"></script>   -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




</body>
<!--
<style>
	/* Button Container */
.button-container {
    display: flex;
    justify-content: space-between; /* Ensures spacing */
    gap: 10px; /* Adds space between buttons */
    width: 100%;
}

/* Common Button Styles */
.cart-btn, .buy-btn {
    flex: 1; /* Makes both buttons equal width */
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    padding: 12px 0;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

/* Add to Cart Button */
.cart-btn {
    background-color: #ffc107;
    color: black;
}

/* Buy Now Button */
.buy-btn {
    background-color: #dc3545;
    color: white;
    text-decoration: none;
    display: inline-block;
    line-height: 40px; /* Ensures text is vertically centered */
}

/* Hover Effects */
.cart-btn:hover {
    background-color: #e0a800;
}

.buy-btn:hover {
    background-color: #c82333;
}

	</style> -->
  <style>
    /* Button Container */
.button-container {
    display: flex;
    justify-content: center; /* Centers buttons */
    gap: 8px; /* Reduces space between buttons */
    width: 100%;
}

/* Common Button Styles */
.cart-btn, .buy-btn {
    flex: 0.4; /* Reduces button width */
    text-align: center;
    font-size: 14px; /* Decreases text size */
    font-weight: bold;
    padding: 8px 0; /* Reduces button height */
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

/* Add to Cart Button */
.cart-btn {
    background-color: #ffc107;
    color: black;
}

/* Buy Now Button */
.buy-btn {
    background-color: #dc3545;
    color: white;
    text-decoration: none;
    display: inline-block;
    line-height: normal;
}

/* Hover Effects */
.cart-btn:hover {
    background-color: #e0a800;
}

.buy-btn:hover {
    background-color: #c82333;
}

  </style>