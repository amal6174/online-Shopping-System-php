<?php
include('include/nav.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="include/profile.css">
</head>
<body>

<div class="profile-container">
    <h2>Edit Profile</h2>

    <?php if (isset($error_msg)) { echo "<p style='color: red;'>$error_msg</p>"; } ?>

    <form action="update_profile.php" method="POST" enctype="multipart/form-data">
    <label for="profile_image">Profile Image:</label>
    <input type="file" name="profile_image" id="profile_image" accept="image/*">
    
    <label for="name">Name:</label>
    <input type="text" name="name" value="Amal Barman">

    <label for="email">Email:</label>
    <input type="email" name="email" value="barmanamal140@gmail.com">

    <label for="phone">Phone:</label>
    <input type="text" name="phone" value="">

    <label for="address">Address:</label>
    <input type="text" name="address">

    <button type="submit">Save Changes</button>
</form>

    <a href="profile.php" class="back-btn">Back to Profile</a>
</div>

</body>
</html>
<style>form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

label {
    font-weight: bold;
    margin-top: 5px;
}

input, textarea {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
}

button {
    background-color: #1bc4de;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 10px;
}

button:hover {
    background-color: #0a96ab;
}

.back-btn {
    display: block;
    text-align: center;
    margin-top: 10px;
    color: #007bff;
    text-decoration: none;
}
</style>