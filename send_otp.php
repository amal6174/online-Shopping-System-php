<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include('connection.inc.php');

if (isset($_POST['send_otp'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $otp = rand(100000, 999999);

    // Check if email exists
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        mysqli_query($con, "UPDATE users SET otp='$otp' WHERE email='$email'");
    } else {
        mysqli_query($con, "INSERT INTO users (email, otp) VALUES ('$email', '$otp')");
    }

    // Send OTP using Gmail SMTP
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'barmanamal140@gmail.com';     // 👉 Your Gmail address
        $mail->Password   = 'yksbxbgfgatbxwbp';        // 👉 App password (not Gmail password)
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('barmanamal140@gmail.com', 'OTP Verification');
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body    = "Your OTP is <b>$otp</b>";

        $mail->send();

        echo "OTP sent to your email.";
        echo "<form action='verify_otp.php' method='POST'>
                <input type='hidden' name='email' value='$email'>
                <input type='text' name='otp' placeholder='Enter OTP'>
                <button type='submit' name='verify_otp'>Verify</button>
              </form>";
    } catch (Exception $e) {
        echo "Failed to send OTP. Error: {$mail->ErrorInfo}";
    }
}
?>