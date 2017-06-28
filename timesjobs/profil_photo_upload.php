<?php 
	session_start();
	include('dbconnect.php');
	$applicant_name=$_SESSION['uname'];
	$id=$_SESSION['uid'];
	
	if(isset($_FILES['profile_img'])){
		$fileName = $_FILES["profile_img"]["name"];
		$newfilename=$applicant_name."_".$fileName;
		move_uploaded_file($_FILES["profile_img"]["tmp_name"],"uploads/user/".$newfilename);
	}

	$file_location="uploads/user/".$newfilename;
	$sql="UPDATE user_info SET profile_photo='$file_location' WHERE user_id='$id'";
	$run_query=mysqli_query($conn,$sql);
	if($run_query)
	echo "1";

 ?>