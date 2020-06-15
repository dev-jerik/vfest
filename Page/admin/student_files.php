<?php
	session_start();
	$_SESSION['active_page'] = "admin/student_files";
    include "../Common/header.php";
    include_once '../../Model/Config.php';
    include_once '../../Model/StudentModel.php';
    $stud = new StudentModel($DB_con);
    $studentList = $stud->getStudents();
?>

<div class="main">
       <h2 class="text-success">Students</h2>
       <table class="table">
    <thead>
      <tr>
        <th>Student ID</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($studentList as $student): ?>
		<tr>
	      	<td><?php echo $student['studID']; ?></td>
	        <td><?php echo $student['last_name']; ?></td>
	        <td><?php echo $student['first_name']; ?></td>
	        <td><?php echo $student['middle_name']; ?></td>
	        <td>delete</td>
	    </tr>
	<?php endforeach; ?>
      
    </tbody>
</table>

</div>

<?php include "../Common/footer.php";?>
