<?php
include('connection.inc.php');


session_start();

if (isset($_POST['verify_otp'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $otp = mysqli_real_escape_string($con, $_POST['otp']);

    $query = "SELECT * FROM users WHERE email='$email' AND otp='$otp'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        mysqli_query($con, "UPDATE users SET is_verified=1 WHERE email='$email'");
        $_SESSION['email'] = $email;
        header("Location:index.php");
    } else {
        echo "Invalid OTP!";
    }
}
?>


