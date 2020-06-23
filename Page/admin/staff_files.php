<?php
    session_start();
    $_SESSION['active_page'] = "admin/staff_files";
    include "../common/header.php";
    include_once '../../model/Config.php';
    include_once '../../model/StaffModel.php';
    $staffModel = new StaffModel($DB_con);
    $staffList = $staffModel->searchStaff();
?>

<div class="main">
    <div class="header clearfix" style="border-bottom: 1px solid rgba(0,0,0,.1); margin-bottom: 8px;">
        <div style="float:left">
            <h4 class="text-success">Search Staff</h4>
        </div>
        <div style="float:right">
            <form action="add_edit_staff.php" method="POST">
                <input value="add" name="action" hidden>
                <button class="btn btn-success btn-sm">Add New Record</button>
            </form>
        </div>
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-sm" id="searchStaff"
            placeholder="Enter Staff's Last Name or First Name">
    </div>
    <table class="table table-sm table-striped table-hover">
        <thead>
            <tr>
                <th>Staff ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody id="staffList">
            <?php 
            foreach ($staffList as $staff):  ?>
            <tr>
                <td><?php echo $staff['perID']; ?></td>
                <td><?php echo $staff['l_name']; ?></td>
                <td><?php echo $staff['f_name']; ?></td>
                <td><?php echo $staff['m_name']; ?></td>
                <td class="text-center" style="width: 100px;">
                    <form action="../admin/add_edit_staff.php" method="POST">
                        <input value="edit" name="action" hidden>
                        <input value=<?= $staff['perID'] ?> name="perID" hidden>

                        <button type="submit" style="border:none; background:none"><i class="fa fa-pencil-square-o text-warning"
                                style="padding:4px;"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<!--Script Here-->
<script>
$(document).ready(function() {
    $(document).on("keyup", "#searchStaff", function() {
        var searchValue = $(this).val();
        $.post("../../model/StaffService.php", {
                search: searchValue,
                action: "searchStaff"
            },
            function(data) {
                $("#staffList").html(data);
            }
        );
    });
});
</script>
<?php include "../common/footer.php"; ?>