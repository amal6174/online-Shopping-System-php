<?php
session_start();
include "include/connection.inc.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

if(isset($_POST['place_order'])){

    $u_id = $_SESSION['user_id'];

    // 1️⃣ Insert address
    $addr = $con->prepare(
        "INSERT INTO user_addresses
        (u_id, full_name, phone, address, district, state, pincode)
        VALUES (?, ?, ?, ?, ?, ?, ?)"
    );
    $addr->bind_param(
        "issssss",
        $u_id,
        $_POST['full_name'],
        $_POST['phone'],
        $_POST['address'],
        $_POST['district'],
        $_POST['state'],
        $_POST['pincode']
    );
    $addr->execute();
    $address_id = $con->insert_id;

    // 2️⃣ Fetch cart
    $cart = $con->prepare("SELECT * FROM cart WHERE u_id=?");
    $cart->bind_param("i",$u_id);
    $cart->execute();
    $items = $cart->get_result();

    if($items->num_rows == 0){
        header("Location: cart.php");
        exit;
    }

    // 3️⃣ Calculate total
    $total = 0;
    while($c = $items->fetch_assoc()){
        $total += $c['product_price'] * $c['product_quantity'];
    }

    // 4️⃣ Insert order (ADDRESS FK)
    $order = $con->prepare(
        "INSERT INTO orders (u_id, address_id, total_amount, payment_method)
         VALUES (?, ?, ?, ?)"
    );
    $order->bind_param(
        "iids",
        $u_id,
        $address_id,
        $total,
        $_POST['payment_method']
    );
    $order->execute();
    $order_id = $con->insert_id;

    // 5️⃣ Insert order items
    $items->data_seek(0);
    while($c = $items->fetch_assoc()){
        $oi = $con->prepare(
            "INSERT INTO order_items
            (order_id, p_id, product_name, product_price, product_quantity)
            VALUES (?, ?, ?, ?, ?)"
        );
        $oi->bind_param(
            "iisdi",
            $order_id,
            $c['p_id'],
            $c['product_name'],
            $c['product_price'],
            $c['product_quantity']
        );
        $oi->execute();
    }

    // 6️⃣ Clear cart
    $clear = $con->prepare("DELETE FROM cart WHERE u_id=?");
    $clear->bind_param("i",$u_id);
    $clear->execute();

    header("Location: order_success.php");
}
