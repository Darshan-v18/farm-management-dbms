<?php 
include 'setting/system.php';

if(isset($_POST['remove'])){
	$id=$_POST['selector'];
    $N = count($id);
	for($i=0; $i < $N; $i++)
	{
		 $query = $db->query("DELETE FROM selling where animalno ='$id[$i]'");
	}
    header("location: manage-selling.php");
}
?>