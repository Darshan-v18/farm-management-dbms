<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'custmsidebar.php'; ?>
<?php include 'custm-sess.php'; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>
 
 <!-- <?php include 'inc/data.php'; ?> -->
 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
 	<h2>Purchased Animals</h2>
 <div class="table-responsive">
 	<table class="table table-hover" id="table">
 		<thead>
 			<tr>
			 <th>S/N</th>
 				<th>Animal No.</th>
				 <th>Animal Name</th>
 				<th>Price</th>
 				
 			</tr>
 		</thead>
 		<tbody>
 			<?php
			 $customer = $_SESSION['customer'];
               $qpi = $db->query("SELECT * FROM sold_animal where customer_name = '$customer'");
               $result = $qpi->fetchAll(PDO::FETCH_OBJ);
               $c = $qpi->rowCount();
			   $cnt = 1;
				if($c > 0){

               foreach ($result as $j) {
               	 $animalno = $j->animal_no;
				 $animalname = $j->animal_name;
               	 $arr = $j->price;

               	 
               	 ?>
                  <tr>
                  <td><?php echo $cnt; ?></td>
                  	<td><?php echo $animalno; ?></td>
                  	<td><?php echo $animalname; ?></td>
                  	<td><?php echo $arr; ?></td>
                  </tr>

               	 <?php $cnt =$cnt + 1; } 
                 }
              
 			?>
 		</tbody>
 	</table>
 </div>
 </div>
</div>


</div>


<?php include 'theme/foot.php'; ?>