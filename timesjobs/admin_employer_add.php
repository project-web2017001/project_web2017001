<?php 
	include('dbconnect.php');

	$company_name=$_POST['company_name'];
	$company_email=$_POST['company_email'];
	$industry_name=$_POST['industry_name'];

	switch($industry_name){
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
	// $company_logo=$_POST['company_logo'];

		$filename=$_FILES['company_logo']['name'];
		$file_tmp = $_FILES['company_logo']['tmp_name'];
		$tmp=explode('.',$filename);
		$file_extension=strtolower(end($tmp));

		move_uploaded_file($file_tmp, "assets/images/logos/".$filename);
		$file_location='assets/images/logos/'.$filename;

	$company_phone=$_POST['company_phone'];
	$company_website=$_POST['company_website'];
	$company_location=$_POST['company_location'];
	$company_rating=$_POST['company_rating'];
	$num_employees=$_POST['num_employees'];

	$sql="INSERT INTO company (company_name,industry,logo,company_email,company_phone,website,location,ratings,num_employees,num_jobs) VALUES('$company_name','$industry','$file_location','$company_email','$company_phone','$company_website','$company_location','$company_rating','$num_employees','1')";
	$run_query=mysqli_query($conn,$sql);

	if($run_query){
						header('location:manage.php');
					}

 ?>