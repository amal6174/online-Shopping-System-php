<?php
include('include/nav.php');
include('connection.inc.php');
?>
  



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="circle/stylec.css">
   <link rel="stylesheet"     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
   <link rel="stylesheet"     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/brands.min.css">
  

  
    
</head>

<body>






 



  <section id="hero">
  
    
    <h4>trade-in-offer</h4>
    <h2>Super value deals</h2>
    <h1>On all products</h1>
    <p>Save more with coupons & up to 70% off</p>
    <button>Shop Now</button>

  </section>





  <!-- Circle category section  -->
    
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



<!-- start product -->
<?php
      
      $select_products = mysqli_query($con, "SELECT * FROM `products`");
     
      ?>
  <section id="product1" class="section-p1">
    <p>Featured Products</p>
    <p>Summmer Collection New Modern Designed</p>
       <div class="pro-container">
        <form>
         <div class="pro">

           <img src="admin/uploaded_img/<?php echo $fetch_product['image'];?>" alt="">
            <div class="des">
              <span>Zara</span>
                <h5><?php echo $fetch_product['name']; ?></h5>
                  <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                  </div>
                  <h4>$78</h4>
            </div>

               <div class="cart">
                 <a href="">   <i  class="fas fa-shopping-cart"></i> </a> <!-- Use Font Awesome for cart icon -->
                </div>
         </div>
         </form>
    
         <form>
          <?php
           if(mysqli_num_rows($select_products) > 0){
            while($fetch_product = mysqli_fetch_assoc($select_products)){ 
          ?>
       <div class="pro">

        <img src="admin/uploaded_img/<?php echo $fetch_product['image'];?>" alt="">
        <div class="des">
          <span>Zara</span>
          <h5><?php echo $fetch_product['name']; ?></h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>$78</h4>

        </div>
        <div class="cart">
          <a href="">   <i  class="fas fa-shopping-cart"></i> </a> <!-- Use Font Awesome for cart icon -->
      </div>
      </div>
     <?php  }
     } ?>
      </form>
      <div class="pro">

        <img src="admin/uploaded_img/<?php echo $fetch_product['image'];?>"alt="">
        <div class="des">
          <span>Zara</span>
          <h5><?php echo $fetch_product['name']; ?></h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>$78</h4>

        </div>
        <div class="cart">
          <a href="">   <i  class="fas fa-shopping-cart"></i> </a> <!-- Use Font Awesome for cart icon -->
      </div>
      </div>

      <div class="pro">

        <img src="admin/uploaded_img/<?php echo $fetch_product['image'];?>" alt="">
        <div class="des">
          <span>Zara</span>
          <h5>Cartoon Astronaut Dress</h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>$78</h4>

        </div>

        <div class="cart">
          <a href="">   <i  class="fas fa-shopping-cart"></i> </a> <!-- Use Font Awesome for cart icon -->
      </div>
      </div>
      <div class="pro">

        <img src="item/item5.jpg" ajpglt="">
        <div class="des">
          <span>Zara</span>
          <h5>Cartoon Astronaut Dress</h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>$78</h4>

        </div>
        <div class="cart">
          <a href="">   <i  class="fas fa-shopping-cart"></i> </a> <!-- Use Font Awesome for cart icon -->
      </div>
      </div>
      <div class="pro">

        <img src="item/item6.jpg" alt="">
        <div class="des">
          <span>Zara</span>
          <h5>Cartoon Astronaut Dress</h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>$78</h4>

        </div>
        <div class="cart">
          <a href="">   <i  class="fas fa-shopping-cart"></i> </a> <!-- Use Font Awesome for cart icon -->
      </div>
      </div>
      <div class="pro">

        <img src="item/item7.jpg" alt="">
        <div class="des">
          <span>Zara</span>
          <h5>Cartoon Astronaut Dress</h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>$78</h4>

        </div>
        <div class="cart">
          <a href="">   <i  class="fas fa-shopping-cart"></i> </a> <!-- Use Font Awesome for cart icon -->
      </div>
      </div>
      <div class="pro">

        <img src="item/item8.jpg" alt="">
        <div class="des">
          <span>Zara</span>
          <h5>Cartoon Astronaut Dress</h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>$78</h4>

        </div>
        <div class="cart">
          <a href="">   <i  class="fas fa-shopping-cart"></i> </a> <!-- Use Font Awesome for cart icon -->
      </div>
      </div>
    </div>




  </section>


  <section id="banner" class="section-m1">
    <h4>Repair service</h4>
    <h2>Up to<span> 70% Off</span> All Dress & Aceessories</h2>
    <button class="norman"> Explore More</button>

  </section>


  <section id="product1" class="section-p1">
    <h2>New Arrival</h2>
    <p>Summmer Collection New Modern Designed</p>
    <div class="pro-container">
      <div class="pro">

        <img src="item/item1.jpg" alt="">
        <div class="des">
          <span>Zara</span>
          <h5>Cartoon Astronaut Dress</h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>$78</h4>

        </div>
        <div class="cart">
          <a href="">   <i  class="fas fa-shopping-cart"></i> </a> <!-- Use Font Awesome for cart icon -->
      </div>
      </div>
      <div class="pro">

        <img src="item/item2.jpg" alt="">
        <div class="des">
          <span>Zara</span>
          <h5>Cartoon Astronaut Dress</h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>$78</h4>

        </div>
        <a href="cart.html"><i class="fa-solid fa-cart-shopping cart"></i></a>
      </div>
      <div class="pro">

        <img src="item/item9.webp" alt="">
        <div class="des">
          <span>Zara</span>
          <h5>Cartoon Astronaut Dress</h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>$78</h4>

        </div>
        <a href="cart.html"><i class="fa-solid fa-cart-shopping cart"></i></a>
      </div>
      <div class="pro">

        <img src="item/item9.webp" alt="">
        <div class="des">
          <span>Zara</span>
          <h5>Cartoon Astronaut Dress</h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>$78</h4>

        </div>

        <a href="cart.html"><i class="fa-solid fa-cart-shopping cart"></i></a>
      </div>
      <div class="pro">

        <img src="item/item9.webp" alt="">
        <div class="des">
          <span>Zara</span>
          <h5>Cartoon Astronaut Dress</h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>$78</h4>

        </div>
        <a href="cart.html"><i class="fa-solid fa-cart-shopping cart"></i></a>
      </div>
      <div class="pro">

        <img src="item/item9.webp" alt="">
        <div class="des">
          <span>Zara</span>
          <h5>Cartoon Astronaut Dress</h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>$78</h4>

        </div>
        <a href="cart.html"><i class="fa-solid fa-cart-shopping cart"></i></a>
      </div>
      <div class="pro">

        <img src="item/item9.webp" alt="">
        <div class="des">
          <span>Zara</span>
          <h5>Cartoon Astronaut Dress</h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>$78</h4>

        </div>
        <a href="cart.html"><i class="fa-solid fa-cart-shopping cart"></i></a>
      </div>
      <div class="pro">

        <img src="item/item9.webp" alt="">
        <div class="des">
          <span>Zara</span>
          <h5>Cartoon Astronaut Dress</h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>$78</h4>

        </div>
        <a href="cart.html"><i class="fa-solid fa-cart-shopping cart"></i></a>
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







<footer> 
  <div class="foot-panel2">
    <ul>
      <p>ABOUT</p>
      <a href="#">Contact Us</a>
      <a href="#">About Us</a>
      <a href="#">S-shope Storices</a>
      <a href="#">Press</a>
    </ul>
    <ul>
        <p>HELP</p>
        <a href="#">Payments</a>
        <a href="#">Shipping</a>
        <a href="#">Cancellation & Return</a>
        <a href="#">FAQ</a>
        
    </ul>
    <ul>
      <p>CONSUMER POLICY</p>
      <a href="#">Cancellation & Return</a>
      <a href="#">Terms of use</a>
      <a href="#">Security</a>
      <a href="#">Privacy</a>
      <a href="#">Sitemap</a>
    </ul>
    <ul>
    
     <p>Make Money with Us</p>
     <a href="#">Sell on S-shop
      <a href="#">Sell under S-shop Accelerator
        <a href="#">Protect and Build Your Brand
          <a href="#">S-shop Global Selling
            <a href="#">Become an Affiliate
              <a href="#">Fulfilment by S-shop
                <a href="#">Advertise Your Products
                  <a href="#">S-shop Pay on Merchants
                  </a>
                </a>
              </a>
            </a>
          </a>
        </a>
      </a>
    </a>


    </ul>
    <ul>
      <p>FOLLOW US</p>
      <div class="social-link">
        <a href="#"><i class="fab fa-facebook-f"></i>-facebook</a>
        <a href="#"><i class="fab fa-instagram"></i>-instagram</a>
        <a href="#"><i class="fab fa-twitter"></i>-twitter</a>
        <a href="#"><i class="fab fa-linkedin-in"></i>-linkedin-in</a>
      </div>
    </ul>
  </div> 
  </div>
  <div class="foot-panel4">
    <div class="pages">
      <a href="#">Condition Of Use</a>
      <a href="#">Privacy Notice</a>
      <a href="#">Your Ad Privecy Choices</a>
    </div>
    <div class="myc">
      © 1996-2024, S-R-marketing.com, Inc. or its affiliates
    </div>
  </div> 
</footer>







  <script src="script.js"></script>

</body>



  <?php
include('include/footer.php'); 
  ?>