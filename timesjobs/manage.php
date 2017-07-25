<?php
	include('dbconnect.php');
	session_start();
	if(!isset($_SESSION['admin'])){
	header('Location:admin.php');
	}

	$sql="SELECT * FROM job";
	$run_query=mysqli_query($conn,$sql);
	$num_jobs=mysqli_num_rows($run_query);

	$sql2="SELECT * FROM company";
	$run_query2=mysqli_query($conn,$sql2);
	$num_companies=mysqli_num_rows($run_query2);

	$sql3="SELECT * FROM job_applications ORDER BY applied_on DESC";
	$run_query3=mysqli_query($conn,$sql3);
	$num_apps=mysqli_num_rows($run_query3);

 ?>
<!DOCTYPE html>
<html lang='en'>
	<title>Times Jobs</title>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<link rel="stylesheet" href="assets/table_style.css">
		<style>
			.list-group, .jumbotron{
				margin-top: 30px;
			}
			i{
				position: relative;
				right: 0px;
			}
			.well{
				margin-top: 20px;
			}
			.hide{
				display:none;
			}
		</style>
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
      				<a class="navbar-brand" href="#">Times Jobs</a>	
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><span>Hello, @<?php echo $_SESSION['admin']; ?></span></a></li>
						<li><a href="logout.php">Log out</a></li>
					</ul>
				</div>
			</div>
		</nav>
	
		<!-- Container for sidebar and main-content -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 text-center">
			<!-- Sidebar -->
				<div class="list-group">
				<a role="button" id="dashboard_sidebar" href="manage.php" class="list-group-item text-left active">Dashboard
				<span class="badge"><i class="fa fa-bar-chart"></i></span></a><br>

				  <a role="button" id="job_sidebar" href="#" class="list-group-item text-left">Jobs
				  <span class="badge"><i class="fa fa-list-ul"></i></span></a><br>

				  <a role="button" id="app_sidebar" href="#" class="list-group-item text-left">Application
				  <span class="badge"><i class="fa fa-check-circle-o"></i></span></a><br>

				  <a role="button" id="employer_sidebar" href="#" class="list-group-item text-left">Employers
				  <span class="badge"><i class="fa fa-users"></i></span></a><br>

				  <a role="button" id="preview_sidebar" href="#" class="list-group-item text-left">Preview
				  <span class="badge"><i class="fa fa-external-link"></i></span></a><br>

				  <a role="button" href="logout.php" class="list-group-item text-left">Logout
				  <span class="badge"><i class="fa fa-sign-out"></i></span></a>
				</div>
			</div>
			<div class="col-md-8 text-center" id="center_content">
				
				<div class="jumbotron dashboard">

					<div class="row">
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-6 text-right">
									<h1><i class="fa fa-list-ul text-success"></i></h1>
								</div>
								<div class="col-md-6 text-left">
									<h1 class="text-primary"><?php echo $num_jobs; ?></h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jobs
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-6 text-right">
									<h1><i class="fa fa-users text-success"></i></h1>
								</div>
								<div class="col-md-6 text-left">
									<h1 class="text-primary"><?php echo $num_companies; ?></h1>Companies
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-6 text-right">
									<h1><i class="fa fa-check-circle-o text-success"></i></h1>
								</div>
								<div class="col-md-6 text-left">
									<h1 class="text-primary"><?php echo $num_apps; ?></h1>Applications
								</div>
							</div>
						</div>
				</div>
				</div>
				<div class="well dashboard">
					<div class="row">
						<div class="col-md-6" style="border-right: 1px solid grey;">
							<span class="text-success">Latest Applications</span>
							<br><br><br>
							<?php 
								while($row=mysqli_fetch_array($run_query3)){
									$applicant_name=$row['applicant_name'];
									$email=$row['email'];

									$sqlz="SELECT * FROM user_info WHERE email='$email'";
									$runq=mysqli_query($conn,$sqlz);
									$user_row=mysqli_fetch_array($runq);
									$profile_photo=$user_row['profile_photo'];
									echo '
										<div class="row">
											<div class="col-md-4 text-right">
												<img src='.$profile_photo.' width="60px" height="60px">
											</div>
											<div class="col-md-8 text-left">
												'.$applicant_name.'
											</div>
										</div><br>
									';
								}
							 ?>
							
						
						</div>
						<div class="col-md-6">
							<span class="text-success">Latest Employers</span>
							<br><br><br>
							<?php 
								while($newrow=mysqli_fetch_array($run_query2)){
									$logo=$newrow['logo'];
									$company_name=$newrow['company_name'];
									echo '
											<div class="row">
												<div class="col-md-4 text-right">
													<img src='.$logo.' width="60px" height="60px">
												</div>
												<div class="col-md-8 text-left">
													'.$company_name.'
												</div>
											</div>
												<br>
									';
								}
							 ?>
							
						
							
						</div>
					</div>
				</div>
			</div>
		<div class="col-md-1"></div>
	</div>
		

		
	
		<!-- Script files to be included -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="assets/denetmen.js"></script>
	<script src="assets/manage_admin.js"></script>
	</body>
</html>