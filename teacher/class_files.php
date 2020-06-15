<?php
	session_start();
	require "../dao/TeacherDAO.php";
	$teacher = new TeacherDAO;
	$classList = $teacher->getClass($_SESSION['perID']);
	$_SESSION['page'] = "class";
?>

<!DOCTYPE html>
<html>
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
						<div class="page-header clearfix" style="border-bottom: none">
	                        <h2 class="pull-left">List of Student<br />
	                        	<small>SY: <?php echo date("Y"); ?></small></h2>
                   		</div>
	                    <div>
	                    	<div class="table-responsive">
								<table class="table table bordered">
							   	<tr>
							    	<th class="table-header" width="20%">Student ID</th>
							      	<th class="table-header">Name</th>
							      	<th class="table-header">Grade Level</th>
							      	<th class="table-header" width="10%" style="text-align:center">Action</th>
							    </tr>
		                        <?php foreach ($classList as $class): ?>
		                        	<tr>
		                        		<td><?php echo $class['studID'] ?></td>
									    <td><?php echo $class['name']; ?></td>
									    <td><?php echo $class['gradelevel'] ?></td>
										<td style="text-align:center"><a id="edit" href="#" title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>									
									</tr>
		                        <?php endforeach; ?>
	                        	</table>
	                    </div>
					</div>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    $(document).ready(function(){
        
    });
</script>