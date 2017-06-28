<?php
	session_start();
	include('dbconnect.php');
	if(!isset($_SESSION['uid'])){
	header('Location:index.php');
	}

	$pagename=basename($_SERVER['PHP_SELF']);

	$uid=$_SESSION['uid'];
	$full_name=$_SESSION['full_name'];
	$usename=$_SESSION['uname'];

	$sql="SELECT * FROM user_info WHERE username='$usename'";
	$run_query=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_array($run_query)){
		$email=$row['email'];
		$mobile=$row['mobile'];
		$profile_photo=$row['profile_photo'];
		$location=$row['location'];
		$skills=$row['skills'];
		$age=$row['age'];
		$address=$row['address'];
		$exp=$row['experience'];
		$qualification=$row['qualification'];
		$prefer=$row['preferences'];
	}
 ?>
<!DOCTYPE html>
<html lang='en'>
	<title>Times Jobs</title>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.10/uploadfile.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<link rel="stylesheet" type="text/css" href="assets/results_style.css">
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
						<li><a href="logout.php">Log out</a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<!-- Searchbox and field -->
		<div class="form-group">
					<span class="icon"><i class="fa fa-search"></i></span>
					<input type="text" placeholder="Skills/Companies" id="searchbox" class="ajax_search_field">
					
		</div>
		<button class="btn btn-primary btn-lg ajax_search_btn" id="search_button"><i class="fa fa-search"></i></button>

		<ol class="breadcrumb" style="background: transparent;">
		  <li><a href="home.php">Home</a></li>
		  <?php if($pagename=='user_profile.php') echo '<li><b>Profile</b></li>'; 
		  	else echo '<li><a href="user_profile.php">Profile</a></li>';
		  ?>
		  <!--  -->
		  <?php if($pagename=='jobs_applied.php') echo '<li><a href="#"><b>Jobs Applied for</b></a></li>'; 
		  	else echo '<li><a href="jobs_applied.php">Jobs Applied for</a></li>';
		  ?>
		  
		</ol>
		
		<!-- Left offset -->
	

		<!-- Different Bootstrap Wells for display of user-content -->
		<div class="row container-fluid">

		<div class="col-md-10">
		<!-- Profile Photo and Basic Details Well -->
		<div class="well basic_details">
			<div class="row">
				<div class="col-md-2">
					<!-- Profile photo here -->
					<img src="<?php echo $profile_photo; ?>" width="120px" height="120px" class="img-circle">
					<div id="fileuploader" style="position: relative;
    top: 20px;
    width: 50%;
    left: 20px;">Upload</div>
				</div>
				
				<div class="col-md-10">
					<!-- Name and E-mail here -->
					<h3 class="text-info"><?php echo $full_name; ?></h3>
					
					<span id="profile_email"><?php echo $email; ?></span> &nbsp;&nbsp; <a role="button" class="pull-right" href="#" id="email_edit"> <i class="fa fa-pencil" aria-hidden="true"></i></a><br><br>
					Username: <?php echo $usename; ?>
					
				</div>
			</div>
		</div>

		<!-- Skills Well -->
		<div class="well">
			<h3 class="text-info">Skills	<span class="pull-right"><a href="#" id="skills_edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>	</h3><br>
			<span id="profile_skills"><?php echo $skills; ?></span>
		</div>

		<!-- Location Well -->
		<div class="well">
			<h3 class="text-info">Educational Details	<span class="pull-right"><a href="#" id="education_edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>	</h3><br>
			<div class="row">
				<div class="col-md-1 text-right">Qualification:</div>
				<div class="col-md-4" id="qual"><?php echo $qualification;  ?></div>
				<div class="col-md-7"></div>
			</div><br>
			<div class="row">
				<div class="col-md-1 text-right">Experience:</div>
				<div class="col-md-4" id="exp"><?php echo $exp; ?></div>
				<div class="col-md-7"></div>
			</div><br>
			<div class="row">
				<div class="col-md-1 text-right">Preferences:</div>
				<div class="col-md-4" id="pref"><?php echo $prefer; ?></div>
				<div class="col-md-7"></div>
			</div>
			<div class="row">
				<div class="col-md-1" id="done_btn_edu"></div>
			</div>

		</div>

		<!-- Personal Details Well -->
		<div class="well">

			<h3 class="text-info">Personal Details	<span class="pull-right"><a href="#"><i class="fa fa-pencil" aria-hidden="true" id="personal_edit"></i></a></span>	</h3><br>
			<div class="row">
				<div class="col-md-1 text-right">Age:</div>
				<div class="col-md-4" id="age"><?php echo $age;  ?></div>
				<div class="col-md-7"></div>
			</div><br>
			<div class="row">
				<div class="col-md-1 text-right">Mobile:</div>
				<div class="col-md-4" id="mobile"><?php echo $mobile; ?></div>
				<div class="col-md-7"></div>
			</div><br>
			<div class="row">
				<div class="col-md-1 text-right">Address:</div>
				<div class="col-md-4" id="address"><?php echo $address; ?></div>
				<div class="col-md-7"></div>
			</div>
			<div class="row">
				<div class="col-md-1" id="done_btn_personal"></div>
			</div>
		</div>
		
		</div>
		<!-- Right Offset -->
		<div class="col-md-1"></div>
			<input type="hidden" id="user_id" value="<?php echo $uid; ?>">
		</div>

		<div class="footer_section">
			Something
		</div>
		

	<!-- Script files to be included -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="assets/jquery.uploadfile.js"></script>
	<script src="assets/profile_edit.js"></script>
	<script src="assets/main.js"></script>
	<script>
		$(document).ready(function(){
			$("#fileuploader").uploadFile({
				url:"profil_photo_upload.php",
				fileName:"profile_img"
			});
		})
	</script>
	</body>
</html>