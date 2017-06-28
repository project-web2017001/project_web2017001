<?php 
session_start();
include('dbconnect.php');
$id=$_GET['jid'];
$user_id=$_SESSION['uid'];
if(!(isset($_SESSION['uid']))){
		echo "<script>alert('Log in first!');</script>";
		echo "<script>setTimeout(\"location.href='details.php?jid=$id'\",0.0001);</script>";
}
else{
	$sql="SELECT * FROM job WHERE job_id='$id'";
	$run_query=mysqli_query($conn,$sql);
	$numrows=mysqli_num_rows($run_query);
	$row=mysqli_fetch_array($run_query);
	$title=$row['job_title'];
	$company=$row['company_name'];
	$location=$row['location'];
	$_SESSION['jobname']=$title;

	$sql2="SELECT * FROM user_info WHERE user_id='$user_id'";
	$run_query2=mysqli_query($conn, $sql2);
	$row2=mysqli_fetch_array($run_query2);
	$profile_photo=$row2['profile_photo'];
}
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
		
		<div class="container-fluid">
			<div class="col-md-1"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h2 class="panel-title">Update your Profile</h2>
			  </div>
			  <div class="panel-body">
			    <h4 class="text-success">You are applying for <b><?php echo $title; ?></b> at <u><?php echo $company ?></u></h4>
			    <h5>Location: <span><?php echo $location; ?></span></h5><hr>
			    <h4 class="text-info" style="margin-left: 0px;">Please upload your resume to continue application</h4>
			    <div class="user-photo">
			    	<img src="<?php echo $profile_photo; ?>" alt="" width="100%" height="100%">
			    </div><br><br>
			    <div class="resume-upload-form">
			    	<form method="post" action="upload.php" enctype="multipart/form-data">
			    	<label for="resume">Upload your Resume</label>
			    	<input type="file" name="resume" id="resume">
			    	  <input type="hidden" name="job_id" value="<?php echo $id; ?>">
			    	<span>Only PDFs accepted</span>
					<div id="resume_error"></div>
			    	<br>
			    	<input id="resume_upload" class="btn btn-success" name="resume_submit" type="submit" value="Submit">
			    		&nbsp;&nbsp;&nbsp;<a href="home.php" class="btn btn-success">Cancel</a>
			    	
			    </form>
			    </div>
			  </div>
			</div>
			</div>
			<div class="col-md-3"></div>
		</div>

		<div class="footer">
			<h1>Hiring Companies</h1>
			<div class="row">
				<div class="col-md-4 text-center job_cat">
					<!-- Jobs By Industry -->
					<li><span><b>Jobs By Industry</b></span></li>
					<li><a href="#">IT</a></li>
					<li><a href="#">Engineering</a></li>
					<li><a href="#">Banking</a></li>
					<li><a href="#">Medical</a></li>

				</div>
				<div class="col-md-4 text-center job_cat">
					<!-- Jobs By Location -->
					<li><span><b>Jobs By Location</b></span></li>
					<li><a href="#">Delhi</a></li>
					<li><a href="#">Mumbai</a></li>
					<li><a href="#">Bangalore</a></li>
					<li><a href="#">Kolkata</a></li>
				</div>
				<div class="col-md-4 text-center job_cat">
					<!-- Jobs By Skills -->
					<li><span><b>Jobs By Skills</b></span></li>
					<li><a href="#">Web Development</a></li>
					<li><a href="#">Java</a></li>
					<li><a href="#">ASP.NET</a></li>
					<li><a href="#">SAP Jobs</a></li>		
				</div>
			</div>

			<ul class="social-icon">
				<li><span>Follow us on</span></li>
         		<li><a href="https://www.facebook.com/satyam.mast" target="_blank" class="facebook"><i class="fa fa-facebook"></i>
         		</a></li>
         		<li><a href="https://twitter.com/satyamraj121" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
         	</ul>

		</div>
		
		


	<!-- Script files to be included -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="assets/main.js"></script>
	</body>
</html>