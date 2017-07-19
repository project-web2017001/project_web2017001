<?php 
	session_start();
	include('dbconnect.php');
	$query=$_GET['q'];
?>
<!DOCTYPE html>
<html lang='en'>
	<title>Times Jobs</title>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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
						<li><a <?php if(!(isset($_SESSION['uid']))){echo "class='modalForm'";} ?> href="#">
							<?php
							if(!isset($_SESSION['uid'])){
								echo "Sign In";
							}
							else
								echo "Hello, @". $_SESSION['uname'];
						  ?>
						</a></li>
						<li><a <?php if(!(isset($_SESSION['uid']))){echo "class='modalForm'";} ?> href='<?php
							if(!isset($_SESSION['uid'])){
								echo "#";
							}
							else
								echo "logout.php";
						  ?>'>
							<?php
							if(!isset($_SESSION['uid'])){
								echo "Sign Up";
							}
							else
								echo "Logout";
						  ?>
						</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="form-group">
					<span class="icon"><i class="fa fa-search"></i></span>
					<input type="text" value="<?php echo $query; ?>" placeholder="Skills/Companies" id="searchbox" class="ajax_search_field">
					
		</div>
		<button class="btn btn-primary btn-lg ajax_search_btn" id="search_button"><i class="fa fa-search"></i></button>
		
		<!-- Categories to filter + search-results -->
		<div class="row feed">

			<div class="col-md-2 filter">
				<!-- Job filters -->
				
				<!-- <div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
				<br><br><br>
				
				<!-- <div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Companies</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
			</div>
			<div class="col-md-10 results">
				<!-- Job Results -->

				<!-- For offset on left sides -->
				<div class="col-md-1"></div>

				<!-- Individual results -->
				<div id="ajaxresults"></div>
				<!-- <div class="col-md-10">
					<div class="well">
						<div class="row">
							<div class="col-md-2"><img src="assets/images/logos/1.png" alt="" width="120px" height="120px"></div>
						<div class="col-md-10">
							<h2><a href="#">Frontend Developer</a></h2>
							<h3 class="text-muted">Facebook</h3>
							<h4 class="text-muted">Location: Pune</h4>
							<h4 class="text-muted"><i class="fa fa-briefcase"></i>&nbsp;: 1-3yrs</h4>
							<h4 class="text-muted">Skills: HTML,CSS,JavaScript</h4>
							<h4 class="pull-left"><a href="details.php" style="text-decoration: none;">View Details>>></a></h4>
						</div>
						</div>
					</div>
				</div> -->

				<!-- For offset on right sides -->
				<div class="col-md-1"></div>

					
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
		</div>

			<!-- Modal form -->
		<div class="modal fade" id="modalF" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Sign in / Sign Up</h4>
		      </div>
		      <div class="modal-body">
		        <div class="tab-content">

		        	<!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" style="width: 50%; text-align: center;" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Sign In</a></li>
				    <li role="presentation" style="width: 50%; text-align: center;"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Sign Up</a></li>
				   </ul>
		        	<div role="tabpanel" class="tab-pane active" id="home">
						<br><br><br><br>
						<form class="form-horizontal" id="signin_form">
						  <div class="form-group">
						    <label for="inputEmail3" class="login_field col-sm-2 control-label">Email</label>
						    <div class="col-sm-10">
						      <input type="email" class="form-control" id="email" placeholder="Email">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputPassword3" class="login_field col-sm-2 control-label">Password</label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" id="password" placeholder="Password">
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <div class="checkbox">
						        <label>
						          <input type="checkbox"> Remember me
						        </label>
						      </div>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-default" id="signin_btn">Sign in</button>
						    </div>
						  </div>
						</form>
		        	</div>
		        	<div role="tabpanel" class="tab-pane" id="profile">
					<br><br><br><br>
					<!-- Registration Form -->
					<form id="registration" action="">
						<div id="err_msg"></div>
						<div class="form-group">
							<input type="text" name="name" class="register_field form-control" placeholder="Full Name">
						</div>
						<div class="form-group">
							<input type="text" name="username" class="register_field form-control" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="email" name="email" class="register_field form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="register_field form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<input type="password" name="rpassword" class="register_field form-control" placeholder="Repeat Password">
						</div>
						<div class="form-group">
							<input type="text" name="phone" class="register_field form-control" placeholder="Phone Number">
						</div>
						<div class="form-group">
							<input type="text" name="location" class="register_field form-control" placeholder="Location">
						</div>
						<br>
						<div class="col-md-4 offset-4"><button id="register_btn" class="btn btn-success">Submit</button></div>
					</form>
		        	</div>
		        </div>
		      </div>
		      <div class="modal-footer">
		        
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		

		<!-- Script files to be included -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="assets/main.js"></script>
	</body>
</html>