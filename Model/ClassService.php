<?php 
	include_once 'Config.php';
	include_once 'ClassModel.php';

	$action=isset($_POST['action'])?$_POST['action']:"";

	if ($action == "searchClass") {
		searchClass($_POST['search']);
	} else {
		echo "Invalid parameter action: ".$action;
	}

	function searchClass($search) {
	    $classModel = new ClassModel($GLOBALS['DB_con']);
	    $classList = $classModel->getClassLevelList();
	    $overallTotal=0;
		$output = "";

		foreach ($classList as $class) {
	        $totalStudent = $classModel->getTotalStudent($search, $class['gradelevel']);
	        $overallTotal+=$totalStudent['total'];
	        $output .= "<tr>
	            <td>{$class['gradelevel']}</td>
	            <td>{$class['gradename']}</td>
	            <td>{$totalStudent['total']}</td>
	            <td><a id='viewStudents' href='class_view_students.php?year={$search}&levelId={$class['gradelevel']}&level={$class['gradename']}'>Students</a></td>
                <td><a id='viewSubjects' href='class_view_subjects.php?year={$search}&levelId={$class['gradelevel']}&level={$class['gradename']}'>Subjects</a></td>
	        </tr>";
        }
        $output .= "
	        <tr>
	            <td colspan='5'>
	                <hr>
	                <div class='form-group'>
	                    <div style='float:left'>
	                        <h5 class='text-success'>Total Number of Students:</h5>
	                    </div>
	                    <div style='float:right'>
	                        <h5>{$overallTotal}</h5>
	                    </div>
	                </div>
	            </td>
	        </tr>";

		echo $output;
	}
 ?>