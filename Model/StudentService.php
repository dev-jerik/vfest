<?php 
	include_once 'Config.php';
	include_once 'StudentModel.php';

	$action=isset($_POST['action'])?$_POST['action']:"";

	if ($action == "searchStudent") {
		searchStudent($_POST['search']);
	} else {
		echo "Invalid parameter action: ".$action;
	}

	function searchStudent($search) {
		$studModel = new StudentModel($GLOBALS['DB_con']);
		$studentList = $studModel->searchStudent($search);
		$output = "";

		if($studentList === 0 || count($studentList) === 0){
			$output .= "<tr><td class='text-danger' colspan=5 >No records found.</td></tr>";
		}else {
			foreach ($studentList as $student) {
			$url = '../admin/add_edit_student.php?action=edit&studId='.$student['studID'];
			$output .= "<tr>
							<td>{$student['studID']}</td>
							<td>{$student['last_name']}</td>
							<td>{$student['first_name']}</td>
							<td>{$student['middle_name']}</td>
							<td style='width: 80px;'>
								<a id='editStudent' href={$url} title='Edit' style='text-decoration: none'>
									<i class='fa fa-pencil-square-o text-warning' style='padding:4px;''></i>
								</a>
							</td>
						</tr>";	
			}
		}		
		echo $output;
	}
 ?>