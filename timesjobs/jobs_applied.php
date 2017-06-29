<?php
	session_start();
	include('dbconnect.php');
	if(!isset($_SESSION['uid'])){
	header('Location:index.php');
	}

	$pagename=basename($_SERVER['PHP_SELF']);
	$uemail=$_SESSION['email'];

	$sql="SELECT * FROM job_applications WHERE email='$uemail' ORDER BY applied_on";
	$run_query=mysqli_query($conn,$sql);
	$num_applications=mysqli_num_rows($run_query);


 ?>
<!DOCTYPE html>
<html lang='en'>
	<title>Times Jobs</title>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.10/uploadfile.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
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
		
		<!-- Breadcrumbs -->
		<ol class="breadcrumb" style="background: transparent;">
		  <li><a href="home.php">Home</a></li>
		  <?php if($pagename=='user_profile.php') echo '<li><a href="#"><b>Profile</b></a></li>'; 
		  	else echo '<li><a href="user_profile.php">Profile</a></li>';
		  ?>
		  <!--  -->
		  <?php if($pagename=='jobs_applied.php') echo '<li><b>Jobs Applied for</b></li>'; 
		  	else echo '<li><a href="jobs_applied.php">Jobs Applied for</a></li>';
		  ?>
		  
		</ol>

		<div class="row">

		<!-- Left Offset -->
		<div class="col-md-2"></div>

		<!-- Main Content -->
		<!-- 
			<div class="well">
				<div class="row">
					<div class="col-md-2"><img src="assets/images/logos/1.png" alt="" width="120px" height="120px"></div>
				<div class="col-md-10">
					<h2><a href="#">Frontend Developer</a></h2>
					<h3>Facebook</h3>
					<h4>Location: Pune</h4>
					<h4 class="text-info">Status: <b class="text-success">SUCCESS</b></h4>
					<h6>Applied on : 2013-12-12</h6>
				</div>
				</div>
			</div>
		 -->
		<div class="col-md-8">
		<div class="well text-center text-info" id="num_app"><?php echo $num_applications." found." ?></div>
		<?php 
			if($num_applications==0){
				echo '
					<div class="well">
						<h2>Darn! Go Apply, bud!</h2>
					</div>
				';
			}
			else
			while($row=mysqli_fetch_array($run_query)){
				$jid=$row['id'];
				$applicant_name=$row['applicant_name'];
				$job_title=$row['job_title'];
				$company=$row['company_name'];
				$ref_num=$row['ref_num'];
				$applied_on=$row['applied_on'];
				$status=$row['status'];

				if($status=='SUCCESS'){
					echo '
						<div class="well">
							<div class="row">
								
							<div class="col-md-6">
								<h4><a href="#" style="text-decoration:none;">'.$job_title.'</a></h4>
								<h5>'.$company.'</h3>
							</div>
							<div class="col-md-6 text-right">
								<h6 class="text-info">Status: <b class="text-success">'.$status.'</b></h6>
								<h6>Applied on : '.$applied_on.'</h6>
								<h6>Reference Number:<b class="text-warning">'.$ref_num.'</b></h6>
							</div>
							</div>
						</div>
				';
				}
				else{
					echo '
						<div class="well cancel-well">
							<div class="row">
								
							<div class="col-md-6">
								<h4><a href="#" style="text-decoration:none;">'.$job_title.'</a></h4>
								<h5>'.$company.'</h3><br>

							</div>
							<div class="col-md-6 text-right">
								<h6 class="text-info">Status: <b class="text-success">'.$status.'</b></h6>
								<h6>Applied on : '.$applied_on.'</h6>
								<h6>Reference Number:<b class="text-warning">'.$ref_num.'</b></h6>
								<button class="btn btn-danger cancel_job_btn" id='.$ref_num.'>Cancel</button>
							</div>
							</div>
						</div>
				';
				}

				
			}
		 ?>
		</div>

		<!-- Right Offset -->
		<div class="col-md-2"></div>
		</div>

		<!-- Script files to be included -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="assets/profile_edit.js"></script>
	<script src="assets/main.js"></script>
	<script>
		$(document).ready(function(){
			$('.cancel_job_btn').click(function(){
				var cancel_msg="<div class='alert alert-info' style='display:none;'>Application Cancelled</div>";
				$(this).parent().parent().parent().addClass('animated fadeOutRight').one('webkitAnimationEnd',function(){
					$(cancel_msg).prependTo($(this).parent()).fadeIn('slow');
					 window.setTimeout(function(){
					 	$('.alert').addClass('animated zoomOut').fadeOut('slow');
					 },2000);
					 $(this).hide('slow');
				});
			var ref_num=$(this).attr('id');
			$.ajax({
				url: "cancel_job.php",
				method: "POST",
				data: {cancel_job:1, ref_num:ref_num},
				success: function(data){
					$('#num_app').html(data+" found");
				}
			})
			
			})
		})
	</script>
	</body>
</html>