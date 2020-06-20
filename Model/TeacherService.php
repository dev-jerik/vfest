<?php 
	include_once 'Config.php';
	include_once 'TeacherModel.php';

	$action=isset($_POST['action'])?$_POST['action']:"";

	if ($action == "findTeacher") {
		findTeacher($_POST['search']);
	} else {
		echo "Invalid parameter action: ".$action;
	}

	function findTeacher($gradeLevel) {
		$teacherModel = new TeacherModel($GLOBALS['DB_con']);
		$teacher = $teacherModel->findTeacher($gradeLevel);
		$output = "";

		if ($teacher != null) {
			$output = $teacher["l_name"].", ".$teacher["f_name"];
		}	
		echo $output;
	}
 ?>