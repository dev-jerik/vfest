<?php
	if(isset($_POST["login"])){
		include_once 'Model/Config.php';
    	include_once 'Model/UserModel.php';
    	$user = new UserModel($DB_con);

    	$username = $_POST["username"];
    	$password = $_POST["password"];
    	if ($user->doLogin($username, $password)) {
    		die("Successfully Login.");
    	} else {
    		die("Bad Credentials.");
    	}
    } 
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Login Page</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="icon" href="Assets/images/vsu_logo2.png">
	    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="Assets/css/font-awesome.min.css">
	    <link rel="stylesheet" href="Assets/css/customCss.css">
	    <script src="Assets/js/jquery.min.js"></script>
	    <script src="Assets/js/bootstrap.min.js"></script>
	</head>
	<body style="background-color:grey;">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div style="margin-top: 100px; background: #ffffff; border-radius: 4px;">		
					<form method="POST">
						<div class="login-header bg-success" style="border-top-left-radius: 4px; border-top-right-radius: 4px;
						padding: 4px 4px 4px 8px">
							<h4>Login Form</h4>
						</div>

						<div class="loginForm" style="padding: 10px;">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="input" class="form-control" name="username" placeholder="Username" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" placeholder="Password" required>
							</div>
							<button type="submit" name="login" class="btn btn-success">Login</button>
						</div>	
					</form>									
				</div>
			</div>
		</div>
	</div>
	</body>
</html>

