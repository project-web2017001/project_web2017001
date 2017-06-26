<?php 
	session_start();
	include('dbconnect.php');
	$id=$_POST['job_id'];

	$full_name=$_SESSION['full_name'];
	$email=$_SESSION['email'];
	$usename=$_SESSION['uname'];

	$sql="SELECT * FROM job WHERE job_id='$id'";
	$run_query=mysqli_query($conn,$sql);
	$numrows=mysqli_num_rows($run_query);
	$row=mysqli_fetch_array($run_query);
	$title=$row['job_title'];
	$company=$row['company_name'];
	$location=$row['location'];
	$_SESSION['jobname']=$title;
	$reference_num=rand();



	if(isset($_POST['resume_submit'])){
		$job_name=$_SESSION['jobname'];
	$applicant_name=$_SESSION['uname'];
	$errors=array();
	$filename=$_FILES['resume']['name'];
	$filesize=$_FILES['resume']['size'];
	$filetype=$_FILES['resume']['type'];
	$file_tmp = $_FILES['resume']['tmp_name'];
	$tmp=explode('.',$filename);
	$file_extension=strtolower(end($tmp));

	$newfilename=$usename."_".$job_name."_".$filename;
	

	if($file_extension!="pdf"){
		$errors[]="File Error!";
	}

	if($filesize > 2097152){
         $errors[]='File size must be less than 2 MB';
      }

     if(empty($errors)){
     	move_uploaded_file($file_tmp, "uploads/".$newfilename);
     }else{
     	echo $errors;
     }
	}

	$file_location='uploads/'.$newfilename;


	$sql="INSERT INTO job_applications (job_title,company_name,ref_num,resume,applicant_name,email,username) VALUES ('$title','$company','$reference_num','$file_location','$full_name','$email','$usename')";
	$run_query=mysqli_query($conn,$sql);

 ?>
 <!DOCTYPE html>
<html lang='en'>
	<title>Times Jobs</title>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/style.css">
	</head>
	<body>
		<!-- Navigation bar -->
		<nav class="navbar navbar-default navbar-fixed">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
      				</button>	
      				<a class="navbar-brand" href="index.php">Times Jobs</a>	
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><span>Hello, @<?php echo $_SESSION['uname']; ?></span></a></li>
						
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="col-md-1"></div>
		<div class="panel panel-success col-md-10">
		  <div class="panel-heading">
		    <h3 class="panel-title">Success!</h3>
		  </div>
		  <div class="panel-body">
		    Your job application for <?php echo $title; ?> at <?php echo $company; ?> has been
		    succesfully submitted!
		    <br>
		    <b>Reference ID: <?php echo $reference_num; ?></b>
		    <br><br>
		    <a href="home.php" class="btn btn-lg btn-success">Return Home</a>
		    <br><br>
		    <span class="bg-info">
		    	<h3>You will be redirected in <span id="count"></span> Seconds</h3>
		    </span>
		  </div>
		</div>
		<div class="col-md-1"></div>
		<!-- Script files to be included -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="assets/main.js"></script>
	<script>
		var start=10;
		var myVar=setInterval(timer,1000);
		function timer(){
			if(start<=0){
				clearInterval(myVar);
				window.location="home.php";
			}else{
			document.getElementById('count').innerHTML=start;
			start--;
			}
		}
	</script>
	</body>
</html>