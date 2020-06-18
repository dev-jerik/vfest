<?php
	define("ROW_PER_PAGE",2);
	session_start();
	require "../dao/UserDAO.php";
	$login = new UserDAO;
	$cat = "StudID";
	$view = new UserDAO;

  $info = $view->getstaffsInfo($_SESSION['id']);
  $data = $view->geteducbgInfo($_SESSION['id']);
  $for = $view->getSRInfo($_SESSION['id']);

	if(!$login->log_test()){
		header('Location: ../index.php');
	} else {
		$name = $_SESSION['name'];
	}
	$_SESSION['page'] = "home";
	$day = date("d");
	$month = date("m");
	$year = date("Y");
	$siblingCtr = 0;
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
<form>
<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<form name="staff" method="post" action="../controller/staffget_info?func=editstaff">
						<div class="modal-header">
							<header align="center">
								<td><h3>TEACHERS AND STAFF PROFILE</h3></td>
								<h4>ELEMENTARY SCHOOL PERSONNEL</h4>
							</header>
						</div>
						<br></br>
							<!-- File Button --> 
<div class="form-group">
  <label class="col-md-1 control-label" for="Name">Name</label>
  <div class="col-md-3 col-xs-3" >
 <div class="input-group">
       <input id="l_name" name="l_name" type="text" placeholder="Last Name" class="form-control input-md">
      </div>
      </div>
  <div class="col-md-3 col-xs-3" >
 <div class="input-group">   
       <input id="f_name" name="f_name" type="text" placeholder="First Name" class="form-control input-md">
      </div>
      </div>
      <div class="input-group">
       <input id="m_name" name="m_name" type="text" placeholder="Middle Name" class="form-control input-md" size="10">
      </div>
  </div>

 <div class="form-group">
  <label class="col-md-1 control-label" for="sdob">Date of Birth</label> 
  <div class="col-md-3">

	 <div class="input-group date" data-provide="datepicker" data-date-format='yyyy-mm-dd' data-date-todayHighlight=true data-date-autoclose=true >
											    <input type="text" class="form-control date-picker" id="date" name="sdob">
											    <div class="input-group-addon">
											        <span class="glyphicon glyphicon-th"></span>
											    </div>
											</div>
  </div>
  <label class="col-md-1 control-label" for="Gender">Gender</label>
  <div class="col-md-2"> 
    <label class="radio-inline" for="Gender-0">
      <input type="radio" name="Gender" id="Gender-0" value="1" checked="checked">
      Male
    </label> 
    <label class="radio-inline" for="Gender-1">
      <input type="radio" name="Gender" id="Gender-1" value="2">
      Female
    </label> 
    <label class="radio-inline" for="Gender-2">
      <input type="radio" name="Gender" id="Gender-2" value="3">
      Other
    </label>
  </div>		
  <!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-1 control-label" for="scivilstatus">Marital Status:</label>
  <div class="col-md-2"> 
      <select class="form-control"  name='scivilstatus'>
		    <option>Single</option>
		    <option>Married</option>
		    <option>Live In</option>
		    <option>Widowed</option>
		    <option>Separate</option>
		    </select> 

</div>
</div>
<br></br>
	<br></br>
  <label class="col-md-1 control-label" for="Name">Eligibility</label>
  <div class="col-md-3 col-xs-3" >
 <div class="input-group">
       <input id="eligibility" name="eligibility" type="text" placeholder="Eligibility" class="form-control input-md">
      </div>
      </div>
      <!-- Text input-->

<div class="form-group">
  <label class="col-md-2 control-label" for="Phone number ">Phone number </label>  
  <div class="col-md-4">
  <div class="input-group">
    <input id="Phone number " name="Phone number " type="text" placeholder="Phone number " class="form-control input-md">
    
      </div>
  </div>
</div>
<br></br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-1 control-label" for="shome_add">Home Address</label>  
  <div class="col-md-5">
  <div class="input-group">
  
      <input id="shome_add" name="shome_add" type="text" placeholder="Home Address" style="width: 350%;" class="form-control input-md">
      </div>
  </div>
</div>

  </div>
</div>
</div>
<br></br>
							<hr>
							<h4><b>Educational Background</b></h4> 
							<table border='1px'  width='100%'>
								<tr align='center'>
									<th width='15%' style='text-align: center'>Degree</th>
									<th width='35%' style='text-align: center'>School Graduated</th>
									<th width='15%' style='text-align: center'>Year Start</th>
									<th width='15%' style='text-align: center'>Year End</th>
									<th style='text-align: center' colspan='2'>Action</th>
								</tr>
								<tr align='center'>
									<td style='text-align: center'><input type="text" name="degree" size="20"></td>
									<td style='text-align: center'><input type="text" name="scchool" size="50"></td>
									<td style='text-align: center'><input type="text" name="yrstart"></td>
									<td style='text-align: center'><input type="text" name="yrend" ></td>
									<td width='50px' style="text-align:center">
								     <a align='right' data-toggle='modal' data-target='#addEB'  class="glyphicon glyphicon-edit"></a>
								    </td>
								    <td width='50px' style="text-align:center">
								      <a id="delete" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
								    </td>
								</tr>
							</table>
							<button align='right' data-toggle='modal' data-target='#addEB' class="btn btn-primary">Add Educ. Background</button>
						
							<hr>
							<h4><b>Service Record</b></h4>
							<table border='1px'  width='100%'>
								<tr align='center'>
									<th width='15%' style='text-align: center'>Date Started</th>
									<th width='35%' style='text-align: center'>Position</th>
									<th width='35%' style='text-align: center'>Monthly Salary</th>
									<th style='text-align: center' colspan='2'>Action</th>
								</tr>
								<tr align='center'>
									<td style='text-align: center'><input type="text" name="date_started" ></td>
									<td style='text-align: center'><input type="text" size="50" name="position" ></td>
									<td style='text-align: center'><input type="text" name="monthly_salary" size="50" ></td>
									<td width='50px' style="text-align:center">
								      <a align='right' data-toggle='modal' data-target='#addSR'  class="glyphicon glyphicon-edit"></a>
								    </td>
								    <td width='50px' style="text-align:center">
								      <a id="delete" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
								    </td>
								</tr>
							</table> 
							<button align='right' data-toggle='modal' data-target='#upSR' class="btn btn-primary">Add Service Record</button>
							<hr><br>
							<div class="pull-right">
								<button type="submit" class="btn btn-success" name="home.php">Update Record</button>
	                            <a  class="btn btn-danger" href="staff.php">Back</a>
	                        </div>
	                        <br><br><br><br>
						</div>
						<?php 
							require "updatemodal.php";
				        ?>
					</form>
				</div>
			</div>
		</div>
	</form>
</body>
</html>