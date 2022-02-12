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
	 	<h2>Selling List</h2>
	 	<div class="col-md-12">
	 		<a title="Check to delete from list" data-toggle="modal" data-target="#_removes	" id="delete"  class="btn btn-danger"><i class="fa fa-trash"></i>
			</a>
	 		<form method="post" action="remove-selling.php">
	 		<table class="table table-hover" id="table">
	 			<thead> 
	 				<tr>
	 					<th></th>
	 					<th>Animal No</th>
	 					<th>Animal Name</th>
	 					<th>Breed</th>
	 					<th>Price</th>
	 				</tr>
	 			</thead>
	 			<tbody>
	 				<?php

	 				$get = $db->query("SELECT * FROM selling");
	 				$res = $get->fetchAll(PDO::FETCH_OBJ);
	 				foreach($res as $n){ ?>
                         <tr>
                         	<td>
                         		<input type="checkbox" name="selector[]" value="<?php echo $n->animalno ?>">
                         	</td>
                         	<td> <?php echo $n->animalno; ?> </td>
                         	<td>  <?php echo $n->animalname; ?> </td>
                         	<td><?php echo $n->breed; ?> </td>
                         	<td> <?php echo $n->price; ?> </td>
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