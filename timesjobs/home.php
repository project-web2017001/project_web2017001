<?php
	session_start();
	if(!isset($_SESSION['uid'])){
	header('Location:index.php');
	}
 ?>
<!DOCTYPE html>
<html lang='en'>
	<title>Times Jobs</title>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
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
      				<a class="navbar-brand" href="#">Times Jobs</a>	
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><span>Hello, @<?php echo $_SESSION['uname']; ?></span></a></li>
						<li><a href="user_profile.php">View Profile</a></li>
						<li><a href="logout.php">Log out</a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<!-- Search box -->
		<div class="row container-fluid" id="bg_search">

			<div class="col-md-2"></div>
			<div class="col-md-8" id="searchbox_field">
			<div class="headings">
				<h2>Looking for Jobs?</h2>
				<h3>Search from thousands of companies</h3>
			</div>
				<div class="form-group">
					<span class="icon"><i class="fa fa-search"></i></span>
					<input type="text" style="position:relative; right:50px;" placeholder="Skills/Companies" id="searchbox">
					
				</div>
				<button class="btn btn-primary btn-lg" id="search_button"><i class="fa fa-search"></i></button>
			</div>
			<div class="col-md-2"></div>
		</div>

		<!-- Featured Jobs -->
		<div class="container-fluid featured_jobs">
			<h1 class="text-success">Featured Jobs</h1><br><br>
		
			<!-- Job Categories/Filters -->
			<div class="col-md-2 job_filter">
				<div id="get_cat"></div>
				<!--
				<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div>
				-->
				<br><br><br>
				<div id="get_comp"></div>
				<!--
				<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Companies</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div>
				-->
			</div>
			
			<!-- Job Thumbnails -->
			<div class="col-md-10 feed" id="feed_jobs">
			
				<!--
				<div class="row">
				  <div class="col-sm-6 col-md-4 job_thumbnail">
				    <div class="thumbnail job_thumbnail">
				      <img src="assets/images/logos/1.png" width="200px" height="200px" alt="...">
				      <div class="caption">
				        <h3>Frontend Developer</h3>
				        <div class="text-muted" style="display: inline-block;">Facebook</div>
				        <br><br><i class="fa fa-briefcase"></i>
				        <span class="exp">1-3yr</span><br>
				        <span class="location">Location: Pune</span>
				        <p>Make stuff front on the line</p>
				        <p><a href="#" class="btn btn-primary" role="button">View Job</a> <a href="#" class="btn btn-default" role="button">Apply</a></p>
				      </div>
				    </div>
				  </div>
				</div>
				-->

			</div>
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