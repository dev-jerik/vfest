<?php
    session_start();
    $_SESSION['active_page'] = "admin/student_files";
    include "../common/header.php";
    include_once '../../model/Config.php';
    include_once '../../model/StudentModel.php';
    $studModel = new StudentModel($DB_con);

    if(isset($_POST['save'])) {
        // Save data to database
    } else if(isset($_POST['edit'])) {
        $studModel->updateStudent($_POST['studId'], $_POST['lastName'], $_POST['firstName'], $_POST['middleName'],
        $_POST['gender'], $_POST['birthdate'], $_POST['birthPlace'], $_POST['religion'], $_POST['currGradeLevel'], 
        $_POST['address'], $_POST['phoneNumber']);
    } 

    if (isset($_POST['action'])) { // Fix refresh browser
        $_SESSION['action'] = $_POST['action'];
    }
    $action =  $_SESSION['action'];
   
    $header = "";
    $student = null;
    if ($action == "add") {
        $header="Add Student";
        // Create empty student object
        $studentInfo = array("studID" => "", "last_name"=>"", "first_name"=>"", "middle_name"=>"",
        "gender"=>"m", "dob"=>"", "pob"=>"", "religion"=>"", "last_school"=>"",
        "phone"=>"", "school_add"=>"", "curr_grdlevel"=>"", "fam_add"=>"", 
        "teacher"=>"");
    } else if ($action == "edit") {
        $header="Edit Student";
        // Fix refresh browser
        if(isset($_POST['studId'])) {
            $_SESSION['studId'] = $_POST['studId'];
        } 

        $studId = $_SESSION['studId'];
        
        $studentInfo = $studModel->getStudentInfo($studId);
    } 
    
?>

<div class="main">
    <!-- <?php echo $studentInfo['curr_grdlevel']; ?> -->
    <div class="header clearfix" style="border-bottom: 1px solid rgba(0,0,0,.1); margin-bottom: 8px;">
        <div style="float:left">
            <h4 class="text-success"><?php echo $header; ?></h4>
        </div>
    </div>
    <form method="POST">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="studId">Student ID</label>
                <input type="text" readonly class="form-control form-control-sm" name="studId"
                    value='<?= $studentInfo['studID'] ?>'>
            </div>
            <div class="form-group col-md-3">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control form-control-sm" name="lastName"
                    value='<?= $studentInfo['last_name'] ?>'>
            </div>
            <div class="form-group col-md-3">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control form-control-sm" name="firstName"
                    value='<?= $studentInfo['first_name'] ?>'>
            </div>
            <div class="form-group col-md-3">
                <label for="middleName">Middle Name</label>
                <input type="text" class="form-control form-control-sm" name="middleName"
                    value='<?= $studentInfo['middle_name'] ?>'>
            </div>
            <div class="form-group col-md-3">
                <label for="birthDate">Birthdate</label>
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" name="birthdate"
                        aria-describedby="basic-addon2" value='<?= $studentInfo['dob'] ?>'>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"
                                aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="birthPlace">Birth Place</label>
                <input type="text" class="form-control form-control-sm" name="birthPlace" value='<?= $studentInfo['pob'] ?>'>
            </div>
            <div class="form-group col-md-3">
                <label for="Religion">Religion</label>
                <?php $religionList=array('Catholic','Protestant', 'Islam',
                    'Iglesia ni Cristo', 'Baptist', 'Sevent Day Adventist',
                    'Methodist', 'UCCP', 'Jehova\'s Witness', 'Others'); ?>
                <select class="custom-select custom-select-sm" name="religion" required>
                    <option value="0">Please select religion</option>';
                    <?php foreach($religionList as $religion): ?>
                        <?php $selected=($religion ==  $studentInfo['religion'])? "selected" : ""; ?>
                        <option <?= $selected ?>><?= $religion ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" class="form-control form-control-sm" name="phoneNumber" value='<?= $studentInfo['phone'] ?>'>
            </div>
            <div class="form-group col-md-3">
                <label for="address">Address</label>
                <input type="text" class="form-control form-control-sm" name="address" value='<?= $studentInfo['fam_add']?>' >
            </div>
            <div class="form-group col-md-3">
                <label for="currGradeLevel">Current Grade Level</label>
                <select class="custom-select custom-select-sm" name="currGradeLevel" required>
                    <option value="0">Please select curriculum</option>';
                    <?php  
                        include_once '../../model/CurriculumModel.php';
                        $currCulumModel = new CurriculumModel($DB_con);
                        $currCulumList = $currCulumModel->getCurriculum();
                        foreach($currCulumList as $curriculum): 
                    ?>
                        <?php $selected=($curriculum['gradelevel'] ==  $studentInfo['curr_grdlevel'])? "selected" : ""; ?>
                        <option <?= $selected ?> value=<?= $curriculum['gradelevel'] ?>><?= $curriculum['gradename'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="currGradeLevel" style="display:block;">Gender</label>
                <div class="btn-group btn-toggle btn-group-sm gender" style="width: 100%">
                    <?php 
                        $activeGender = "'btn btn-primary active'";
                        $inActiveGender = "'btn btn-light'";
                    ?>
                    <input type='text' name="gender" id="hiddenGender" value="m" hidden />
                    <input type="button" id="male" 
                        class=<?php echo ($studentInfo['gender']=='m')? $activeGender:$inActiveGender; ?>
                         value="Male">
                    <input type="button" id="female" 
                        class=<?php echo ($studentInfo['gender']=='f')? $activeGender:$inActiveGender; ?> 
                        value="Female">
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="teacher">Teacher</label>
                <input type="text" readonly class="form-control form-control-sm" name="teacher" value='<?= $studentInfo['teacher']?>'>
            </div>
        </div>

        <hr>
        <?php if($_SESSION['action']=="add"): ?>
            <div class="pull-right">
                <button type="submit" class="btn btn-sm btn-success" style="width: 150px;" name="save">Save</button>
            </div>
        <?php endif; ?>
        <?php if($_SESSION['action']=="edit"): ?>
            <div class="pull-right">
                <button type="submit" class="btn btn-sm btn-success" style="width: 150px;" name="edit">Update</button>
            </div>
        <?php endif; ?>
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
        if ($(this).find('.active').val() == "Female") {
            $("#hiddenGender").val("f");
        } else {
            $("#hiddenGender").val("m");
        }
    });
});
</script>
<?php include "../common/footer.php"; ?>