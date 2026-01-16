<?php include 'include/nav.php'; ?>



<div style="display:flex; flex-wrap:wrap; justify-content:center;">
<?php
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($con, $_GET['search']);
    $sql = "SELECT DISTINCT * FROM products WHERE p_name LIKE '%$search%'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
?>
        <div style="border:1px solid #ccc; border-radius:10px; width:250px; margin:10px; padding:15px; text-align:center; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);">
        <img src="admin/uploaded_img/<?php echo $row['p_image']; ?>" alt="Product Image" style="width:100%; height:200px; object-fit:cover; border-radius:10px;">

            <h3 style="margin:10px 0;"><?php echo $row['p_name']; ?></h3>
            <p style="color:green; font-weight:bold;">₹<?php echo $row['p_price']; ?></p>
            <a href="product_details.php?id=<?php echo $row['p_id']; ?>" style="display:inline-block; margin-top:10px; padding:10px 20px; background-color:blue; color:white; text-decoration:none; border-radius:5px;">View</a>
        </div>
<?php
        }
    } else {
        echo "<p>No products found.</p>";
    }
}
?>
</div>
