<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<head><link rel="stylesheet" href="./css/login.css"></head>
<div class="container">
	<div class="row" style="margin-top: 10%">
  <div style="background-image: url('lv4.jpg');">

		<h1 class="text-center"><?php echo NAME_X; ?></h1><br>
   <div class="col-md-2 col-md-offset-2">
     
   </div>
		<div class="col-md-4">
			<form method="post" autocomplete="off">
				<div class="form-group">
				   <label class="control-label">Customer user</label>
				   <input type="text" name="customername" class="form-control input-sm" required>
			    </div>

			    <div class="form-group">
				   <label class="control-label">Customer Password</label>
				   <input type="password" name="customerpass" class="form-control input-sm" required>
			    </div>
                
			    <button name="submit" type="submit" class="btn btn-md btn-dark log-btn">Log in</button>
			</form>

			<?php
              if (isset($_POST['submit'])) {
              	$customername = trim($_POST['customername']);
              	$customerpass = $_POST['customerpass'];

              	$hash = $customerpass;
                
                $q = $db->query("SELECT * FROM customer WHERE customername = '$customername' AND customerpass = '$hash' LIMIT 1 ");

                $count = $q->rowCount();
                $rows = $q->fetchAll(PDO::FETCH_OBJ);

                if($count > 0){
                   foreach($rows as $row){
                     $customer_id = $row->id;
                     $customer = $row->customername;

                     $_SESSION['id'] = $customer_id;
                     $_SESSION['customer'] = $customer;

                     header('location: custmdashboard.php');
                   }
                }else{
                	$error = 'incorrect login details'; 
                }

              }


            if(isset($error)){ ?>
            <br><br>
               <div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><?php echo $error; ?>.</strong>
              </div>
            <?php }
			?>


		</div>
	</div>
</div>


<?php include 'theme/foot.php'; ?>
