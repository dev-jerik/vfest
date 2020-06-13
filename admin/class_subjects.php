<?php
	define("ROW_PER_PAGE",2);
	session_start();
	require "../dao/UserDAO.php";
	$login = new UserDAO;

	if(!$login->log_test()){
		header('Location: ../index.php');
	} else {
		$name = $_SESSION['name'];
	}
	$_SESSION['page'] = "class";
?>

<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" href="../bootstrap/css/main.css">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
		<script src="../bootstrap/js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
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
	                        <h2 class="pull-left">View Subjects</h2>
                   		</div>
	                    <div>
	                    	<div class="container-fluid">
								<div class="row">
									<div class="col-sm-3"></div>
									<div class="col-sm-6">
				                        <form name='frmSearch' action='' method='post'>
				                        	<table width="100%">
				                        		<tr>
				                        			<th width='25%'>Input School Year</th>
				                        			<td>
				                        				<select class="form-control"  name="year" id="year">
															<option value='2020' selected>2020</option>
															<option value='2019'>2019</option>
															<option value='2018'>2018</option>
						                                </select>
				                        			</td>
				                        		</tr>
				                        	</table>
				                            <br/>
				                            <div>
				                            	<div class="table-responsive">
												    <table class="table table bordered">
													    <tr>
														    <th class="table-header" width="10%"> # </th>
														    <th class="table-header" width="20%">Level</th>
														    <th class="table-header" width="5%" style="text-align:center">Action</th>
													    </tr>
												    	<?php
												    		$ctr = 1;
														    for($i=0; $i<9; $i++){
															    if ($ctr <= 1){ $level = "Daycare"; }
															    else if ($ctr == 2){ $level = "Kinder 1"; }
															    else if ($ctr == 3){ $level = "Kinder 2"; }
															    else if ($ctr == 4){ $level = "Grade 1"; }
															    else if ($ctr == 5){ $level = "Grade 2"; }
															    else if ($ctr == 6){ $level = "Grade 3"; }
															    else if ($ctr == 7){ $level = "Grade 4"; }
															    else if ($ctr == 8){ $level = "Grade 5"; }
															    else if ($ctr == 9){ $level = "Grade 6"; }

															echo '
																<tr>
																<td>'.$ctr.'</td> 
															    <td>'.$level.'</td> 
															    <td style="text-align:center"><a id="edit" href="class_subjects_view.php" title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>
																</tr>
															';
															$ctr++;
															}
												    	?>
													</table>
												</div>
				                            </div>
				                        </form>
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