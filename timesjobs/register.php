<?php 
	include('dbconnect.php');

	$name=$_POST['name'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$repeat_password=md5($_POST['rpassword']);
	$phone=$_POST['phone'];
	$location=$_POST['location'];

			//check for available user-details
		$sql = "SELECT * FROM user_info WHERE email = '$email'" ;
		$check_query = mysqli_query($conn,$sql);
		$count_email = mysqli_num_rows($check_query);

		if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email Address is already available Try Another email address</b>
			</div>
		";
		exit();
		}
		else {
					$sql="INSERT INTO user_info (username, name, email, password, mobile,location) VALUES ('$username', '$name','$email','$password','$phone','$location')";
					$run_query=mysqli_query($conn,$sql);
					if($run_query){
						echo "
								<div class='alert alert-success'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									Succesfully registered! Log in now.
								</div>
						";
					}
			}

 ?>