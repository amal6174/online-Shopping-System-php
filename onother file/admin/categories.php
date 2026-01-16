<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Category </h4>
                           <h4 class="box-link">  <button><a href="manage_category.php" style="text-decoration: none;">Add Category  </a></button></h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>                           
                                       <th>Category</th>
                                         <th></th>   
                                         <th></th>                                                                     
                                    </tr>
                                 </thead>
                                 <tbody>
<!--  <?php 
							                 $i=1;
							                 while($row=mysqli_fetch_assoc($res)){?>
							                 <tr>
                                       <td class="serial"><?php echo $i++ ?></td>
                                       <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['category']?></td>
                                        <td ><?php
						                 		if($row['Status']==1){
							             		echo "<span class='badge badge-complete'><a href='?type=Status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp";
							               	}else{
								              	echo "<span class='badge badge-pending'><a href='?type=Status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp";
							                	}					
								                echo "<span class='badge badge-edit'><a href='manage_category.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
							                   	echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
							               	?>  -->
                                        </td>
                                       <td>
                                          
                                       </td>
                                    </tr>
                                    <?php } ?>
                                    
                                  
                                    
                                    
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