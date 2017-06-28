<?php 
	session_start();
	include('dbconnect.php');

	//Profile-photo update


	//E-mail update
	if(isset($_POST['email_update'])){

		$uid=$_POST['user_id'];
		$email_new=$_POST['email_new'];
		$sql="UPDATE user_info SET email='$email_new' WHERE user_id='$uid'";
		$run_query=mysqli_query($conn,$sql);
		
	}

	//Skill Update
	if(isset($_POST['skills_update'])){

		$uid=$_POST['user_id'];
		$skills_new=$_POST['skills_new'];
		$sql="UPDATE user_info SET skills='$skills_new' WHERE user_id='$uid'";
		$run_query=mysqli_query($conn,$sql);
		$email=$row['skills'];

	}

	//	Qualif, exp,pref update
	if(isset($_POST['education_edit'])){
		$uid=$_POST['user_id'];
		$qual_new=$_POST['qual_new'];
		$exp_new=$_POST['exp_new'];
		$pref_new=$_POST['pref_new'];
		$sql="UPDATE user_info SET qualification='$qual_new', experience='$exp_new', preferences='$pref_new' WHERE user_id='$uid'";
		$run_query=mysqli_query($conn,$sql);
		if($run_query){
			echo "1";
		}

	}

	// Age, Mobile, address update
	if(isset($_POST['personal_edit'])){
		$uid=$_POST['user_id'];
		$age_new=$_POST['age_new'];
		$mobile_new=$_POST['mobile_new'];
		$address_new=$_POST['address_new'];
		$sql="UPDATE user_info SET age='$age_new', mobile='$mobile_new', address='$address_new' WHERE user_id='$uid'";
		$run_query=mysqli_query($conn,$sql);
		if($run_query){
			echo "1";
		}

	}
 ?>