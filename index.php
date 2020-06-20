<?php
	session_start();

	include_once 'model/Config.php';
	include_once 'model/UserModel.php';
	$user = new UserModel($DB_con);

	if ($user->isLoggedIn()) {
        if(strtoupper($_SESSION['user_code']) == "ADMIN") {
			header('Location: page/admin/index.php');
		} else if (strtoupper($_SESSION['user_code']) == "TEACHER") {
			header('Location: page/teacher/index.php');
		}
    }  

	if(isset($_POST["login"])){
    	$username = $_POST["username"];
    	$password = $_POST["password"];
    	if ($user->doLogin($username, $password)) {
			if(strtoupper($_SESSION['user_code']) == "ADMIN") {
				header('Location: page/admin/index.php');
			} else if (strtoupper($_SESSION['user_code']) == "TEACHER") {
				header('Location: page/teacher/index.php');
			}
    	} 
	} 
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Login Page</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="icon" href="assets/images/vsu_logo2.png">
	    <link rel="stylesheet" href="assets/css/bootstrap4.5.min.css">
	    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
	    <link rel="stylesheet" href="assets/css/customCss.css">
	    <script src="assets/js/jquery.min.js"></script>
	    <script src="assets/js/bootstrap4.5.min.js"></script>
	</head>
	<body style="background-color:grey;">
	<div class="container">
		<div class="row">
			<div class="col-md-4 mx-auto">
				<div style="margin-top: 100px; background: #ffffff; border-radius: 4px;">		
					<form method="POST">
						<div class="login-header bg-success text-white" style="border-top-left-radius: 4px; border-top-right-radius: 4px;
						padding: 4px 4px 4px 8px">
							<h5>Login Form</54>
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

