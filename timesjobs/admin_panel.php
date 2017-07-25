<?php 
	include('dbconnect.php');

	//Job Query
	$sql="SELECT * FROM job";
	$run_query=mysqli_query($conn,$sql);
	$num_jobs=mysqli_num_rows($run_query);

	//Company Query
	$sql2="SELECT * FROM company";
	$run_query2=mysqli_query($conn,$sql2);
	$num_companies=mysqli_num_rows($run_query2);
	

	//Application Query
	$sql3="SELECT * FROM job_applications";
	$run_query3=mysqli_query($conn,$sql3);
	$num_apps=mysqli_num_rows($run_query3);

	//Industry Query
	$sql4="SELECT * FROM industry";
	$run_query4=mysqli_query($conn,$sql4);
	$num_industries=mysqli_num_rows($run_query4);

	if(isset($_POST['job'])){
		//Job sidebar ON
		

		echo '
			<div class="panel panel-primary">
			<div class="panel-heading">
			    <h3 class="panel-title text-center">Jobs Panel</h3>
			</div>
			<div class="panel-body">
			     <!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Jobs</a></li>
				    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Add new Job</a></li>
			    </ul>

				<div class="tab-content">
				    <div role="tabpanel" class="tab-pane active" id="home">
						<!-- Table of Jobs -->
						<div class="table-responsive">
						  <table class="table table-hover table-striped">
						    <thead>
								<th class="text-center text-success"><h4>Reference ID</h4></th>
								<th class="text-center text-success"><h4>Job Title</h4></th>
								<th class="text-center text-success"><h4>Company</h4></th>
								<th class="text-center text-success"><h4>Posted On</h4></th>
								<th class="text-center text-success"><h4>Remove</h4></th>
						    </thead>
						    <tbody>';

	while($row1=mysqli_fetch_array($run_query)){
		$jid=$row1['job_id'];
		$jtitle=$row1['job_title'];
		$jcompany=$row1['company_name'];
		$jposted=$row1['posted_on'];
		echo '
			<tr class="t">
				<td>'.$jid.'</td>
				<td>'.$jtitle.'</td>
				<td>'.$jcompany.'</td>
				<td>'.$jposted.'</td>
				<td><button class="btn btn-xs btn-danger delete_job_posted" id='.$jid.'><i class="fa fa-trash"></i></button></td>
			</tr>
		';
	}

	echo '
						    </tbody>
						  </table>
						</div>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="profile">
				    	<br>
				    	<br>
				      <div class="row">
				      <div class="col-md-1"></div>
				        <div class="col-md-11">
						<form id="admin_job_add">
							<div id="err_msg"></div>
							<div class="row">
							<div class="col-md-2 text-right">Job Title:</div>

							<div class="col-md-8">
							<div class="form-group">
								
								<input type="text" data-denetmen="Please enter a Job Title!" name="job_title" class="register_field form-control" placeholder="Job Title">
							</div>
							</div>
							</div>
							
							<div class="row">
							<div class="col-md-2 text-right">Company:</div>

							<div class="col-md-8">
							<div class="form-group">
								<select class="form-control" name="company_name">';
				while($row2=mysqli_fetch_array($run_query2)){
					$company_name=$row2['company_name'];
					echo '
						<option>'.$company_name.'</option>
					';
				}
							
		echo '</select></div></div>
							</div>
							<div class="row">
							<div class="col-md-2 text-right">Experience:</div>

							<div class="col-md-8">
							<div class="form-group">
								<input type="text" data-denetmen="Please enter experience!" name="exp" class="register_field form-control" placeholder="Experience">
							</div>
							</div>
							</div>

							<div class="row">
							<div class="col-md-2 text-right">Salary(Yearly):</div>

							<div class="col-md-8">
							<div class="form-group">
								<input type="text" data-denetmen="Please enter a Salary!" name="salary" class="register_field form-control" placeholder="Salary">
							</div>
							</div>
							</div>

							<div class="row">
							<div class="col-md-2 text-right">Location:</div>

							<div class="col-md-8">
							<div class="form-group">
								<input type="text" data-denetmen="Please enter a name!" name="location" class="register_field form-control" placeholder="Location">
							</div>
							</div>
							</div>

							<div class="row">
							<div class="col-md-2 text-right">Skills:</div>

							<div class="col-md-8">
							<div class="form-group">
								<input type="text" data-denetmen="Please enter a skill!" name="skills" class="register_field form-control" placeholder="Skills">
							</div>
							</div>
							</div>

							<div class="row">
							<div class="col-md-2 text-right">Job Description:</div>

							<div class="col-md-8">
							<div class="form-group">
								<input type="text" data-denetmen="Please enter description!" name="descr" class="register_field form-control" placeholder="Job Description">
							</div>
							</div>
							</div>

							<div class="row">
							<div class="col-md-2 text-right">Industry:</div>

							<div class="col-md-8">
							<div class="form-group">
								<select class="form-control" name="industry">
								  <option>IT</option>
								  <option>Engineering</option>
								  <option>Medical</option>
								  <option>Banking</option>
								  <option>Pharmaceuticals</option>
								</select>
							</div>
							</div>
							</div>

							<div class="row">
							<div class="col-md-2 text-right">Keywords (To let candidates know about the Job):</div>

							<div class="col-md-8">
							<div class="form-group">
								<input type="text" data-denetmen="Please enter a keyword!" name="keywords" class="register_field form-control" placeholder="Keywords for search">
							</div>
							</div>
							</div>
							<br>
							<div class="col-md-4 offset-4"><button id="admin_job_submit" class="btn btn-success">Submit</button></div>
							
						</form>
						</div> 
						</div> 
				    </div>
				</div>

			</div>
		</div>
		';
	}

	if(isset($_POST['app'])){
		//App sidebar ON
		echo '
			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title">Applications</h3>
			  </div>
			  <div class="panel-body">
					<table class="table table-hover table-striped">
						    <thead>
								<th class="text-center text-success"><h4>Reference ID</h4></th>
								<th class="text-center text-success"><h4>Job Title</h4></th>
								<th class="text-center text-success"><h4>Company</h4></th>
								<th class="text-center text-success"><h4>Applied On</h4></th>
								<th class="text-center text-success"><h4>Applicant Name</h4></th>
								<th class="text-center text-success"><h4>Status</h4></th>
								<th class="text-center text-success"><h4>Remove</h4></th>
						    </thead>
						    <tbody>';

	while($row3=mysqli_fetch_array($run_query3)){
		$aid=$row3['ref_num'];
		$atitle=$row3['job_title'];
		$acompany=$row3['company_name'];
		$aposted=$row3['applied_on'];
		$aname=$row3['applicant_name'];
		$astatus=$row3['status'];
		echo '
			<tr class="t">
				<td>'.$aid.'</td>
				<td>'.$atitle.'</td>
				<td>'.$acompany.'</td>
				<td>'.$aposted.'</td>
				<td>'.$aname.'</td>
				<td>
					<select class="form-control" name="status" id="dropdown" app_id='.$aid.'>';

				if($astatus=='PENDING'){
					echo '
							<option value="PENDING"> PENDING </option>
							<option value="SUCCESS"> SUCCESS </option>
					';
				}
				else{
					echo '
							<option value="SUCCESS"> SUCCESS </option>
							<option value="PENDING"> PENDING </option>
					';
				}

			echo 	'	
					</select>
				</td>
				<td><button class="btn btn-xs btn-danger remove_job" id='.$aid.'><i class="fa fa-trash"></i></button></td>
			</tr>
		';
	}

	echo '
						    </tbody>
						  </table>
						 </div>
			</div>
		';


	}

	if(isset($_POST['employer'])){
		//Employer sidebar ON

		echo '
			<div class="panel panel-primary">
			<div class="panel-heading">
			    <h3 class="panel-title text-center">Employers Panel</h3>
			</div>
			<div class="panel-body">
			     <!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Employers</a></li>
				    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Add new Employer</a></li>
			    </ul>

				<div class="tab-content">
				    <div role="tabpanel" class="tab-pane active" id="home">
						<!-- Table of Jobs -->
						<div class="table-responsive">
						  <table class="table table-hover table-striped">
						    <thead>
								<th class="text-center text-success"><h4>Reference ID</h4></th>
								<th class="text-center text-success"><h4>Company Logo</h4></th>
								<th class="text-center text-success"><h4>Company Name</h4></th>
								<th class="text-center text-success"><h4>Company Email</h4></th>
								<th class="text-center text-success"><h4>Phone</h4></th>
								<th class="text-center text-success"><h4>Location</h4></th>
								<th class="text-center text-success"><h4>Jobs Posted</h4></th>
								<th class="text-center text-success"><h4>Remove</h4></th>
						    </thead>
						    <tbody>';

	while($row2=mysqli_fetch_array($run_query2)){

		$eid=$row2['company_id'];
		$etitle=$row2['company_name'];
		$email=$row2['company_email'];
		$ephone=$row2['company_phone'];
		$elogo=$row2['logo'];
		$elocation=$row2['location'];
		$eposted=$row2['num_jobs'];
		echo '
			<tr>
				<td>'.$eid.'</td>
				<td><img src="'.$elogo.'" width="60px" height="60px"></td>
				<td>'.$etitle.'</td>
				<td>'.$email.'</td>
				<td>'.$ephone.'</td>
				<td>'.$elocation.'</td>
				<td>'.$eposted.'</td>
				
				<td><button class="btn btn-xs btn-danger remove_employer" id='.$eid.'><i class="fa fa-trash"></i></button></td>
			</tr>
		';
	}

	echo '
						    </tbody>
						  </table>
						</div>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="profile">
				    	<br>
				    	<br>
				      <div class="row">
				      <div class="col-md-1"></div>
				        <div class="col-md-6">
				        <form method="post" action="admin_employer_add.php" id="admin_employer_add" enctype="multipart/form-data">
							<div id="err_msg"></div>
							<div class="row">
							<div class="col-md-4">Company Name:</div>
								<div class="col-md-8">
									<div class="form-group">
									<input type="text" name="company_name" class="employer_field form-control" placeholder="Company Name">
									</div>
								</div>
							</div>

							<div class="row">
							<div class="col-md-4">Email:</div>
								<div class="col-md-8">
									<div class="form-group">
									<input type="text" name="company_email" class="employer_field form-control" placeholder="Email">
									</div>
								</div>
							</div>

							<div class="row">
							<div class="col-md-4">Industry:</div>
								<div class="col-md-8">
									<div class="form-group">
									<select class="form-control employer_field" name="industry_name">';

						while($row4=mysqli_fetch_array($run_query4)){
					$industry_name=$row4['industry_name'];
					echo '
						<option>'.$industry_name.'</option>
					';
				}

							echo '</select>
									</div>
								</div>
							</div>
							

							<div class="row">
							<div class="col-md-4">Logo:</div>
								<div class="col-md-8">
									<input type="file" name="company_logo" class="employer_field">
								</div>
							</div><br>

							<div class="row">
							<div class="col-md-4">Phone:</div>
								<div class="col-md-8">
									<div class="form-group">
									<input type="text" name="company_phone" class="employer_field form-control" placeholder="Phone">
									</div>
								</div>
							</div>
	
							<div class="row">
							<div class="col-md-4">Website:</div>
								<div class="col-md-8">
									<div class="form-group">
									<input type="text" name="company_website" class="employer_field form-control" placeholder="Website">
									</div>
								</div>
							</div>

							<div class="row">
							<div class="col-md-4">Location:</div>
								<div class="col-md-8">
									<div class="form-group">
									<input type="text" name="company_location" class="employer_field form-control" placeholder="Location">
									</div>
								</div>
							</div>

							<div class="row">
							<div class="col-md-4">Ratings (Out of 5):</div>
								<div class="col-md-8">
									<div class="form-group">
									<input type="text" name="company_rating" class="employer_field form-control" placeholder="Ratings">
									</div>
								</div>
							</div>

							<div class="row">
							<div class="col-md-4">Number of Employees:</div>
								<div class="col-md-8">
									<div class="form-group">
									<input type="text" name="num_employees" class="employer_field form-control" placeholder="Number of Employees">
									</div>
								</div>
							</div>

							
							<br>
							<div class="col-md-4 offset-4"><button id="employer_add_btn" class="btn btn-success">Submit</button></div>
						</form>
						</div> 
						</div> 
				    </div>
				</div>

			</div>
		</div>
		'.$num_companies;
	}


	//Removing Job application
	if(isset($_POST['remove_job'])){

		$id=$_POST['id'];
		$sql="DELETE FROM job_applications WHERE ref_num='$id'";
		$run_query=mysqli_query($conn,$sql);

	}

	//Removing Employer
	if(isset($_POST['remove_employer'])){

		$id=$_POST['id'];
		$sql="DELETE FROM company WHERE company_id='$id'";
		$run_query=mysqli_query($conn,$sql);

	}

	//Removing posted Jobs
	if(isset($_POST['delete_job_posted'])){

		$id=$_POST['id'];
		$sql="DELETE FROM job WHERE job_id='$id'";
		$run_query=mysqli_query($conn,$sql);

	}

	//Change Pending/Success state in Application sidebar in manage.php
	if(isset($_POST['change_state_application'])){

		$app_id=$_POST['app_id'];
		$val=$_POST['val'];

		$sql="UPDATE job_applications SET status='$val' WHERE ref_num='$app_id'";
		$run_query=mysqli_query($conn,$sql);

	}
 ?>