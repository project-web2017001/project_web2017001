<?php 
	session_start();
	include('dbconnect.php');

	$job_id=$_GET['jid'];
	$sql="SELECT * FROM job WHERE job_id='$job_id'";
	$run_query=mysqli_query($conn,$sql);
	$numrows=mysqli_num_rows($run_query);
	$row=mysqli_fetch_array($run_query);
				$id=$row['job_id'];
				$title=$row['job_title'];
				$company=$row['company_name'];
				$exp=$row['experience'];
				$salary=$row['salary'];
				$location=$row['location'];
				$skills=$row['skills'];
				$descr=$row['descr'];
				$post_date=$row['posted_on'];
				$industry=$row['industry'];

	$sql2="SELECT * FROM company WHERE company_name='$company'";
	$run_query2=mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_array($run_query2);

	$logo=$row2['logo'];
	$email=$row2['company_email'];
	$phone=$row2['company_phone'];
	$website=$row2['website'];
	$ratings=$row2['ratings'];
	$num_employee=$row2['num_employees'];
	$num_jobs=$row2['num_jobs'];

	$sql3="SELECT * FROM industry WHERE id='$industry'";
	$run_query3=mysqli_query($conn,$sql3);
	$row3=mysqli_fetch_array($run_query3);

	$industry_name=$row3['industry_name'];

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
						<li><a href="#">
						<?php
							if(!isset($_SESSION['uid'])){
								echo "";
							}
							else
								echo "Hello, @" .  $_SESSION['uname'];
						  ?>
							
						</a></li>
						<li><a href='<?php
							if(!isset($_SESSION['uid'])){
								echo "#";
							}
							else
								echo "logout.php";
						  ?>'>
							<?php
							if(!isset($_SESSION['uid'])){
								echo "";
							}
							else
								echo "Log out";
						  ?>
						</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- <div class="form-group">
					<span class="icon"><i class="fa fa-search"></i></span>
					<input type="text" class="details_page_query_field" placeholder="Skills/Companies" id="searchbox">
					
		</div>
		<button class="btn btn-primary btn-lg details_page_query" id="search_button"><i class="fa fa-search"></i></button> -->
		
		<!-- <div class="text-success text-center heading"><h1>Job Details</h1></div> -->
		
	
		<!-- Main Content -->
		<div class="main">
			<div class="row">
				
				<div class="col-md-1"></div>
				<div class="col-md-8">
					<div class="well">
						<div class="row">
						<div class="col-md-1">
						<br>
						<img src="<?php echo $logo; ?>" width="150px" height="150px" alt="logo"></div>

						<div class="col-md-8" style="margin-left: 120px;">
							
							<h3><?php echo $title; ?></h3>

							<span class="text-primary"><?php echo $company; ?></span>
							
							<span class="pull-right">Ratings: 
								<?php 
									for($i=1;$i<=$ratings;$i++){
										echo "<i class='fa fa-star-o'></i>";
									}
								  ?>
								
							</span><br><br>
							
							<span><i class="fa fa-briefcase"></i>: <?php echo $exp; ?></span><br><br>
							<span><i class="fa fa-check-square"></i>: <?php echo $salary; ?></span><br><br>
							<span><i class="fa fa-map-marker"></i>: <?php echo $location; ?></span><br><br>
							<?php 
								if(!isset($_SESSION['uid'])){
									echo '
										<a class="btn btn-lg btn-success pull-right disabled" data-toggle="tooltip" data-placement="right" title="Tooltip on right">Apply</a>
									';
								}else
								{
									echo "<a href='apply.php?jid=" . $id . "'" . " class=" . "'btn btn-lg btn-success pull-right'>Apply</a>";
								}
								// echo '
								// 	<a href="apply.php?jid=".$id." class="btn btn-lg btn-success pull-right">Apply</a>
								// ';
							 ?>
							
							<span>
								Skills:
								&nbsp;
									<span class="text-info"><?php echo $skills; ?></span>
								
								<!--<div class="example-wrapper">
							        <div class="tags">
							            <label for="tag" class="control-label">Skills</label>
							            <div data-tags-input-name="taggone disabled" id="tag">preexisting-tag, another-tag</div>
							        </div>
							    </div>-->
							</span>
						</div>
						<div class="col-md-3">
							

						</div>
					</div>
					</div>	
					<div class="well">
						<h3>Job Description</h3>
						<span class="text-success"><?php echo $descr; ?></span><br><br>
						<span class="description text-success">
							<br>
							Designation: <b><?php echo $title; ?></b> <br><br>
							
							Location: <b><?php echo $location; ?></b>
 
						</span>
					</div>
					<div class="well">
						<h5>Job Posted By: <?php echo $company; ?></h5>
						<h6 class="pull-right">Website: <a href="#"><span class="website"><?php echo $website; ?></span></a></h6><br>
						<h6 class="pull-right" style="
    							position: relative;
						    right: -154px;
						">Contact: <a href="#"><span class="phone"><?php echo $phone; ?></span></a></h6>
						<h6>Posted on: <span class="post_date"><?php echo $post_date; ?></span></h6>
					</div>	
				</div>
				<div class="col-md-3">
					<?php

					 if(!(isset($_SESSION['uid']))) 
					 {
					 	echo '
							<h3 class="text-center">Sign in</h3>
					<form id="signin_form"><br>
						  <div class="form-group">
						    <label for="inputEmail3" class="login_field col-sm-2 control-label">Email</label>
						    <div class="col-sm-10">
						      <input type="email" class="form-control" id="email" placeholder="Email">
						    </div>
						  </div><br><br>
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
					 	';
					 }

					?>
					
				</div>
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

		
		

		<!-- Script files to be included -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="assets/main.js"></script>
	</body>
</html>