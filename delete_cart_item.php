<?php
include 'connection.inc.php'; // your DB connection

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $delete = mysqli_query($con, "DELETE FROM `cart` WHERE id = $id");

    if ($delete) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
