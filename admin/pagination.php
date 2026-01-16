<?php
$conn = mysqli_connect("localhost", "root", "", "fashion");

$limit = 5; // Records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $limit;

// Fetch records with limit
$sql = "SELECT * FROM products LIMIT $start_from, $limit";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Pagination</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2 class="mb-4">Paginated Records</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th> <!-- Optional -->
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['p_id']; ?></td>
                <td><?= $row['p_name']; ?></td>

                <td> <img src="uploaded_img/<?php echo $row['p_image']; ?>" width="70" height="70"></td>

              
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <!-- Pagination links -->
    <nav>
        <ul class="pagination">
            <?php
            $result = mysqli_query($conn, "SELECT COUNT(p_id) FROM products");
            $row = mysqli_fetch_row($result);
            $total_records = $row[0];
            $total_pages = ceil($total_records / $limit);

            for ($i = 1; $i <= $total_pages; $i++) {
                $active = ($i == $page) ? 'active' : '';
                echo "<li class='page-item $active'><a class='page-link' href='pagination.php?page=$i'>$i</a></li>";
            }
            ?>
        </ul>
    </nav>
</body>
</html>
