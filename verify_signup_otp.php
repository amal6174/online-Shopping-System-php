<?php
session_start();
include('connection.inc.php'); // Ensure this is correct\
// Check if email session exists (user ne signup se aya hai)
// if (!isset($_SESSION['email']) || ! isset($_SESSION['otp'])){
//     header("Location:signup.php");
//     exit();
// }



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_SESSION['email'];
    $otp = $_POST['otp'];

    // Check OTP from database
    $check = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND otp='$otp'");

    if (mysqli_num_rows($check) > 0) {
        // Update verification status
        mysqli_query($con, "UPDATE users SET is_verified=1 WHERE email='$email'");
        
        // Clear OTP session (optional)
        unset($_SESSION['email']);
        
        echo "<h3 style='color:green;'>✅ Signup successful! You can now login.</h3>";
        // echo "<a href='login.php'>Go to Login</a>";
        header("location:login.php");
    } else {
        echo "<h3 style='color:red;'>❌ Invalid OTP. Please try again.</h3>";
    }
}
?>

<h2>Verify OTP</h2>
<form method="post">
    <input type="text" name="otp" placeholder="Enter OTP" required>
    <button type="submit">Verify</button>
</form>