<?php 
	session_start();
	include('dbconnect.php');
	if(isset($_SESSION['uid'])){
		header('location: home.php');
	}
 ?>
<!DOCTYPE html>
<html lang='en'>
	<title>Times Jobs</title>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css">
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
						<li><a href="admin.php">Admin Login</a></li>
						<li><a href="#">Are you hiring?</a></li>
						<li><a href="#" class="modalForm">Sign in</a></li>
						<li><a href="#" class="modalForm">Sign Up</a></li>
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
					<input type="text" name="typeahead" class="typeahead" placeholder="Skills/Companies" id="searchbox" data-provide="typeahead">
					
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
				<!--<div class="nav nav-pills nav-stacked" >
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					
				</div>-->
				<br><br>
				<div id="get_comp"></div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Companies</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div>-->
			</div>			
			<!-- Job Thumbnails -->
			<div class="col-md-10 feed" id="feed_jobs">
			
				<!--

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

				  -->
				
			</div>
		</div>

		
			<div class="row footer">
					
			<button class="btn btn-lg btn-success" id="view_all_btn" style="position: relative; left:150px;">View all Jobs</button>
					<hr><br><br>
					<div class="row">
						<div class="col-md-4 text-center job_cat">
							<!-- Jobs By Industry -->
							<li><span><b>Jobs By Industry</b></span></li>
							<li><a href="results.php?q=it">IT</a></li>
							<li><a href="results.php?q=engineering">Engineering</a></li>
							<li><a href="results.php?q=sbi">Banking</a></li>
							<li><a href="#">Medical</a></li>
				
						</div>
						<div class="col-md-4 text-center job_cat">
							<!-- Jobs By Location -->
							<li><span><b>Jobs By Company</b></span></li>
							<li><a href="results.php?q=facebook">Facebook</a></li>
							<li><a href="results.php?q=dell">Dell</a></li>
							<li><a href="results.php?q=tata">Tata Steel</a></li>
							<li><a href="results.php?q=sbi">SBI</a></li>
						</div>
						<div class="col-md-4 text-center job_cat">
							<!-- Jobs By Skills -->
							<li><span><b>Jobs By Skills</b></span></li>
							<li><a href="results.php?q=html">Web Development</a></li>
							<li><a href="results.php?q=catia">Catia</a></li>
							<li><a href="results.php?q=ansys">Ansys</a></li>
							<li><a href="results.php?q=python">Python</a></li>		
						</div>
					</div>
				
					<ul class="social-icon">
						<li><span>Follow us on</span></li>
				         		<li><a href="https://www.facebook.com/satyam.mast" target="_blank" class="facebook"><i class="fa fa-facebook"></i>
				         		</a></li>
				         		<li><a href="https://twitter.com/satyamraj121" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
				         	</ul>
				
			
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
						      <button type="submit" class="btn btn-primary" id="signin_btn">Sign in</button>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
	<script src="assets/main.js"></script>
	</body>
</html>