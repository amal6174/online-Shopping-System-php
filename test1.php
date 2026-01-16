<?php
$servername = "localhost";  
$username = "root";         
$password = "";            
$dbname = "mydb";     

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $conn->real_escape_string($_POST['name']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data into the database
    $sql = "INSERT INTO messages (name, subject, email, phone, message)
            VALUES ('$name', '$subject', '$email', '$phone', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/test1.css">
</head>
<body>

    <div class="contact-form-container">
        <h2>Write a Message</h2>
        <form action="test1.php" method="post" class="contact-form" >
            
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>

            <label for="subject">Your Subject:</label>
            <input type="text" id="subject" name="subject" placeholder="Subject" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="phone">Your Phone:</label>
            <input type="tel" id="phone" name="phone" placeholder="Optional - Enter your phone number">

            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="6" placeholder="Type your message here" required></textarea>

            <button  type="submit" class="submit-btn" >Submit</button>
        </form>
       
    </div>
  
</body>
</html>
