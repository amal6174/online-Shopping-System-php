<?php
include('connection.inc.php');
require('top.inc.php');






if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);

    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['u_id']);
        $delete_sql = "DELETE FROM users WHERE u_id=$id";
        mysqli_query($con, $delete_sql);
    }
}






?>


<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Users </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							     <th class="avatar">Avatar</th>
							   <th>Name</th>
							   <th>Email</th>
							   <th>Mobile</th>
							   <th>Date</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							

<?php	
$serial = 1; 					 
$sql = "SELECT * FROM users"; // Your table name
$result = mysqli_query($con, $sql); // Use your DB connection variable ($con)

if ($result && mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
       
  
?>
							<tr>
							   <td class="serial"><?php echo $serial++; ?></td>

							   <td><?php echo $row['u_id'] ?> </td>
							    <td class="avatar">
                                            <img src="images/avatar/7.png" 
       alt="logo" 
       class="rounded-circle shadow" 
       style="width: 50px; height: 50px; object-fit: cover;">
                                       </td>
							   <td> <?php echo $row['u_name']; ?></td>
							   <td><?php echo $row['email']; ?></td>
							   <td><?php echo $row['phone']; ?></td>
							   <td><?php echo $row['added_on']?></td>
							   <td>	<?php 
							   echo "<a  class='btn btn-sm btn-danger' href='?type=delete&u_id=". htmlspecialchars($row['u_id']) ."'>Delete</a> </div>";  ?>  </td>
							</tr>
							<?php
   }
} 
							?>
							
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