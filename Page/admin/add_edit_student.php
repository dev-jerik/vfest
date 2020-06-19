<?php
    session_start();
    $_SESSION['active_page'] = "admin/student_files";
    include "../common/header.php";
    include_once '../../model/Config.php';
    include_once '../../model/StudentModel.php';
    $studModel = new StudentModel($DB_con);
    $action = $_GET['action'];
    // Create empty student object
    $student = array("studID" => "", "last_name"=>"", "first_name"=>"", "middle_name"=>"",
                "gender"=>"m", "dob"=>"", "pob"=>"", "religion"=>"", "last_scholl"=>"",
                "school_add"=>"", "currgrdlevel"=>"", "fam_add"=>"", "teacher"=>"");
    $header = "";
    if ($action == "add") {
        $header="Add Student";
    } else {
        $header="Edit Student";
        $studId = $_GET['studId'];
        $student = $studModel->findStudent($studId);
    }
?>

<div class="main">
    <!-- <?php   print_r($student); ?> -->
    <div class="header clearfix" style="border-bottom: 1px solid rgba(0,0,0,.1); margin-bottom: 8px;">
        <div style="float:left">
            <h4 class="text-success"><?php echo $header; ?></h4>
        </div>
    </div>
    <form method="POST">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="studentId">Student ID</label>
                <input type="text" class="form-control form-control-sm" name="studentId"
                    value=<?= $student['studID'] ?>>
            </div>
            <div class="form-group col-md-3">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control form-control-sm" name="lastName"
                    value=<?= $student['last_name'] ?>>
            </div>
            <div class="form-group col-md-3">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control form-control-sm" name="firstName"
                    value=<?= $student['first_name'] ?>>
            </div>
            <div class="form-group col-md-3">
                <label for="middleName">Middle Name</label>
                <input type="text" class="form-control form-control-sm" name="middleName"
                    value=<?= $student['middle_name'] ?>>
            </div>
            <div class="form-group col-md-3">
                <label for="birthDate">Birthdate</label>
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" aria-label="Recipient's username"
                        aria-describedby="basic-addon2" value=<?= $student['dob'] ?>>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"
                                aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="birthPlace">Birth Place</label>
                <input type="text" class="form-control form-control-sm" name="birthPlace" value=<?= $student['pob'] ?>>
            </div>
            <div class="form-group col-md-3">
                <label for="Religion">Religion</label>
                <?php $religionList=array('Catholic','Protestant', 'Islam',
                    'Iglesia ni Cristo', 'Baptist', 'Sevent Day Adventist',
                    'Methodist', 'UCCP', 'Jehova\'s Witness', 'Others'); ?>
                <select class="custom-select custom-select-sm" name="religion" required>
                    <option value="0">Please select religion</option>';
                    <?php foreach($religionList as $religion): ?>
                        <?php $selected=($religion ==  $student['religion'])? "selected" : ""; ?>
                        <option <?= $selected ?>><?= $religion ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" class="form-control form-control-sm" name="phoneNumber">
            </div>
            <div class="form-group col-md-3">
                <label for="address">Address</label>
                <input type="text" class="form-control form-control-sm" name="address">
            </div>
            <div class="form-group col-md-3">
                <label for="currGradeLevel">Current Grade Level</label>
                <input type="text" class="form-control form-control-sm" name="currGradeLevel">
            </div>
            <div class="form-group col-md-3">
                <label for="currGradeLevel" style="display:block;">Gender</label>
                <div class="btn-group btn-toggle btn-group-sm gender" style="width: 100%">
                    <input type="button" name="gender" class="btn btn-light" value="Male">
                    <input type="button" name="gender" class="btn btn-primary active" value="Female">
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="currGradeLevel">Teacher</label>
                <input type="text" class="form-control form-control-sm" name="currGradeLevel">
            </div>
        </div>

        <hr>
        <div class="pull-right">
            <button type="button" class="btn btn-sm btn-success" style="width: 150px;">Save</button>
        </div>
    </form>
</div>

<!--Script Here-->
<script>
$(document).ready(function() {
    $('.gender').click(function() {
        $(this).find('.btn').toggleClass('active');
        if ($(this).find('.btn-primary').length > 0) {
            $(this).find('.btn').toggleClass('btn-primary');
        }
        $(this).find('.btn').toggleClass('btn-light');
    });
});
</script>
<?php include "../common/footer.php"; ?>