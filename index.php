<?php

include 'include/nav.php';  
?>


<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="cart.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="circle/stylec.css">
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
      <img src="21_1d07d179-ce39-421b-816e-5f4cef173d61.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="21_1d07d179-ce39-421b-816e-5f4cef173d61.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="21_1d07d179-ce39-421b-816e-5f4cef173d61.webp" class="d-block w-100" alt="...">
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
      
      $select_products = mysqli_query($con, "SELECT * FROM `products`  WHERE category_name='women dress'");
     
      ?>
  <section id="product1" class="section-p1">
    <p>Featured Products</p>
    <p>Summmer Collection New Modern Designed</p>
   
 
         
       <div class="pro-container">
     
       <?php
        if(mysqli_num_rows($select_products) > 0){
          while($fetch_product = mysqli_fetch_assoc($select_products)){ 
            ?>
      
         <div class="pro">
     

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
                  
                   <!-- Quantity input (optional) -->
                  <input type="hidden" type="number" class="quantity" value="1" min="1" />
                </div>

  <!-- Buttons -->
    <div class="product-buttons">

 <!-- Hidden data attributes for JavaScript -->
       <button class="btn-cart addToCartBtn"
        data-id="<?php echo $fetch_product['p_id']; ?>"
        data-name="<?php echo $fetch_product['p_name']; ?>"
        data-image="<?php echo $fetch_product['p_image']; ?>"
        data-price="<?php echo $fetch_product['p_price']; ?>">
        <i class="fa-solid fa-cart-shopping"></i> Add to Cart
    </button>


    
      <a href="direct_checkout.php?p_id=<?php echo $fetch_product['p_id']; ?>" class="btn-buy">
        <i class="fa-solid fa-bolt"></i> Buy Now
      </a>
    </div>
   
            
         </div>
    
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
                   $select_products = mysqli_query($con, "SELECT * FROM `products`  WHERE category_name='sharee'");
              ?>

<div class="pro-container">
<?php

        if(mysqli_num_rows($select_products) > 0){
          while($fetch_product = mysqli_fetch_assoc($select_products)){ 
            ?>
      
         <div class="pro">
     
  
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

             <!-- Buttons -->
    <div class="product-buttons">

 <!-- Hidden data attributes for JavaScript -->
       <button class="btn-cart addToCartBtn"
        data-id="<?php echo $fetch_product['p_id']; ?>"
        data-name="<?php echo $fetch_product['p_name']; ?>"
        data-image="<?php echo $fetch_product['p_image']; ?>"
        data-price="<?php echo $fetch_product['p_price']; ?>">
        <i class="fa-solid fa-cart-shopping"></i> Add to Cart
    </button>


    
      <a href="direct_checkout.php?p_id=<?php echo $fetch_product['p_id']; ?>" class="btn-buy">
        <i class="fa-solid fa-bolt"></i> Buy Now
      </a>
    </div>
   
                
 <!-- Hidden data attributes for JavaScript -->
 

            
         </div>
        
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="js/add_to_cart.js"></script>



</body>

<?php
include('include/footer.php'); 
  ?>
<style>
/* Product Container (optional for neat padding) */

#product1 .pro .cart button {
    position: relative;
    display: flex;
    justify-content: space-between;
    gap: 10px;
    padding: 5px;
    width: 100%;
}
/* Product Container (optional for neat padding) */
.pro {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 15px;
  border-radius: 12px;
  box-shadow: 0 0 12px rgba(0, 0, 0, 0.05);
  background: #fff;
  transition: transform 0.3s;
}

.pro:hover {
  transform: translateY(-5px);
}

/* Button Group Styling */
#product1 .pro .product-buttons {
  display: flex;
  justify-content: space-between;
  margin-top: 12px;
  gap: 10px;
}

/* Shared Button Styles */
.btn-cart,
.btn-buy {
  flex: 1;
  padding: 10px 0;
  font-size: 14px;
  font-weight: 600;
  border: none;
  border-radius: 8px;
  text-align: center;
  cursor: pointer;
  transition: background-color 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  text-decoration: none;
  color: white;
}

/* Specific Button Colors */
.btn-cart {
  background-color: #00bcd4;
}
.btn-cart:hover {
  background-color: #00a3b3;
}

.btn-buy {
  background-color: #f44336;
}
.btn-buy:hover {
  background-color: #d32f2f;
}

/* Responsive */
@media (max-width: 768px) {
  .product-buttons {
    flex-direction: column;
  }

  .btn-cart,
  .btn-buy {
    width: 100%;
  }
}
</style>