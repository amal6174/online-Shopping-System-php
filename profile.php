<?php

include('connection.inc.php');
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

$uid = $_SESSION['uid'];
$query = "SELECT u_name, email, phone, address, profile_pic FROM users WHERE u_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $uid);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Assign variables
$name = $user['u_name'];
$email = $user['email'];
$phone = $user['phone'];
$address = $user['address'];
$profile_pic = $user['profile_pic'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="include/profile.css">
</head>
<body>

<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <h2>My Profile</h2>
        </div>

        <div class="profile-pic">
        <img src="<?= (!empty($profile_pic) && file_exists('uploads/'.$profile_pic)) ? 'uploads/'.$profile_pic : 'uploads/amal.jpg' ?>" alt="Profile Picture">

            <form action="upload_profile_pic.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="profile_pic" accept="image/*">
                <button type="submit" class="upload-btn">Change Picture</button>
            </form>
        </div>

        <div class="profile-info">
            <h3><?= htmlspecialchars($name) ?></h3>
            <p><i class="fa fa-envelope"></i> <?= htmlspecialchars($email) ?></p>
            <p><i class="fa fa-phone"></i> <?= htmlspecialchars($phone) ?></p>
            <p><i class="fa fa-map-marker"></i> <?= htmlspecialchars($address) ?></p>
        </div>

        <div class="profile-actions">
            <a href="edit_profile.php" class="edit-btn">Edit Profile</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
</div>

</body>
</html>
<style>
    /* General Styles */
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #1bc4de, #0a96ab);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Profile Container */
.profile-container {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    text-align: center;
    width: 400px;
    animation: fadeIn 0.5s ease-in-out;
}

/* Profile Header */
.profile-header h2 {
    color: #333;
    margin-bottom: 10px;
}

/* Profile Picture */
.profile-pic {
    position: relative;
    margin: 20px 0;
}

.profile-pic img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 3px solid #1bc4de;
    transition: transform 0.3s ease-in-out;
}

.profile-pic img:hover {
    transform: scale(1.05);
}

/* File Upload */
.profile-pic input {
    display: none;
}

.upload-btn {
    background: #1bc4de;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
    font-size: 14px;
    margin-top: 10px;
}

.upload-btn:hover {
    background: #0a96ab;
}

/* Profile Info */
.profile-info {
    font-size: 16px;
    color: #555;
}

.profile-info h3 {
    color: #333;
    margin-bottom: 5px;
}

.profile-info p {
    margin: 5px 0;
}

.profile-info i {
    color: #1bc4de;
    margin-right: 5px;
}

/* Profile Actions */
.profile-actions {
    margin-top: 15px;
}

.edit-btn, .logout-btn {
    display: block;
    text-decoration: none;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    font-size: 16px;
    transition: 0.3s;
}

.edit-btn {
    background: #1bc4de;
    color: white;
}

.logout-btn {
    background: red;
    color: white;
}

.edit-btn:hover {
    background: #0a96ab;
}

.logout-btn:hover {
    background: darkred;
}

/* Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

</style>