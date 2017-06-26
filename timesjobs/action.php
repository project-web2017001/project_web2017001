<?php 
	include('dbconnect.php');

	//For SIDEBAR CATEGORIES
	if(isset($_POST['get_cat'])){
		$sql="SELECT * FROM industry";
		$run_query=mysqli_query($conn,$sql);
		$numrows=mysqli_num_rows($run_query);
		echo '
			<div class="nav nav-pills nav-stacked" >
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
		';
		if($numrows){
			while($row=mysqli_fetch_array($run_query)){
				$name=$row['industry_name'];
				echo "
					<li><a href='#'>$name</a></li>
				";
			}
			echo '</div>';
		}
	}

	//FOR SIDEBAR COMPANIES
	if(isset($_POST['get_comp'])){
		$sql="SELECT * FROM company";
		$run_query=mysqli_query($conn,$sql);
		$numrows=mysqli_num_rows($run_query);
		echo '
			<div class="nav nav-pills nav-stacked" >
					<li class="active"><a href="#"><h4>Companies</h4></a></li>
		';
		if($numrows){
			while($row=mysqli_fetch_array($run_query)){
				$name=$row['company_name'];
				echo "
					<li><a href='#'>$name</a></li>
				";
			}
			echo '</div>';
		}
	}


	//FOR FEATURED JOBS ON INDEX.PHP AND HOME.PHP
	if(isset($_POST['feed_jobs'])){
		$sql="SELECT * FROM job ORDER BY RAND() LIMIT 3";
		$run_query=mysqli_query($conn,$sql);
		$numrows=mysqli_num_rows($run_query);
		if($numrows){
			while($row=mysqli_fetch_array($run_query)){

				$id=$row['job_id'];
				$title=$row['job_title'];
				$company=$row['company_name'];
				$exp=$row['experience'];
				$salary=$row['salary'];
				$location=$row['location'];
				$skills=$row['skills'];
				$descr=$row['descr'];

				$sql2="SELECT * FROM company WHERE company_name='$company'";
				$run_query2=mysqli_query($conn,$sql2);
				$rowz=mysqli_fetch_array($run_query2);
				$logo=$rowz['logo'];

				echo "
					<div class='col-sm-6 col-md-4 job_thumbnail'>
				    <div class='thumbnail job_thumbnail'>
				      <img src='$logo' width='200px' height='200px'>
				      <div class='caption'>
				        <h3>$title</h3>
				        <div class='text-muted' style='display: inline-block;'>$company</div>
				        <br><br><i class='fa fa-briefcase'></i>
				        <span class='exp'>$exp</span><br>
				        <span class='location'>Location: $location</span>
				        <p>$descr</p>
				        <p><a href='#' class='btn btn-primary detail' jid='$id' role='button'>View Job</a> </p>
				      </div>
				    </div>
				  </div>
				";
			}
			echo '<button class="btn btn-lg btn-success" id="view_all_btn">View all Jobs</button>';
		}
	}


	//FOR DETAILS OF A PARTICULAR JOB (DETAILS.PHP)

 ?>