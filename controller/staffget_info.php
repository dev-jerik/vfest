<?php
	session_start();

	require "../../dao/UserDAO.php";
	$view = new UserDAO;
	$id = $view->getstaffID($_SESSION['name']);
	$func = $_GET['func'];
	
	else if ($func == 'editstaff') {
		$l_name = $_POST['l_name'];
		$f_name = $_POST['f_name'];
		$m_name = $_POST['m_name'];
		$sdob = $_POST['sdob'];
		$ssex = $_POST['ssex'];
		$sphone = $_POST['sphone'];
		$scivilstatus = $_POST['scivilstatus'];
		$shome_add = $_POST['shome_add'];
		$eligibility = $_POST['eligibility'];
		

		$view->editStaffsName($l_name, $f_name, $m_name, $sdob, $ssex, $sphone, $scivilstatus, $shome_add, $eligibility);
	}
	else if ($func == 'editeducbg') {
		$degree = $_POST['degree'];
		$school = $_POST['school'];
		$yrstart = $_POST['yrstart'];
		$yrend = $_POST['yrend'];
	

		$view->editeducbg($degree, $school, $yrstart, $yrend);
	}
	else if ($func == 'editsr') {
		$degree = $_POST['date_started'];
		$school = $_POST['position'];
		$yrstart = $_POST['monthly_salary'];
	

		$view->editsr($date_started, $position, $monthly_salary);
	}
?>