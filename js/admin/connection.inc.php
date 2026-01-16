<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "ecom");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
