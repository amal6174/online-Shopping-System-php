<?php
session_start();
include "include/connection.inc.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

if(isset($_POST['place_order'])){

    $u_id = $_SESSION['user_id'];
    $p_id = $_POST['p_id'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $payment = $_POST['payment_method'];

    $total = $price * $qty;

    /* 1️⃣ SAVE ADDRESS */
    $addr = $con->prepare("
        INSERT INTO user_addresses
        (u_id, full_name, phone, address, district, state, pincode)
        VALUES (?,?,?,?,?,?,?)
    ");
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

    /* 2️⃣ CREATE ORDER */
    $status = "Pending";
    $date = date("Y-m-d H:i:s");

    $order = $con->prepare("
        INSERT INTO orders
        (u_id, address_id, total_amount, payment_method, order_status, created_at)
        VALUES (?,?,?,?,?,?)
    ");
    $order->bind_param(
        "iissss",
        $u_id,
        $address_id,
        $total,
        $payment,
        $status,
        $date
    );
    $order->execute();
    $order_id = $con->insert_id;

    /* 3️⃣ PRODUCT DETAILS */
    $p = $con->query("SELECT * FROM products WHERE p_id=$p_id")->fetch_assoc();

    /* 4️⃣ ORDER ITEMS */
    $item = $con->prepare("
        INSERT INTO order_items
        (order_id, p_id, product_name, product_price, product_quantity)
        VALUES (?,?,?,?,?)
    ");
    $item->bind_param(
        "iisdi",
        $order_id,
        $p_id,
        $p['p_name'],
        $p['p_price'],
        $qty
    );
    $item->execute();

    header("Location: order_success.php?order_id=".$order_id);
    exit;
}
