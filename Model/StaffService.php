<?php 
	include_once 'Config.php';
	include_once 'StaffModel.php';

	$action=isset($_POST['action'])?$_POST['action']:"";

	if ($action == "searchStaff") {
		searchStaff($_POST['search']);
	} else {
		echo "Invalid parameter action: ".$action;
	}

	function searchStaff($search) {
		$staffModel = new StaffModel($GLOBALS['DB_con']);
		$staffList = $staffModel->searchStaff($search);
		$output = "";

		if($staffList === 0 || count($staffList) === 0){
			$output .= "<tr><td class='text-danger' colspan=5 >No records found.</td></tr>";
		}else {
			foreach ($staffList as $staff) {
			$url = '../admin/add_edit_staff.php?action=edit&perID='.$staff['perID'];
			$output .= "<tr>
							<td>{$staff['perID']}</td>
							<td>{$staff['l_name']}</td>
							<td>{$staff['f_name']}</td>
							<td>{$staff['m_name']}</td>
							<td class='text-center' style='width: 80px;'>
								<form action='../admin/add_edit_staff.php' method='POST'>
									<input value='edit' name='action' hidden>
									<input value={$staff['perID']} name='perID' hidden>
									<button type='submit' style='border:none; background:none'><i class='fa fa-pencil-square-o text-warning'
											style='padding:4px;'></i></button>
								</form>
							</td>
						</tr>";	
			}
		}		
		echo $output;
	}
 ?>