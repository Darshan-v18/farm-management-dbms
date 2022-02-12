<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php include 'session.php'; ?>

<!-- !PAGE CONTENT! -->
<div class="" style="margin-left:200px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>
 
 <?php include 'inc/data.php'; ?>
 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
 	<h2>Recent Animals</h2>
 <div class="table-responsive">
 	<table class="table table-hover" id="table">
 		<thead>
 			<tr>
 				<!-- <th>S/N</th> -->
				 <th>S/N</th>
 				<th>Animal No.</th>
				 <th>Animal Name</th>
 				<th>Breed</th>
 				<th>Weight</th>
 				<th>Gender</th>
 				<th>Arrived</th>
 				<th>Desc.</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php
               $qpi = $db->query("SELECT * FROM pigs ORDER BY id");
               $result = $qpi->fetchAll(PDO::FETCH_OBJ);
               $c = $qpi->rowCount();
				$cnt = 1;
				if($c > 0){
					foreach($result as $j){ 
						
						$k = $db->query("SELECT * FROM breed WHERE id = '$j->breed_id' ");
               	 $ks = $k->fetchAll(PDO::FETCH_OBJ);
					$a=0;

               	 foreach ($ks as $r) {
						$bname = $r->name;
						
               	 ?>     
						
					
						<tr>
							<td><?php echo $cnt; ?></td>
					  
					  
                  	<td><?php echo $j->animalno; ?></td>
                  	<td><?php echo $j->animalname; ?></td>
					<td><?php echo $bname ?></td>
                  	<td><?php echo $j->weight; ?></td>
                  	<td><?php echo $j->gender;?></td>
                  	<td><?php echo $j->arrived; ?></td>
                  	<td><?php echo $j->remark; ?></td>
                  </tr>
				<?php	$cnt =$cnt + 1; } 
				} }?>
 		</tbody>
 	</table>
 </div>
 </div>
</div>


</div>


<?php include 'theme/foot.php'; ?>