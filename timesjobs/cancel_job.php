<?php 
	session_start();
	include('dbconnect.php');

	$ref_num=$_POST['ref_num'];
	$sql2="SELECT * FROM job_applications WHERE ref_num='$ref_num'";
	$run_query2=mysqli_query($conn,$sql2);
	$row=mysqli_fetch_array($run_query2);
	unlink($row['resume']);
	$sql="DELETE FROM job_applications WHERE ref_num='$ref_num'";
	$run_query=mysqli_query($conn,$sql);

	$sql3="SELECT * FROM job_applications WHERE ref_num='$ref_num'";
	$run_query3=mysqli_query($conn,$sql3);
	$num_rows=mysqli_num_rows($run_query3);
	if($run_query){
		echo $num_rows;
	}
	
	
 ?>