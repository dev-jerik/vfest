<?php
    session_start();
    $_SESSION['active_page'] = "admin/student_files";
    include "../common/header.php";
    include_once '../../model/Config.php';
    include_once '../../model/StudentModel.php';
    $studModel = new StudentModel($DB_con);

    $error = array();
    $success = "";
 
    if(isset($_POST['save'])) {
        validateFields();
        if (count($GLOBALS['error']) == 0) {
            $studModel->saveStudent($_POST['studId'], $_POST['lastName'], $_POST['firstName'], $_POST['middleName'],
            $_POST['gender'], $_POST['birthDate'], $_POST['birthPlace'], $_POST['religion'], $_POST['currGradeLevel'], 
            $_POST['address'], $_POST['phoneNumber']);
            $GLOBALS['success'] = "Student Profile was saved successfully.";
        }
    } else if(isset($_POST['edit'])) {
        validateFields();
        if (count($GLOBALS['error']) == 0) {
            $studModel->updateStudent($_POST['studId'], $_POST['lastName'], $_POST['firstName'], $_POST['middleName'],
            $_POST['gender'], $_POST['birthDate'], $_POST['birthPlace'], $_POST['religion'], $_POST['currGradeLevel'], 
            $_POST['address'], $_POST['phoneNumber']);
            $GLOBALS['success'] = "Student Profile was updated successfully.";
        }
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

        $parentInfo = array("PID" => "", "role" => "", "plast_name"=>"", "pfirst_name"=>"", "pmiddle_name"=>"",
        "psex"=>"m", "occupation"=>"", "VSUconnected"=>"No", "deptoffice"=>"", "officehead"=>"",
        "officeAdd"=>"");
    } else if ($action == "edit") {
        $header="Edit Student";
        // Fix refresh browser
        if(isset($_POST['studId'])) {
            $_SESSION['studId'] = $_POST['studId'];
        } 

        $studId = $_SESSION['studId'];
        
        $studentInfo = $studModel->getStudentInfo($studId);
    } 
    

    function validateFields() {
        if ($_POST['studId'] == "") {
            array_push($GLOBALS['error'], "Student ID is required.");
        }
        if ($_POST['lastName'] == "") {
            array_push($GLOBALS['error'], "Last Name is required.");
        }
        if ($_POST['firstName'] == "") {
            array_push($GLOBALS['error'], "First Name is required.");
        }
        if ($_POST['birthDate'] == "") {
            array_push($GLOBALS['error'], "Birth Date is required.");
        }
        if ($_POST['birthPlace'] == "") {
            array_push($GLOBALS['error'], "Birth Place is required.");
        }
        if ($_POST['religion'] == "0") {
            array_push($GLOBALS['error'], "Religion is required.");
        }
        if ($_POST['currGradeLevel'] == "0") {
            array_push($GLOBALS['error'], "Current Grade Level is required.");
        }
    }
?>

<style>
/*Source: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_tabs */

/* Style the tab */
.tab {
    /* overflow: hidden; */
    display: table;
    width: 100%;
    height: 50px;
    margin-bottom: 8px;
}

.tab-cell {
    display: table-cell;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    /* float: left; */
    border: none;
    outline: none;
    cursor: default;
    transition: 0.3s;
    font-size: 17px;
    width: 100%;
    height: 100%;
    border-right: 1px solid rgba(0, 0, 0, .1);
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #17a2b8;
    color: white;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    /* border: 1px solid #ccc; */
    border-top: none;
}
</style>

<div class="main">
    <div class="header clearfix" style="border-bottom: 1px solid rgba(0,0,0,.1); margin-bottom: 8px;">
        <div style="float:left">
            <h4 class="text-success"><?php echo $header; ?></h4>
        </div>
    </div>

    <div class="tab bg-light">
        <div class="tab-cell">
            <button class="tablinks active" id="tabLink1">Student Profile</button>
        </div>
        <div class="tab-cell">
            <button class="tablinks" id="tabLink2">Family Background</button>
        </div>
        <div class="tab-cell">
            <button class="tablinks" id="tabLink3">Last School Attended</button>
        </div>
    </div>
    <?php foreach($error as $err):?>
        <div class="alert alert-danger" role="alert" style="padding: 4px; margin-bottom: 2px;">
            <?= $err ?>
        </div>
    <?php endforeach; ?>
    <?php if ($success != ""):?>
        <div class="alert alert-success" role="alert" style="padding: 4px; margin-bottom: 2px;">
            <?= $success ?>
        </div>
    <?php endif; ?>
    
    <div class="container" style="padding: 8px 80px;">
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <div id="tab1" class="tabcontent" style="display:block;">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="studId">Student ID</label>
                        <input type="text" <?php echo ($action=="add")?"":"readonly"; ?> class="form-control form-control-sm" name="studId"
                            value='<?= $studentInfo['studID'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control form-control-sm" name="lastName"
                            value='<?= $studentInfo['last_name'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control form-control-sm" name="firstName"
                            value='<?= $studentInfo['first_name'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="middleName">Middle Name</label>
                        <input type="text" class="form-control form-control-sm" name="middleName"
                            value='<?= $studentInfo['middle_name'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="birthDate">Birthdate</label>
                        <div class="input-group input-group-sm">
                            <input type="date" class="form-control form-control-plaindate" name="birthDate"
                                value='<?= $studentInfo['dob'] ?>'>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="birthPlace">Birth Place</label>
                        <input type="text" class="form-control form-control-sm" name="birthPlace"
                            value='<?= $studentInfo['pob'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
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
                    <div class="form-group col-md-4">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control form-control-sm" name="phoneNumber"
                            value='<?= $studentInfo['phone'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="address">Address</label>
                        <input type="text" class="form-control form-control-sm" name="address"
                            value='<?= $studentInfo['fam_add']?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="currGradeLevel">Current Grade Level</label>
                        <select class="custom-select custom-select-sm" id="currGradeLevel" name="currGradeLevel" required>
                            <option value="0">Please select curriculum</option>';
                            <?php  
                                include_once '../../model/CurriculumModel.php';
                                $currCulumModel = new CurriculumModel($DB_con);
                                $currCulumList = $currCulumModel->getCurriculum();
                                foreach($currCulumList as $curriculum): 
                            ?>
                            <?php $selected=($curriculum['gradelevel'] ==  $studentInfo['curr_grdlevel'])? "selected" : ""; ?>
                            <option <?= $selected ?> value=<?= $curriculum['gradelevel'] ?>>
                                <?= $curriculum['gradename'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="gender" style="display:block;">Gender</label>
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
                    <div class="form-group col-md-4">
                        <label for="teacher">Teacher</label>
                        <input type="text" readonly class="form-control form-control-sm" id="teacher" name="teacher"
                            value='<?= $studentInfo['teacher']?>'>
                    </div>
                </div>

                <hr>
                <div class="pull-right">
                    <button type="button" class="btn btn-sm btn-success" style="width: 150px;"
                        onclick="selectedTab(event, 'tab2', 'tabLink2')">
                        Next
                    </button>
                </div>
            </div>
            <div id="tab2" class="tabcontent">
                <h4>Parents/Guardian</h4>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="role">Role</label>
                        <input type="text" class="form-control form-control-sm" name="role"
                            value='<?= $parentInfo['role'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="plast_name">Last Name</label>
                        <input type="text" class="form-control form-control-sm" name="plast_name"
                            value='<?= $parentInfo['plast_name'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="pfirst_name">First Name</label>
                        <input type="text" class="form-control form-control-sm" name="pfirst_name"
                            value='<?= $parentInfo['pfirst_name'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="pmiddle_name">First Name</label>
                        <input type="text" class="form-control form-control-sm" name="pmiddle_name"
                            value='<?= $parentInfo['pmiddle_name'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="psex" style="display:block;">Gender</label>
                        <div class="btn-group btn-toggle btn-group-sm gender" style="width: 100%">
                            <?php 
                                $activeGender = "'btn btn-primary active'";
                                $inActiveGender = "'btn btn-light'";
                            ?>
                            <input type='text' name="psex" id="hiddenGender" value="m" hidden />
                            <input type="button" id="male"
                                class=<?php echo ($parentInfo['psex']=='m')? $activeGender:$inActiveGender; ?>
                                value="Male">
                            <input type="button" id="female"
                                class=<?php echo ($parentInfo['psex']=='f')? $activeGender:$inActiveGender; ?>
                                value="Female">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="occupation">Occupation</label>
                        <input type="text" class="form-control form-control-sm" name="occupation"
                            value='<?= $parentInfo['occupation'] ?>'>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="VSUconnected" style="display:block;">VSU Connected</label>
                        <div class="btn-group btn-toggle btn-group-sm VSUconnected" style="width: 100%">
                            <?php 
                                $activeAnswer = "'btn btn-primary active'";
                                $inActiveAnswer = "'btn btn-light'";
                            ?>
                            <input type='text' name="VSUconnected" id="hiddenGender" value="No" hidden />
                            <input type="button" id="no"
                                class=<?php echo ($parentInfo['VSUconnected']=='No')? $activeAnswer:$inActiveAnswer; ?>
                                value="No">
                            <input type="button" id="yes"
                                class=<?php echo ($parentInfo['VSUconnected']=='Yes')? $activeAnswer:$inActiveAnswer; ?>
                                value="Yes">
                        </div>
                    </div>
                    <div class="form-group col-md-4"></div>
                    <div class="form-group col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="deptoffice">Dept. Office</label>
                        <input type="text" class="form-control form-control-sm" id="deptoffice" name="deptoffice" 
                        value="<?= $parentInfo["deptoffice"] ?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="officehead">Office Head</label>
                        <input type="text" class="form-control form-control-sm" id="officehead" name="officehead" 
                        value="<?= $parentInfo["officehead"] ?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="officeAdd">Office Address</label>
                        <input type="text" class="form-control form-control-sm" id="officeAdd" name="officeAdd" 
                        value="<?= $parentInfo["officeAdd"] ?>" disabled>
                    </div>
                </div>
                <hr>
                <h4>Siblings</h4>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="role">Name</label>
                        <input type="text" class="form-control form-control-sm" name="role"
                            value='<?= $parentInfo['role'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="birthDate">Birthdate</label>
                        <div class="input-group input-group-sm">
                            <input type="date" class="form-control form-control-plaindate" name="birthDate"
                                value='<?= $studentInfo['dob'] ?>'>
                        </div>
                    </div>
                    <div class="form-group col-md-4"></div>
                </div>
                <hr>
                <div class="pull-right">
                    <button type="button" class="btn btn-sm btn-light" style="width: 150px;"
                        onclick="selectedTab(event, 'tab1', 'tabLink1')">
                        Back
                    </button>
                    <button type="button" class="btn btn-sm btn-success" style="width: 150px;"
                        onclick="selectedTab(event, 'tab3', 'tabLink3')">
                        Next
                    </button>
                </div>
            </div>
            <div id="tab3" class="tabcontent">
                <h4>Last School</h4>
                <hr>
                <?php if($_SESSION['action']=="add"): ?>
                <div class="pull-right">
                    <button type="button" class="btn btn-sm btn-light" style="width: 150px;"
                        onclick="selectedTab(event, 'tab2', 'tabLink2')">
                        Back
                    </button>
                    <button type="submit" class="btn btn-sm btn-success" style="width: 150px;" name="save">Save</button>
                </div>
                <?php endif; ?>
                <?php if($_SESSION['action']=="edit"): ?>
                <div class="pull-right">
                    <button type="button" class="btn btn-sm btn-light" style="width: 150px;"
                        onclick="selectedTab(event, 'tab2', 'tabLink2')">
                        Back
                    </button>
                    <button type="submit" class="btn btn-sm btn-success" style="width: 150px;"
                        name="edit">Update</button>
                </div>
                <?php endif; ?>
            </div>
        </form>
    </div>
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
    $('.VSUconnected').click(function() {
        $(this).find('.btn').toggleClass('active');
        if ($(this).find('.btn-primary').length > 0) {
            $(this).find('.btn').toggleClass('btn-primary');
        }
        $(this).find('.btn').toggleClass('btn-light');
        if ($(this).find('.active').val() == "Yes") {
            $("#hiddenGender").val("Yes");
            document.getElementById('deptoffice').disabled = false;
            document.getElementById('officehead').disabled = false;
            document.getElementById('officeAdd').disabled = false;
        } else {
            $("#hiddenGender").val("No");
            document.getElementById('deptoffice').disabled = true;
            document.getElementById('officehead').disabled = true;
            document.getElementById('officeAdd').disabled = true;
        }
    });

    $(document).on("change", "#currGradeLevel", function() {
        var searchValue = $(this).val();
        $.post("../../model/TeacherService.php", {
                search: searchValue,
                action: "findTeacher"
            },
            function(data) {
                $("#teacher").val(data);
            }
        );
    });
});

function selectedTab(evt, tab, tabLink) {
    var i, tabcontent, tablinks;
    tabcontent = $(".container").find(".tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    // tablinks = $(".tablinks");
    // for (i = 0; i < tablinks.length; i++) {
    //     tablinks[i].className = tablinks[i].className.replace("active", "");
    // }
    $('#' + tab).css('display', 'block');
    tabLinks = $(".tab").find(".tablinks");
    for (i = 0; i < tabLinks.length; i++) {
        tabLinks[i].className = tabLinks[i].className.replace("active", "");
    }
    $('#' + tabLink).toggleClass('active');
};
</script>
<?php include "../common/footer.php"; ?>