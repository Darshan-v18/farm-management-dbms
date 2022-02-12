<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php include 'session.php'; ?>
<?php 
 if(!$_GET['id'] OR empty($_GET['id']) OR $_GET['id'] == '')
 {
 	header('location: manage-pig.php');

 }else{
 	
 	$pigno = $bname = $b_id = $health = "";
 	$id = (int)$_GET['id'];
 	$query = $db->query("SELECT * FROM pigs WHERE id = '$id' ");
 	$fetchObj = $query->fetchAll(PDO::FETCH_OBJ);

 	foreach($fetchObj as $obj){
       $animalno = $obj->animalno;
       $animalname = $obj->animalname;
  	   $b_id = $obj->breed_id;
     $weight = $obj->weight;
	   
	     $k = $db->query("SELECT * FROM breed WHERE id = '$b_id' ");
       	 $ks = $k->fetchAll(PDO::FETCH_OBJ);
       	 foreach ($ks as $r) {
       	 	$bname = $r->name;
       	 }
 	}
 }

?>


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Animals Management</b></h5>
  </header>
 
 <?php include 'inc/data.php'; ?>

 
 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
 	<h2>Manage Animals</h2>
  <a href="add-pig.php" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Add New Animal</a><br><br>
 <div class="table-responsive">
 	<table class="table table-hover table-striped" id="table">
 		<thead>
 			<tr>
 				<!-- <th>S/N</th>
        <th>Photo</th> -->
 				<th>Animal No.</th>
        <th>Animal Name</th>
 				<th>Breed</th>
 				<th>Weight</th>
 				
 				<th>Price</th>
 				
        <th></th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php
       $get = $db->query("SELECT * FROM selling");
       $res = $get->fetchAll(PDO::FETCH_OBJ);
       foreach($res as $n){ ?>
                     <tr>
                       <td><?php echo $n->animalno; ?></td>
                       <td><?php echo $n->animalname; ?></td>
                       <td><?php echo $n->breed; ?></td>
                       <td><?php echo $n->weight; ?></td>
                       <td><?php echo $n->price; ?></td>
                     </tr> 
       <?php }

       ?>
     </tbody>
   </table>
 </div>

 <div class="col-md-6">

 <?php
  if(isset($_POST['submit']))
  {
    $n_animalno = $_POST['animalno'];
    $n_animalname = $_POST['animalname'];
    $n_breed = $_POST['breed'];
    $n_weight = $_POST['weight'];
    $n_remark = $_POST['price'];
    


    $n_id = $_GET['id'];

    $insert_query = $db->query("INSERT INTO selling(animalno,animalname,breed,weight,price)VALUES('$n_animalno','$n_animalname','$n_breed','$n_weight','$n_remark') ");

    if($insert_query){?>
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>Animal added to selling <i class="fa fa-check"></i></strong>
    </div>
   <?php
     header('refresh: 5');
    }else{ ?>
      <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>Error inserting Animal data. Please try again <i class="fa fa-times"></i></strong>
    </div>
    <?php
  }

  }

 ?>


   <form role='form' method="post">
     <div class="form-group">
       <label class="control-label">Animal No</label>
       <input type="text" name="animalno" readonly="on" class="form-control" value="<?php echo $animalno; ?>">
     </div>

     <div class="form-group">
       <label class="control-label">Animal name</label>
       <input type="text" name="animalname" readonly="on" class="form-control" value="<?php echo $animalname; ?>">
     </div>

     <div class="form-group">
       <label class="control-label">Breed</label>
       <input type="text" name="breed" readonly="on" class="form-control" value="<?php echo $bname; ?>">
     </div>

     <div class="form-group">
       <label class="control-label">weight</label>
       <input type="text" name="weight" readonly="on" class="form-control" value="<?php echo $weight; ?>">
     </div>

     <div class="form-group">
       <label class="control-label">price</label>
       <input type="number" name="price" placeholder="Enter the price" class="form-control" value=""></textarea>
     </div>

     <button name="submit" type="submit" class="btn btn-sm  btn-default">Add to list</button>
   </form>
 </div>  
</div>
</div>

</div>

<?php include 'theme/foot.php'; ?>