<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'custmsidebar.php'; ?>
<?php include 'custm-sess.php'; ?>



<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Animal Management</b></h5>
  </header>
    
 <!-- <?php include 'inc/data.php'; ?> -->

 
 <div class="w3-container" style="padding-top:22px">
	 <div class="w3-row">
	 	<h2>Purchase List</h2>
	 	<div class="col-md-12">
	 		<!-- <a title="Check to delete from list" data-toggle="modal" data-target="#_removes	" id="delete"  class="btn btn-danger"><i class="fa fa-trash"></i>
			</a> -->
	 		<!-- <form method="post" action="buy-query.php"> -->
	 		<table class="table table-hover" id="table">
	 			<thead> 
	 				<tr>
					 
			 <th>S/N</th>
	 					<th>Animal No</th>
	 					<th>Animal Name</th>
	 					<th>Breed</th>
	 					<th>Price</th>
                         <th>Action</th>
	 				</tr>
	 			</thead>
	 			<tbody>
	 				<?php

	 				$get = $db->query("SELECT * FROM selling ORDER BY id DESC");
	 				$res = $get->fetchAll(PDO::FETCH_OBJ);
					 $c = $get->rowCount();
			   $cnt = 1;
				if($c > 0){
	 				foreach($res as $n){ ?>
                         <tr>
						 <td><?php echo $cnt; ?></td>
                         	<td> <?php echo $n->animalno; ?> </td>
                         	<td>  <?php echo $n->animalname; ?> </td>
                         	<td><?php echo $n->breed; ?> </td>
                         	<td> <?php echo $n->price; ?> </td>
                             <td>
               <div class="button">
               <a onclick="return confirm('Continue Buying animal ?')" href="buy-query.php?id=<?php echo  $n->id; ?>"> BUY</a>
                  
                  
                  
                        
                    <!-- <li><a onclick="return confirm('Continue delete animal ?')" href="delete.php?id=<?php echo $data->id ?>"><i class="fa fa-trash"></i> Delete</a></li>
                    <li><a onclick="return confirm('Continue quarantine animal ?')" href="quarantine.php?id=<?php echo $data->id; ?>"><i class="fa fa-paper-plane"></i> Quarantine</a></li>
                    <li><a onclick="return confirm('Continue selling animal ?')" href="selling.php?id=<?php echo $data->id; ?>"><i class="fa fa-paper-plane"></i> Sell</a></li>
                  </ul> -->
                </div> 
            </td>   
                         </tr> 
	 				<?php $cnt =$cnt + 1; } }

	 				?>
	 			</tbody>
	 		</table>

	 		<?php include('inc/modal-delete.php'); ?>
	 	<!-- </form> -->
	 	</div>
	 	 </div>
</div>

</div>

<?php include 'theme/foot.php'; ?>