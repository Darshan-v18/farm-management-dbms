<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php include 'session.php'; ?>



<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:200px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Animal Management</b></h5>
  </header>
 
 <?php include 'inc/data.php'; ?>

 
 <div class="w3-container" style="padding-top:22px">
	 <div class="w3-row">
	 	<h2>Health Status</h2>
	 	<div class="col-md-6">
	 		<a title="Check to delete from list" data-toggle="modal" data-target="#_removed" id="delete"  class="btn btn-danger"><i class="fa fa-trash"></i>
			</a>
	 		<form method="post" action="delete_breed.php">
	 		<table class="table table-hover table-bordered" id="table">
	 			<thead>
	 				<tr>
	 					<th></th>
	 					<th>ID</th>
	 					<th>Animal</th>
						 <th>Health status</th>
	 				</tr>
	 			</thead>
	 			<tbody>
	 				<?php

	 				$get = $db->query("SELECT * FROM pigs");
	 				$res = $get->fetchAll(PDO::FETCH_OBJ);
	 				foreach($res as $n){ ?>
                         <tr>
                         	<td>
                         		<input type="checkbox" name="selector[]" value="<?php echo $n->id ?>">
                         	</td>
                         	<td> <?php echo $n->animalno; ?> </td>
							 <td>  <?php echo $n->animalname; ?> </td>
                         	<td>  <?php echo $n->health_status; ?> </td>
                             
               
                         </tr>
	 				<?php }

	 				?>
	 			</tbody>
	 		</table>

	 		<?php include('inc/modal-delete.php'); ?>
	 	</form>
	 	</div>

	 	
	 	 </div>
</div>

	 	</div>


<?php include 'theme/foot.php'; ?>