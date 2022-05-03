<?php 
session_start();
session_destroy();
unset($_SESSION['email']);
$_SESSION['msg']="You're now logged out";
header("location:login.php")

 ?>