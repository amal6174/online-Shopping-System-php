<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connection.inc.php'; // Database connection

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Handle profile image upload
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $target_dir = "uploads/";
        $file_name = basename($_FILES["profile_image"]["name"]);
        $target_file = $target_dir . time() . "_" . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Allow only specific file types
        $allowed_types = ["jpg", "jpeg", "png", "gif"];
        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                // Store the image path in the database
                $sql = "UPDATE users SET u_name='$name', email='$email', phone='$phone', address='$address', profile_pic='$target_file' WHERE u_id=1"; 
                mysqli_query($con, $sql);
            }
        }
    } else {
        $sql = "UPDATE users SET u_name='$name', email='$email', phone='$phone', address='$address' WHERE u_id=1"; 
        mysqli_query($con, $sql);
    }

    header("Location: profile.php"); // Redirect to profile page
}
?>
