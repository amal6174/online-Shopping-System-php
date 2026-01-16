<?php
include('top.inc.php');
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
        <!DOCTYPE html>
<html>
<head>
 <title>Cards</title>
</head>

<style type="text/css">


*{
 margin: 0px;
 padding: 0px;
}
body{
 font-family: arial;
}
.main{

 margin: 2%;
}

.card{
     width: 20%;
     display: inline-block;
     box-shadow: 2px 2px 20px black;
     border-radius: 5px; 
     margin: 2%;
    }

.image img{
  width: 100%;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
  

 
 }

.title{
 
  text-align: center;
  padding: 10px;
  
 }

h1{
  font-size: 20px;
 }

.des{
  padding: 3px;
  text-align: center;
 
  padding-top: 10px;
        border-bottom-right-radius: 5px;
  border-bottom-left-radius: 5px;
}
button{
  margin-top: 40px;
  margin-bottom: 10px;
  background-color: white;
  border: 1px solid black;
  border-radius: 5px;
  padding:10px;
}
button:hover{
  background-color: black;
  color: white;
  transition: .5s;
  cursor: pointer;
}

</style>
<body>

<div class="main">

 


<div class="card">

<div class="image">
   <img src="image/product.jpg">
</div>
<div class="title">
 <h1>
Products</h1>
</div>
<div class="des">
 
<a href="product.php"><button>Manage</button></a>
</div>
</div>
<!--cards -->



<div class="card">

<div class="image">
   <img src="image/order.jpg">
</div>
<div class="title">
 <h1>
Orders</h1>
</div>
<div class="des">
<a href="order.php"><button>Manage</button></a>
</div>
</div>
<!--cards -->

<div class="card">

<div class="image">
   <img src="image/category.jpg">
</div>
<div class="title">
 <h1>
Categories</h1>
</div>
<div class="des">
 <a href="category.php"><button>Manage</button></a>
</div>
</div>
<!--cards -->

<div class="card">

<div class="image">
   <img src="image/vendor.jpg">
</div>
<div class="title">
 <h1>
Vendor Management</h1>
</div>
<div class="des">
 <a href="vendor_management.php"><button>Manage</button></a>
</div>
</div>
<!--cards -->

<div class="card">

<div class="image">
   <img src="image/user.jpg">
</div>
<div class="title">
 <h1>
Users</h1>
</div>
<div class="des">

<a href="users.php"><button>Manage</button></a>

</div>
</div>


</div>

</body>


</html>
		  </div>
	   </div>
	</div>
</div>
