<?php
include ('connection.inc.php');
 

if(isset($_POST['submit'])){
    $name= $_POST['name'];   
   
    $email= $_POST['email'];
     $phone = $_POST['phone'];
    
    $comment = $_POST['comment'];

$sql = "INSERT INTO contact_us (name, email, mobile, comment) 
        VALUES ('$name', '$email', '$phone', '$comment')";
    $result = mysqli_query($con,$sql);
 




         if ($result) {
        ?>
        <!-- Load SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Message Sent!',
            text: 'Thank you for contacting us.',
            confirmButtonColor: '#3085d6',
        }).then(() => {
            window.location.href = 'contuct.php';
        });
        </script>
        <?php
    } else {
        echo "Error: " . mysqli_error($con);
    }


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/contact.css" rel="stylesheet">
</head>
<body>
    
<div class="contact-section">
    <div class="contact-header">
        <h1>Get in Touch</h1>
        <p>We'd love to hear from you! Fill out the form below to contact us.</p>
    </div>

    <div class="contact-container">
        <div class="contact-form">
            <form action="contuct.php" method="POST">
                
                <label>Your Name</label>
                <input type="text" name="name" placeholder="Enter your name" required>
                
                <label>Phone</label>
                <input type="phone" name="phone" placeholder="Enter your phone Number" required>

                <label>Email Address</label>
                <input type="email" name="email" placeholder="Enter your email" required>

                <label>Message</label>
                <textarea name="comment" rows="6" placeholder="Write your message here..." required></textarea>

                <button type="submit" name="submit">Send Message</button>
            </form>
        </div>

        <div class="contact-info">
            <h2>Contact Info</h2>
            <p><strong>Address:</strong> Rangamati, Coochbehar, West Bengal</p>
            <p><strong>Email:</strong> barmanamal140@gmail.com</p>
            <p><strong>Phone:</strong> +91 9641376174</p>
            <p><strong>Office Hours:</strong> Mon-Fri, 9AM - 6PM</p>
        </div>
    </div>
</div>



<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>

<?php

include('include/footer.php');
?>