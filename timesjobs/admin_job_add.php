<?php 
	include('dbconnect.php');

	$jobtitle=$_POST['job_title'];
	$company=$_POST['company_name'];
	$exp=$_POST['exp'];
	$salary=$_POST['salary'];
	$location=$_POST['location'];
	$skills=$_POST['skills'];
	$descr=$_POST['descr'];
	$industry=$_POST['industry'];
	$keywords=$_POST['keywords'];

	switch($industry){
		case "IT":
			$industry=1;
			break;
		case "Engineering":
			$industry=2;
			break;
		case "Medical":
			$industry=3;
			break;
		case "Banking":
			$industry=4;
			break;
		case "Pharmaceutical":
			$industry=5;
			break;
	} 
	$date = date("Y-m-d H:i:s");
	$sql="INSERT INTO job (job_title,company_name,experience,salary,location,skills,descr,posted_on,industry,keywords) VALUES('$jobtitle','$company','$exp','$salary','$location','$skills','$descr','$date','$industry','$keywords')";
	$run_query=mysqli_query($conn,$sql);
	if($run_query){
						echo "
								<div class='alert alert-success'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									Job Added!
								</div>
						";
					}
 ?>