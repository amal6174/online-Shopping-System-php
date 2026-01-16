<?php
include 'connection.inc.php'; // Include database connection

if (isset($_POST['submit'])) {
    $category_name = mysqli_real_escape_string($conn, trim($_POST['category_name']));
    $status = (int) $_POST['status']; // Convert status to integer

    if (!empty($category_name)) {
        $sql = "INSERT INTO categories (category_name, status) VALUES ('$category_name', $status)";
        if (mysqli_query($conn, $sql)) {
            echo "Category added successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Category name cannot be empty!";
    }
}
?>


















<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
</head>
<body>
    <h2>Add New Category</h2>
    <form action="add_category.php" method="POST">
        <label>Category Name:</label>
        <input type="text" name="category_name" required>
        
        <label>Status:</label>
        <select name="status" required>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>

        <button type="submit" name="submit">Add Category</button>
    </form>
</body>
</html>
