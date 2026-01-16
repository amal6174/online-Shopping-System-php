<?php
require('top.inc.php');


$limit = 5; // Records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $limit;

// Fetch records with limit
$sql = "SELECT * FROM products LIMIT $start_from, $limit";
$result = mysqli_query($con, $sql);
?>

<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Products </h4>
				   <h4 class="box-link"><a href="manage_product.php">Add Product</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							
							<tr>
					
							   <th>ID</th>
							   <th>Categories</th>
							   <th>Image</th>
							   <th>Name</th>
							
							   <th>MRP</th>
							   <th>Price</th>
							   <th>Qty</th>
							   <th>ml</th>
							   <th></th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
						 <?php
						   while ($row = mysqli_fetch_assoc($result)) { 
							?>
							<tr>
							   <td class="serial"><?php echo $row['p_id']; ?></td>
							   <td><?php echo $row['category_name']?></td>
							   <td> <img src="uploaded_img/<?php echo $row['p_image']; ?>" alt=""></td>
							   <td><?php echo $row['p_name']?></td>
							   <td><?php echo $row['mrp']?></td>
							   <td><?php echo $row['p_price']?></td>
							   <td><?php echo $row['qty']?></td>
							   <td>Active</td>
							   <td>
								<div>
								edit
								</div>
								<div>delete</div>
							   </td>
							   
							</tr>
							<?php
							}
							?>
						 </tbody>
					  </table>					
				   </div>
				</div>
			 </div>

			                     <nav>
                                         <ul class="pagination">
                                            <?php
                                                  $result = mysqli_query($con, "SELECT COUNT(p_id) FROM products");
                                                  $row = mysqli_fetch_row($result);
                                                  $total_records = $row[0];
                                                  $total_pages = ceil($total_records / $limit);
  
                                                   for ($i = 1; $i <= $total_pages; $i++) {
                                                         $active = ($i == $page) ? 'active' : '';
                                                         echo "<li class='page-item $active'><a class='page-link' href='product.php?page=$i'>$i</a></li>";
                                                   }
                                                ?>
                                         </ul>
                                 </nav>

	
		  </div>
	   </div>	  
	</div>
</div>

<?php
require('footer.inc.php');
?>