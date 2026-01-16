<?php
include('connection.inc.php');
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

$uid = $_SESSION['uid'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_pic'])) {
    $file = $_FILES['profile_pic'];
    $filename = time() . '_' . $file['name'];
    $destination = 'uploads/' . $filename;

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        $query = "UPDATE users SET profile_pic = ? WHERE u_id = ?"; // upload image
        $stmt = $con->prepare($query);
        $stmt->bind_param("si", $filename, $uid);
        $stmt->execute();
        $stmt->close();
    }
}

header("Location: profile.php");
exit();
?>
