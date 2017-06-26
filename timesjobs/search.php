<?php 
	include('dbconnect.php');

	$query=$_POST['query'];

	$sql="SELECT * FROM job WHERE keywords LIKE '%$query%'";
	$run_query=mysqli_query($conn,$sql);
	$numrows=mysqli_num_rows($run_query);

	echo "
				
				<div class='alert alert-success col-md-8 pull-left'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>$numrows Result(s) found!</b>
				</div>

		";
	if($numrows){
		while($row=mysqli_fetch_array($run_query)){
			$jid=$row['job_id'];
			$job_title=$row['job_title'];
			$company_name=$row['company_name'];
			$location=$row['location'];
			$exp=$row['experience'];
			$skills=$row['skills'];

			$sql2="SELECT * FROM company WHERE company_name='$company_name'";
			$run_query2=mysqli_query($conn,$sql2);
			$numrows2=mysqli_num_rows($run_query2);

			$row2=mysqli_fetch_array($run_query2);
			$logo=$row2['logo'];

			echo "
				<div class='col-md-10'>
					<div class='well'>
						<div class='row'>
							<div class='col-md-2'><img src='$logo' width='120px' height='120px'></div>
						<div class='col-md-10'>
							<h2><a href='details.php?jid=$jid'>$job_title</a></h2>
							<h3>$company_name</h3>
							<h4>Location: $location</h4>
							<h4><i class='fa fa-briefcase'></i>&nbsp;: $exp</h4>
							<h4>Skills: $skills</h4>
							<h4 class='pull-left'><a href='details.php?jid=$jid' style='text-decoration: none;'>View Details</a></h4>
						</div>
						</div>
					</div>
				</div>
	
			";
		}
	}
 ?>