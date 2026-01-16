<?php
require('top.inc.php');

if (isset($_GET['type']) && $_GET['type'] == 'delete'){
	$id=get_safe_value($con,$_GET['id']);
	$delete="DELETE FROM contact_us WHERE id=$id";
	mysqli_query($con,$delete);

}




?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Contact Us </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							
							   <th>ID</th>
							   <th>Name</th>
							   <th>Email</th>
							   <th>Mobile</th>
							   <th>Query</th>
							   <th>Date</th>
							   <th>action</th>
							
							</tr>
						 </thead>
						 <tbody>
							<?php
							$sql="SELECT * FROM contact_us ORDER BY id desc";
							$rel=mysqli_query($con,$sql);
							while($row= mysqli_fetch_assoc($rel)){
							?>
							<tr>
							   <td class="serial"><?php echo $row['id'];?></td>
							   
							   <td><?php echo $row['name'];?></td>
							   <td><?php echo $row['email'];?></td>
							   <td><?php echo $row['mobile'];?></td>
							   <td><?php echo $row['comment'];?></td>
							   <td><?php echo $row['added_on'];?></td>
							  <td><?php  echo  "<a href='?type=delete&id=".$row['id']."'>Delete</a> </div>";  ?></td>
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