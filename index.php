<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container mt-4 pt-4">
		<div class="row">
			<div class="col col-12 col-lg-6 col-md-8 offset-lg-3 offset-md-2">
				<div class="card bg-light p-3">
					<h3 class="text-center">Login</h3>
					<?php 
                      if(isset($_GET["message"])){
                      	echo '<div class="alert alert-danger" role="alert">
						  '.$_GET["message"].'
						</div>';
                      }
					?>
					<form action="login.php" method="POST">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label for="useremail">Email</label>
							<input type="email" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Login" class="btn btn-dark btn-sm btn-block">
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
