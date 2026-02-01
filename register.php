<?php
include('connection.inc.php'); 



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #e3f2fd;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .container {
            width: 100%;
            max-width: 380px;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        /* Input Field */
        .input-group {
            position: relative;
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
        }

        .input-group input:focus {
            border-color: #0288d1;
            box-shadow: 0 0 5px rgba(2, 136, 209, 0.5);
        }

        /* Verify Button */
        .btn {
            width: 100%;
            background: #0288d1;
            border: none;
            padding: 12px;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn:hover {
            background: #026aa7;
            transform: scale(1.03);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enter OTP</h2>
        <form method="POST" action="">
            <div class="input-group">
                <label for="otp">OTP Code</label>
                <input type="text" name="otp" id="otp" required placeholder="Enter OTP">
            </div>
            <button type="submit" class="btn" name="register">Verify OTP</button>
        </form>
    </div>
</body>
</html>
<?php endif; ?>
