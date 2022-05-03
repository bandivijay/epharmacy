<?php 
session_start();
include 'conn.php';
$id =$_GET['id'];
$email=$_SESSION['email'];
$sql="DELETE FROM cart WHERE id='$id' AND email='$email'";
mysqli_query($conn,$sql);
header('location:../mycart.php');
 ?>