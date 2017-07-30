<?php 
	session_start();
	$_SESSION['admin']='admin';

$email=$_POST['email'];
$password=$_POST['password'];

if($email=='admin' && $password=='1234'){
	header('location:manage.php');
}
else{
	header('location:admin.php');
}

 ?>