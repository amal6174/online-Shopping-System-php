<?php
include "connection.inc.php";
session_start();

?>
<!-- Show message if login fails -->
<p style="color:red;"><?php ?></p>



<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Responsive Login and Signup Form </title>
  <!-- CSS -->
  <link rel="stylesheet" href="css/login.css">
  <!-- Boxicons CSS -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <section class="container forms">
    <div class="form login">
      <div class="form-content">
        <header>Login</header>
        <form action="send_otp.php" method="POST">
          <div class="field input-field">
            <input type="email" placeholder="Email" name="email" class="input">
          </div>
          
          <div class="form-link">
            <a href="#" class="forgot-pass">Forgot password?</a>
          </div>
          <div class="field button-field">
            <button type="submit" name="send_otp">Login</button>
          </div>
        </form>
        <div class="form-link">
          <span>Don't have an account? <a href="singup.php" class="link signup-link">Signup</a></span>
        </div>
      </div>
      <div class="line"></div>
      <div class="media-options">
        <a href="#" class="field facebook">
          <i class='bx bxl-facebook facebook-icon'></i>
          <span>Login with Facebook</span>
        </a>
      </div>
      <div class="media-options">
        <a href="#" class="field google">
          <img src="images/google.png" alt="" class="google-img">
          <span>Login with Google</span>
        </a>
      </div>
    </div>







    
  </section>
  <!-- JavaScript -->

</body>
</html>