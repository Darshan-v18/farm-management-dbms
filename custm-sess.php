<?php 
 if(!isset($_SESSION['id']) OR !isset($_SESSION['customer']))
 {
 	header('location: custindex.php');
 }
