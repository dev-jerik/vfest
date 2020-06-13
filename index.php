<!DOCTYPE HTML>
<?php
	session_start();
    require "dao/UserDAO.php";

    $log = new UserDAO();
    if($log->log_test()){
        if($_SESSION['userCode'] == "Admin")
            header("Location: admin/home.php");
        else if ($_SESSION['userCode'] == "Teacher")
            header("Location: teacher/home.php");
        else if ($_SESSION['userCode'] == "Accounting")
            header("Location: accounting/home.php");
        else
            header("Location: principal/home.php");
    }
    
    if(isset($_POST["login"])){
        $msg = "";
    	$uname = $_POST["uname"];
    	$pword = $_POST["pword"];
        $log->login($uname, $pword);
        if($log->login($uname, $pword)==false){
            $msg = "Wrong Email or Password";
        }
    } 
?>
<html>
	<head>
		<title>Student Records Management System</title>
		<link rel="stylesheet" href="bootstrap/css/main.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
		<script src="bootstrap/js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>

	</head>
	<body class="index"  style="background-color:grey;">
		<?php require "controller/backstretch.php" ?>
		<div class="container">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4" style="margin-top: 100px">
			    	<div class="panel panel-success">
				        <div class="panel-heading"><b>Login First!</b></div>
				        <div class="panel-body">
							<form action="" name="myForm" method='POST'>
                                <?php
                                    if(isset($_POST["login"]) && !$msg==""){
                                        echo "<div class='alert alert-warning'>
                                                <strong>Warning!</strong> $msg
                                              </div>";
                                    }
                                ?>
                                
								<div class="form-group">
									<label for="email">Username:</label>
									<input type="tet" class="form-control" name="uname" id="uname" placeholder="Enter username" required>
								</div>
								<div class="form-group">
									<label for="pwd">Password:</label>
									<input type="password" class="form-control" name="pword" id="pword" placeholder="Enter password" required>
								</div>
								<button type="submit" class="btn btn-success" name="login"><span class="glyphicon glyphicon-log-in"></span>Login</button>
								<!-- <a data-toggle="modal" data-target="#myModal" href="#myModal">Sign Up</a> -->
							</form>
						</div>
					</div>
                </div>
            </div>
		</div>
	</body>
</html>

