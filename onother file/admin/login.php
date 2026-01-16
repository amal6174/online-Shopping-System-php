<?php
require('connection.inc.php');
require('function.inc.php');

;
$msg='';
if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,$_POST['password']);
	$sql="select * from admin_user where username='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$row=mysqli_fetch_assoc($res);
		if($row['status']=='0'){
			$msg="Account deactivated";	
		}else{
			$_SESSION['ADMIN_LOGIN']='yes';
			$_SESSION['ADMIN_ID']=$row['id'];
			$_SESSION['ADMIN_USERNAME']=$username;
			$_SESSION['ADMIN_ROLE']=$row['role'];
			header('location:index.php');
			die();
		}
	}else{
		$msg="Please enter correct login details";	
	}
	
}





?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
        }
        .login-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            height=600px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
            font-size: 18px;
            text-align: left;
        }
        .login-container input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-container button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <form method="POST">
    <div class="login-container">
        <h2>User Name</h2>
        <input type="text" name="username" placeholder="username" required>
        <h2>Password</h2>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="submit">SIGN IN</button>
        <div>
             <?php echo $msg ?>
           </div>
    
    </div>
  

    </form>

</body>
</html>
