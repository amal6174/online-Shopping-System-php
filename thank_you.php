<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="styles.css">
    <style>* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    text-align: center;
}

.thank-you-container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

h1 {
    font-size: 36px;
    color: #0066cc;
    margin-bottom: 20px;
}

p {
    font-size: 18px;
    color: #333;
    margin-bottom: 30px;
}

.home-btn {
    padding: 10px 20px;
    background-color: #0066cc;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.home-btn:hover {
    background-color: #005bb5;
}
</style>
</head>
<body>

    <div class="thank-you-container">
        <h1>Thank You!</h1>
        <p>We have received your message and will get back to you shortly.</p>
        <a href="index.php" class="home-btn">Go Back to Home</a>
    </div>

</body>
</html>
