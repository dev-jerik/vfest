<?php
	session_start();

	require "../../dao/UserDAO.php";
	$view = new UserDAO;
	$func = $_GET['func'];
	
	if ($func == 'editStud') {
		$studID = $_POST['studID'];
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['mname'];
		$last_name = $_POST['last_name'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$pob = $_POST['pob'];
		$religion = $_POST['religion'];
		$last_school = $_POST['last_school'];
		$school_add = $_POST['curr_grdlevel'];
		$fam_add = $_POST['fam_add'];
		$phone = $_POST['phone'];

		$view->editStudName($first_name, $middle_name, $last_name, $gender, $dob, $pob, $religion, $last_school, $school_add, $fam_add, $phone);
	}
	else if ($func == 'editSibs') {
		$first_name = $_POST['givenName'];
		$middle_name = $_POST['dob'];
		

		$view->editSibsName($givenName, $dob);
	}
	else if ($func == 'editparent') {
		$first_name = $_POST['pfirst_name'];
		$middle_name = $_POST['pmiddle_name'];
		$last_name = $_POST['plast_name'];
		$psex = $_POST['psex'];
		$occupation = $_POST['occupation'];
		$VSUconnected = $_POST['VSUconnected'];
		$deptoffice = $_POST['deptoffice'];
		$officehead = $_POST['officehead'];
		$officeAdd = $_POST['officeAdd'];
		

		$view->editParentsName($pfirst_name, $pmiddle_name, $plast_name, $psex, $occupation, $VSUconnected, $deptoffice, $officehead, $officeAdd);
	}
	echo '<script>alert("update records")</script>'; 
?>