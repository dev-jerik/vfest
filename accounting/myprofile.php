<?php
	define("ROW_PER_PAGE",2);
	session_start();
	require "../dao/UserDAO.php";
	$login = new UserDAO;
  	$view = new UserDAO;

	$id = $_SESSION['id'];
	$info = $view->getUserInfo($id);

	if(!$login->log_test()){
		header('Location: ../index.php');
	} else {
		$name = $_SESSION['name'];
	}
	$_SESSION['page'] = "profile";
?>

<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" href="../bootstrap/css/main.css">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
		<link rel="stylesheet" href="../bootstrap/css/datepicker3.css">
		<script src="../bootstrap/js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../bootstrap/js/bootstrap-datepicker.js"></script>
    </head>
    <body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3">
					<div style="margin-left: -15px">
						<?php require ('home_sidebar.php');?>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="main-body">
						<div class="page-header clearfix">
	                        <h2 class="pull-left">My Profile</h2>
                   		</div>
	                    <div>
	                    	<div class="container-fluid">
								<div class="row">
									<div class="col-sm-3"></div>
									<div class="col-sm-6">
			                        	<div class="table-responsive">
										   <table class="table table bordered">
											    <tr>
											      <th width="35%">Surname</th>                                                                  
											      <td><?php echo $info[1]; ?></td>   
											    </tr>
											    <tr>
											      <th>First Name</th>                                                                  
											      <td><?php echo $info[2]; ?></td>   
											    </tr>
											    <tr>
											      <th>Middle Name</th>                                                                  
											      <td><?php echo $info[3]; ?></td>   
											    </tr>
											    <tr>
											      <th>Birth Date</th>                                                                  
											      <td><?php echo $info[4]; ?></td>   
											    </tr>
											    <tr>
											      <th>Gender</th>                                                                  
											      <td><?php echo $info[5]; ?></td>   
											    </tr>
											    <tr>
											      <th>Contact Number</th>                                                                  
											      <td><?php echo $info[6]; ?></td>   
											    </tr>
											    <tr>
											      <th>Civil Status</th>                                                                  
											      <td><?php echo $info[7]; ?></td>   
											    </tr>
											    <tr>
											      <th>Home Address</th>                                                                  
											      <td><?php echo $info[8]; ?></td>   
											    </tr>
											    <tr>
											      <th>Eligibility</th>                                                                  
											      <td><?php echo $info[9]; ?></td>   
											    </tr>
											    <tr>
											      <th>User Type</th>                                                                  
											      <td><?php echo $info[11]; ?></td>   
											    </tr>
											    <tr>
											      <th>Username</th>                                                                  
											      <td><?php echo $info[0]; ?></td>   
											    </tr>
											    <tr>
											      <th>Password</th>                                                                  
											      <td>
											      	<?php
														for($i=0; $i<strlen($info[10]); $i++)
													 		echo '*'; 
													 ?>
												   </td>
											    </tr>	
											</table>
				                        </div>
				                        <div class="pull-right">
				                            <button class="btn btn-success" data-toggle='modal' data-target='#editProfile'>Update Profile</button>
				                            <button class="btn btn-primary" data-toggle='modal' data-target='#editAccount'>Update Account</button>
				                        </div>
										<?php 
											require "modal.php";
								        ?>
				                    </div>
									<div class="col-sm-3"></div>
			                    </div>
		                    </div>
	                    </div>
					</div>
                </div>
            </div>
        </div>
    </body>
</html>