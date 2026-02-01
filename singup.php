<?php

include('connection.inc.php'); // Ensure this is correct\


if(isset($_POST['register'])){
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = $con->prepare("INSERT INTO users (u_name, email, password) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $name, $email, $pass);

    if($sql->execute()){
      echo "<script> alert('register successfull')</script>";
      
        // echo "Registration Successful";
   
    } else {
        echo "Email already exists";
    }
}



?>








<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS -->
  <link rel="stylesheet" href="css/login.css">
  <!-- Boxicons CSS -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <section class="container forms">
    <div class="form login">
      <div class="form-content">
        <header>Sing Up</header>
        <form action="singup.php" method="POST">
        <div class="field input-field">
            <input type="name" placeholder="Name" name="name" class="input">
          </div>
          <div class="field input-field">
            <input type="email" placeholder="Email" name="email" class="input">
          </div>
         
          <div class="field input-field">
            <input type="password" placeholder="Password" name="password" class="password">
            <i class='bx bx-hide eye-icon'></i>
          </div>
         
          <div class="field button-field">
            <button type="submit" name="register" >sing Up</button>
          </div>
        </form>
        <div class="form-link">
          <span>allready have an account? <a href="login.php" class="link signup-link">login</a></span>
        </div>
      </div>
      <div class="line"></div>
      <div class="media-options">
        <a href="#" class="field facebook">
          <i class='bx bxl-facebook facebook-icon'></i>
          <span>Login with Facebook</span>
        </a>
      </div>
     
    </div>







    
  </section>
  <!-- JavaScript -->

</body>
</html>