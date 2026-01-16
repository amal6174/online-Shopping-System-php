<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Design</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .navbar .logo {
            font-size: 20px;
            font-weight: bold;
        }
        .navbar .menu {
            display: flex;
            gap: 20px;
        }
        .navbar .menu a {
            text-decoration: none;
            color: #333;
        }
        .profile-menu {
            position: relative;
            display: inline-block;
        }
        .profile-menu img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }
        .dropdown {
            display: none;
            position: absolute;
            right: 0;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 5px;
            width: 150px;
        }
        .dropdown a {
            display: block;
            padding: 8px;
            text-decoration: none;
            color: #333;
        }
        .dropdown a:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">Tetrisly</div>
        <div class="menu">
            <a href="#">Plans</a>
            <a href="#">Apps</a>
            <button>Create</button>
        </div>
        <div class="profile-menu">
            <img src="profile.jpg" alt="Profile" onclick="toggleMenu()">
            <div class="dropdown" id="dropdownMenu">
                <a href="#">Profile</a>
                <a href="#">Integrations</a>
                <a href="#">Settings</a>
                <a href="#">Guide</a>
                <a href="#">Help Center</a>
                <a href="#">Logout</a>
            </div>
        </div>
    </div>

    <script>
        function toggleMenu() {
            var menu = document.getElementById("dropdownMenu");
            menu.style.display = menu.style.display === "block" ? "none" : "block";
        }
        window.onclick = function(event) {
            if (!event.target.matches('.profile-menu img')) {
                document.getElementById("dropdownMenu").style.display = "none";
            }
        }
    </script>
</body>
</html>
