<?php
require('connection.inc.php');
require('function.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	header('location:login.php');
	die();
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

      
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>

                  
                  <li class="">
                     <a href="index.php" > Dashboard</a>
                  </li>

                  <?php if($_SESSION['ADMIN_ROLE']!=1){?>
                  <li class="menu-item-has-children dropdown">
                     <a href="sell.php" > Sell Detail</a>
                  </li>                
                

                  <li class="menu-item-has-children dropdown">
                     <a href="banner.php" > Banner Manage</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="category.php" > Categories Manage</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="sub_category.php" > Sub Categories Manage</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="users.php" > Users Manage</a>
                  </li><li class="menu-item-has-children dropdown">
                     <a href="coupon_master.php" > Coupon Code Manage</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="contact_us.php" > Contact Us</a>
                  </li>
                  <?php } ?>

                  <li class="menu-item-has-children dropdown">
                     <a href="product.php" > Products Manage</a>
                  </li>
				      <li class="menu-item-has-children dropdown">
                     <a href="order.php" > Orders Manage</a>
                  </li>

               
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" href="index.php"><img src="image/logo.png" alt="Logo"></a>
                  <a class="navbar-brand hidden" href="index.php"><img src="images/logo2.png" alt="Logo"></a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
            <div class="container">
             <div class="d-flex justify-content-end mt-3">
           <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome 
            </button>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>
         </header>