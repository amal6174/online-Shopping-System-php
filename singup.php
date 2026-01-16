<?php

include('connection.inc.php'); // Ensure this is correct\



session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $otp = rand(100000, 999999);

    // Database connection
    
    $check = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        mysqli_query($con, "UPDATE users SET otp='$otp', is_verified=0 WHERE email='$email'");
    } else {
        mysqli_query($con, "INSERT INTO users (email, otp) VALUES ('$email', '$otp')");
    }

    // Send OTP via PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'barmanamal140@gmail.com';   // 🔹 Replace with your Gmail
        $mail->Password   = 'yksbxbgfgatbxwbp';     // 🔹 App password from Step 2
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('barmanamal140@gmail.com', 'FashionM Mitra');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Signup';
        $mail->Body    = "Your OTP is <b>$otp</b>";

        $mail->send();

        $_SESSION['email'] = $email;
        header("Location:verify_signup_otp.php");
        exit();

    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
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
            <input type="phone" placeholder="phone" name="phone" class="input">
          </div>
          <div class="field input-field">
            <input type="password" placeholder="Password" name="password" class="password">
            <i class='bx bx-hide eye-icon'></i>
          </div>
         
          <div class="field button-field">
            <button type="submit" >sing Up</button>
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