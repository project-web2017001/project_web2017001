
<!DOCTYPE html>
<html lang='en'>
	<title>Admin Login</title>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css">
		<style>
			#form-div{
				width:300px;
				height: 400px;
				margin-top: 7%;
				margin-left: 40%;
				padding-top: 20px;
				padding-left: 20px;
				/*border-top:1px solid #eee;
				border-bottom:1px solid #eee;*/
			}
			#submit{
				margin-left: 33%;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid">
		<ol class="breadcrumb" style="background: transparent;position: relative;top: 176px;">
			<li><a href="index.php">Home</a></li>
			<li>Admin Panel</li>
		</ol>
			<div id="form-div">
			<h2 class="text-warning text-center">Admin Login</h2>
			<form action="admin_check.php" method="post" class="form-horizontal">
				<div class="form-group">
					<label for="name">Email:</label>
					<input type="text" class="form-control" id='email' name='email'>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" class="form-control" id='password' name='password'>
				</div>
				<div class="row">
					<input type="submit" class="btn btn-lg btn-primary" id="submit" value="Submit">
				</div>
			</form>
		</div>
		</div>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#submit').click(function(e){
					var email=$('#email').val();
					var password=$('#password').val();
					
					if(email=='' || password==''){
						e.preventDefault();
						alert('All Fields are compulsory!');
					}
					
				}
				})
			})
		</script>
	</body>
</html>