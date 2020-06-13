<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'vfes_info');

//Initialize variables
$studID = 0;
$update = false;
$first_name ="";
$last_name = "";
$middle_name = "";
$gender = "";
$dob = "";
$last_school = "";
$pob = "";
$religion = "";
$school_add = "";
$cur_grdlevel = "";
$fam_add = "";
$phone = "";
$PID = 0;
$plast_name = "";
$pfirst_name = "";
$pmiddle_name = "";
$psex = "";
$occupation = "";
$VSUconnected = "";
$deptoffice = "";
$officehead = "";
$officeadd = "";
$givenName = "";
$dob = "";



if (isset($_POST['submit'])) {
	$first_name =$_POST['first_name'];
	$last_name = $_POST['last_name'];
	$middle_initial = $_POST['middle_name'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$pob = $_POST['pob'];
	$religion = $_POST['religion'];
	$last_school = $_POST['last_school'];
	$school_add = $_POST['school_add'];
	$cur_grdlevel = $_POST['cur_grdlevel'];
	$fam_add = $_POST['fam_add'];
	$phone = $_POST['phone'];
	$plast_name = $_POST['plast_name'];
	$pfirst_name = $_POST['pfirst_name'];
	$pmiddle_name = $_POST['pmiddle_name'];
	$psex = $_POST['psex'];
	$occupation = $_POST['occupation'];
	$VSUconnected = $_POST['VSUconnected'];
	$deptoffice = $_POST['deptoffice'];
	$officehead = $_POST['officehead'];
	$officeadd = $_POST['officeadd'];
	$givenName = $_POST['givenName'];
	$dob = $_POST['dob'];
		
	
		sql("INSERT INTO tbl_students(first_name,last_name,middle_name,gender,dob,pob,religion,last_school, school_add, cur_grdlevel,fam_add,phone) VALUES ('$first_name','$last_name','$middle_name','$gender','$dob','$pob','$religion','$last_school','$school_add','$cur_grdlevel','$fam_add','$phone')");
		$query=mysqli_query($db,$sql);
		sql1("INSERT INTO tbl_parents(plast_name,pfirst_name,pmiddle_name,psex,occupation,VSUconnected,deptoffice,officeadd,officeadd)VALUES('$plast_name','$pfirst_name','$pmiddle_name','$psex','$occupation','$VSUconnected','$deptoffice','$officeadd','$officeadd')");
		$query=mysqli_query($db,$sql1);
		sql2("INSERT INTO tbl_siblings(givenName,dob)VALUES('$givenName','$dob')");
		mysql_query($db, $sql2);
		$_SESSION['message']="Added Succesfully";
  		header('location: index.php');

	}
?>