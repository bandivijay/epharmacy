<?php 
session_start();
session_destroy();
unset($_SESSION['password']);
$_SESSION['msg']="You're now logged out";
header("location:index.php")

 ?>