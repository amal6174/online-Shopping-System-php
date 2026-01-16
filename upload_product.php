<?php
include 'connection.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $description = $_POST['product_description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category_id = $_POST['category_id'];
    
    // Image Upload Handling
    $image = $_FILES['image']['name'];
    $target_dir = "admin/uploaded_img/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    $sql = "INSERT INTO products (product_name, product_description, price, stock, category_id, image_url)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssdiis", $product_name, $description, $price, $stock, $category_id, $target_file);

    if ($stmt->execute()) {
        echo "Product uploaded successfully!";
    } else {
        echo "Error: " . $con->error;
    }

    $stmt->close();
    $con->close();
}
?>
