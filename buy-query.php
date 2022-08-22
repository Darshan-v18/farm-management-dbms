<?php include 'setting/system.php'; ?>
<?php

if(!$_GET['id'] OR empty($_GET['id']))
{
	header('location: buying.php');
}else
{
	$id = $_GET['id'];
    
    $get = $db->query("SELECT * FROM selling ORDER BY id DESC");
	$res = $get->fetchAll(PDO::FETCH_OBJ);

    foreach($res as $n){ 
        $ani_no = $n-> animalno;
        $ani_name = $n-> animalname;
        $ani_price = $n-> price;
        $cust_name = $_SESSION['customer'];
    }
    $insQuery = $db->query("INSERT INTO sold_animal(customer_name,animal_no,animal_name,price) VALUES ('$cust_name','$ani_no','$ani_name','$ani_price') ");
    if($insQuery){
        $query = $db->query("DELETE FROM selling WHERE id = $id ");
        if($query){
            header('location: custmdashboard.php');
        }
    }
    else{
        header('location: buying.php');
    }
	
}
