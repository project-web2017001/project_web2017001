<?php 
	include('dbconnect.php');

	$key=$_GET['key'];
	$array=array();
	$sql="SELECT * FROM job WHERE keywords LIKE '%{key}%'";
	$run_query=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($run_query)){
		$array[]=$row['title'];
	}
	echo json_encode($array);

 ?>