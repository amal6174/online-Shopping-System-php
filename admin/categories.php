<?php
require('top.inc.php');


if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['categories_id']);

		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status="update categories set status='$status' where categories_id=$id";
		mysqli_query($con,$update_status);

	}
}




if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);

    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['categories_id']);
        $delete_sql = "DELETE FROM categories WHERE categories_id=$id";
        mysqli_query($con, $delete_sql);
    }
}

$sql = "SELECT * FROM categories ORDER BY category_name DESC, categories_id ASC";


// $sql="SELECT * FROM categories ORDER BY category_name desc by categories_id";


// $sql="SELECT * FROM categories ORDER BY category_name desc by categories_id";
$result=mysqli_query($con,$sql);
?>

<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Categories </h4>
				   <h4 class="box-link"><a href="manage_categories.php">Add Categories</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
						
							<tr>
						
							   <th>ID</th>
							   <th>Categories</th>
							   <th>Status</th>
							   <th>Action</th> 
							</tr>
						 </thead>

						 <tbody>
						 <?php
						 while($row = mysqli_fetch_assoc($result)) { ?>
                        </tr>
							   <td class="serial"><?php echo $row['categories_id'];?></td>
							   <td><?php echo $row['category_name'];?></td>

							   <td>  <?php 
							             if($row['status']==1){
											echo "<a href='?type=status&operation=deactive&categories_id=".$row['categories_id']."'>Deactivate</a>";
										}else{
											echo "<a href='?type=status&operation=active&categories_id=".$row['categories_id']."'>Activate</a>";
										}
										 ?>  
								</td>
								<div class="">
							   <td>	
							   <?php 
							   echo "<a  class='btn btn-sm btn-danger' href='?type=delete&categories_id=". htmlspecialchars($row['categories_id']) ."'>Delete</a> </div>";  
                                  
							
							 
				        echo "<div><a class='btn btn-sm btn-primary' href='manage_categories.php?categories_id=" . htmlspecialchars($row['categories_id']) . "'>Edit</a></div>";

							 
							   ?>
							 
							  
							    </td>
							
								  </div>
							
							  
							</tr>
						<?php }?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>