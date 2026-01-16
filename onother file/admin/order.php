<?php
include('top.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .table-container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        .status {
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            font-size: 14px;
        }
        .complete { background-color: green; }
        .pending { background-color: orange; }
    </style>
</head>
<body>
    <div class="table-container">
        <h2>Orders</h2>
        <table>
            <tr>
                <th>#</th>
                <th>Avatar</th>
                <th>ID</th>
                <th>Name</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>1</td>
                <td><img src="avatar1.jpg" class="avatar" alt="Avatar"></td>
                <td>#5469</td>
                <td>Louis Stanley</td>
                <td>IMax</td>
                <td>231</td>
                <td><span class="status complete">COMPLETE</span></td>
            </tr>
            <tr>
                <td>2</td>
                <td><img src="avatar2.jpg" class="avatar" alt="Avatar"></td>
                <td>#5468</td>
                <td>Gregory Dixon</td>
                <td>iPad</td>
                <td>250</td>
                <td><span class="status complete">COMPLETE</span></td>
            </tr>
            <tr>
                <td>3</td>
                <td><img src="avatar3.jpg" class="avatar" alt="Avatar"></td>
                <td>#5467</td>
                <td>Catherine Dixon</td>
                <td>SSD</td>
                <td>250</td>
                <td><span class="status complete">COMPLETE</span></td>
            </tr>
            <tr>
                <td>4</td>
                <td><img src="avatar4.jpg" class="avatar" alt="Avatar"></td>
                <td>#5466</td>
                <td>Mary Silva</td>
                <td>Magic Mouse</td>
                <td>250</td>
                <td><span class="status pending">PENDING</span></td>
            </tr>
            <tr>
                <td>5</td>
                <td><img src="avatar5.jpg" class="avatar" alt="Avatar"></td>
                <td>#5465</td>
                <td>Johnny Stephens</td>
                <td>Monitor</td>
                <td>250</td>
                <td><span class="status complete">COMPLETE</span></td>
            </tr>
        </table>
    </div>
</body>
</html>

</body>
</html>