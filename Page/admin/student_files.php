<?php
    session_start();
    $_SESSION['active_page'] = "admin/student_files";
    include "../common/header.php";
    include_once '../../model/Config.php';
    include_once '../../model/StudentModel.php';
    $studModel = new StudentModel($DB_con);
    $studentList = $studModel->searchStudent();
?>

<div class="main">
    <div class="header clearfix" style="border-bottom: 1px solid rgba(0,0,0,.1); margin-bottom: 8px;">
        <div style="float:left">
            <h4 class="text-success">Search Student</h4>
        </div>
        <div style="float:right">
            <form action="add_edit_student.php" method="POST">
                <input value="add" name="action" hidden>
                <button class="btn btn-success btn-sm">Add New Record</button>
            </form>
        </div>
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-sm" id="searchStudent"
            placeholder="Enter Student's Last Name or First Name">
    </div>
    <table class="table table-sm table-striped table-hover">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody id="studentList">
            <?php 
            foreach ($studentList as $student):  ?>
            <tr>
                <td><?php echo $student['studID']; ?></td>
                <td><?php echo $student['last_name']; ?></td>
                <td><?php echo $student['first_name']; ?></td>
                <td><?php echo $student['middle_name']; ?></td>
                <td class="text-center" style="width: 100px;">
                    <form action="../admin/add_edit_student.php" method="POST">
                        <input value="edit" name="action" hidden>
                        <input value=<?= $student['studID'] ?> name="studId" hidden>

                        <button type="submit" style="border:none; background:none"><i class="fa fa-pencil-square-o text-warning"
                                style="padding:4px;"></i></button>
                        <a href="#myModal" class="trigger-btn openDelete"  data-id="<?php echo $student['studID']; ?>" data-toggle="modal" style="border:none; background:none">
                                <i class="fa fa-trash-o text-warning" style="padding:4px;"></i></a>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Are you sure?</h4>  
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete this records? </p>
                    <input value="" name="studId" id="studId" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger delete" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!--Script Here-->
<script>
$(document).ready(function() {
    $(document).on("keyup", "#searchStudent", function() {
        var searchValue = $(this).val();
        $.post("../../model/StudentService.php", {
                search: searchValue,
                action: "searchStudent"
            },
            function(data) {
                $("#studentList").html(data);
            }
        );
    });
    $('.openDelete').click(function() {
        document.getElementById("studId").value = $(this).data('id');
    });
    $('.delete').click(function() {
        var searchValue = document.getElementById("studId").value;
        $.post("../../model/StudentService.php", {
                search: searchValue,
                action: "deleteStudent"
            },
            function(data) {
                $("#studentList").html(data);
            }
        );
    });
});
</script>
<?php include "../common/footer.php"; ?>