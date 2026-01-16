<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
   $username=get_safe_value($con,$_POST['username']);
   $password=get_safe_value($con,$_POST['password']);
   $sql="SELECT * FROM admin_user WHERE username='$username' and password='$password'";
   $res=mysqli_query($con,$sql);
   $count=mysqli_num_rows($res);
   if($count>0){

      $_SESSION['ADMIN_LOGIN']='YES';
      $_SESSION['ADMIN_USERNAME']=$username;
      header('location:index.php');
      die();

   }
}

?>


<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
    <style>
       
    </style>
</head>
<body>
    <div class="background-shapes">
        <div class="shape shape1"></div>
        <div class="shape shape2"></div>
        <div class="shape shape3"></div>
    </div>


    <div class="login-container">
        <h2>Login</h2>
        <form method="POST"> 
            <div class="input-group">
                <label for="username">Username or Email Address</label>
                <input type="text" name="username" id="username" placeholder="Enter your email or username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <div class="remember-me">
                <input type="checkbox" id="remember">
                <label for="remember">Remember Me</label>
            </div>
            <button type="submit" name="submit" class="login-btn">Log in</button>
           
        </form>
        <div class="field_error"><?php echo $msg?></div>
               </div>
    </div>
</body>
</html>
