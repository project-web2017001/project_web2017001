<?php 
	session_start();
	include('dbconnect.php');

	//E-mail edit
	if(isset($_POST['email_edit'])){

		$curr_email=$_POST['email_current'];
		$sql="SELECT * FROM user_info WHERE email='$curr_email'";
		$run_query=mysqli_query($conn, $sql);
		$row=mysqli_fetch_array($run_query);

		$output_email=$row['email'];
		echo "<input type='text' value='".$output_email."' id='new_email'><br><button class='btn btn-xs btn-success' id='email_new_btn'>Done</button>";
	}

	//Skills edit
	if(isset($_POST['skills_edit'])){

		$curr_skills=$_POST['skills_current'];
		$sql="SELECT * FROM user_info WHERE skills='$curr_skills'";
		$run_query=mysqli_query($conn, $sql);
		$row=mysqli_fetch_array($run_query);

		$output_skills=$row['skills'];
		echo "<input type='text' class='form-control' value='".$output_skills."' id='new_skills'>&nbsp;<br><button class='btn btn-success' id='skills_new_btn'>Done</button>";
	}

	//Education edit
	if(isset($_POST['education_edit'])){
		$uid=$_POST['user_id'];
		$sql="SELECT * FROM user_info WHERE user_id='$uid'";
		$run_query=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($run_query);

		echo json_encode($row);
	}

	//Personal details edit
	if(isset($_POST['personal_edit'])){
		$uid=$_POST['user_id'];
		$sql="SELECT * FROM user_info WHERE user_id='$uid'";
		$run_query=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($run_query);

		echo json_encode($row);
	}


 ?>