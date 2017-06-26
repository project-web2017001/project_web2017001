<?php 
	session_start();
	include('dbconnect.php');

	if(isset($_POST['email_edit'])){

		$curr_email=$_POST['email_current'];
		$sql="SELECT * FROM user_info WHERE email='$curr_email'";
		$run_query=mysqli_query($conn, $sql);
		$row=mysqli_fetch_array($run_query);

		$output_email=$row['email'];
		echo "<input type='text' value='".$output_email."' id='new_email'>";
	}
 ?>