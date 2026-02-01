<?php

include('connection.inc.php');
session_start();


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="header">
    <nav class="navbar">
        <a href="index.php">
        <img src="include/fashionMitra.png" alt="" class="navbar-logo"></a>
        
        <!-- Hamburger Menu Button -->
        <div class="menu-icon" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </div>
    </nav>

    <div>
      <form method="GET" action="search.php" style="display: flex;">
        <input type="text" name="search" placeholder="Search products..." style="padding: 5px; border-radius: 5px 0 0 5px; border: none; width: 250px;">
        <button type="submit" style="padding: 5px 10px; background-color: black; color: white; border: none; border-radius: 0 5px 5px 0;">Search</button>
      </form>
    </div>

    <!-- Navigation Links -->
    <ul id="navbar">
        <li><a class="active" href="index.php"><i class=""></i> Women</a></li>
        <li><a class="active" href="men_dress.php"><i class=""></i> Men</a></li>
      
        <li><a href="about.php" class="active"><i></i> about</a></li>
        <li><a class="active" href="cart.php"><i class="fa-solid fa-bag-shopping"></i> Cart</a></li>

        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- Profile Icon -->
            <li class="dropdown">
                <a href="#" class="profile-icon">
                    <i class="fa-solid fa-user"></i> 
                </a>
                <ul class="dropdown-menu">
                    <li><a href="profile.php">My Profile</a></li>
                    <li><a href="my_orders.php">My Orders</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        <?php else:?>
            <li><a href="login.php"><i class="fa fa-fw fa-user"></i> Login</a></li>
        <?php endif;?>
 </ul>
</div>

</script>
</script>

</script>
</script>
</body>
</html>

            




<style>
    /* Hamburger Menu Button */
.menu-icon {
    display: none;
    font-size: 24px;
    cursor: pointer;
    color: white;
}

/* Responsive Styles */
@media screen and (max-width: 768px) {
    .menu-icon {
        display: block;
    }

    #navbar {
        display: none;
        flex-direction: column;
        width: 100%;
        background:rgb(33, 58, 99);
        position: absolute;
        top: 90px;
        left: 0;
        z-index: 999;
        text-align: center;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    #navbar.show {
        display: flex;
    }

    #navbar li {
        padding: 15px 0;
        width: 100%;
    }
}

</style>






<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

#header {
       background-color: #1e1e2f;
    color: white;
    padding: 20px 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    height: 90px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 50px;
   background: #514DAF; */
 background:#E7E3E3;  */
    background:#1bc4de;
    box-shadow: 0 5px 15px #5463a5;
    border-radius: 2px;
    z-index: 999;
    position: sticky;
    top: 0;
    left: 0;
    width: 100%;
}

.navbar {
    display: flex;
    align-items: center;
}

.navbar-logo {
    height: 100px;
    width: 180px;
}

#navbar {
    display: flex;
    align-items: center;
    justify-content: center;
}

#navbar li {
    list-style: none;
    padding: 0 20px;
}

#navbar li a {
    text-decoration: none;
    font-size: 16px;
    font-weight: 400;
    
    transition: color 0.3s ease;
}

#navbar li a:hover {
    color: #0F4547;
}

.search-box {
    height: 40px;
    display: flex;
    align-items: center;
    background-color: #2c2f38;
    padding: 8px 16px;
    border-radius: 50px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.search-input {
    border: none;
    outline: none;
    background: none;
    color: white;
    height: 15px;
    padding: 5px;
    font-size: 16px;
    width: 330px;
}

.search-button {
    background: none;
    border: none;
    cursor: pointer;
    margin-left: 20px;
}

.search-button img {
    width: 24px;
    height: 24px;
}

/* Responsive Design */
@media screen and (max-width: 1024px) {
    #header {
        padding: 15px 20px;
    }
    #navbar li {
        padding: 0 15px;
    }
    .search-input {
        width: 250px;
    }
}

@media screen and (max-width: 768px) {
    #header {
        flex-direction: column;
        height: auto;
        padding: 10px;
    }
    #navbar {
        flex-direction: column;
        width: 100%;
        text-align: center;
    }
    #navbar li {
        padding: 10px 0;
    }
    .search-box {
        width: 100%;
        justify-content: center;
    }
    .search-input {
        width: 200px;
    }
}

@media screen and (max-width: 480px) {
    #header {
        padding: 10px;
    }
    .navbar-logo {
        height: 40px;
        width: 80px;
    }
    .search-box {
        flex-direction: column;
        align-items: center;
        width: 100%;
        padding: 5px;
    }
    .search-input {
        width: 150px;
        font-size: 14px;
    }
    #navbar li a {
        font-size: 14px;
    }
}

  #navbar {
    list-style: none;
    display: flex;
    align-items: center;
}

#navbar li {
    margin: 0 10px;
    position: relative;
}

.profile-icon {
    font-size: 20px;
    color: white;
    text-decoration: none;
    padding: 5px 10px;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 30px;
    right: 0;
    background: white;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 10px;
    list-style: none;
    width: 150px;
    z-index: 999;
}

.dropdown-menu li {
    padding: 8px 10px;
}

.dropdown-menu li a {
    text-decoration: none;
    color: black;
    display: block;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

</style>
            