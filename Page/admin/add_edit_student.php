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

<style>
/*Source: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_tabs */

/* Style the tab */
.tab {
    /* overflow: hidden; */
    display: table;
    width: 100%;
    height: 50px;
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
    <!-- <?php echo $studentInfo['curr_grdlevel']; ?> -->
    <div class="header clearfix" style="border-bottom: 1px solid rgba(0,0,0,.1); margin-bottom: 8px;">
        <div style="float:left">
            <h4 class="text-success"><?php echo $header; ?></h4>
        </div>
    </div>

    <div class="tab bg-light">
        <div class="tab-cell">
            <button class="tablinks active" id="tabLink1" >Student Profile</button>
        </div>
        <div class="tab-cell">
            <button class="tablinks" id="tabLink2">Family Background</button>
        </div>
        <div class="tab-cell">
            <button class="tablinks" id="tabLink3">Last School Attended</button>
        </div>
    </div>

    <div class="container" style="padding: 8px 80px;">
        <form method="POST">
            <div id="tab1" class="tabcontent" style="display:block;">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="studId">Student ID</label>
                        <input type="text" readonly class="form-control form-control-sm" name="studId"
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
                            <input type="text" class="form-control" name="birthdate" aria-describedby="basic-addon2"
                                value='<?= $studentInfo['dob'] ?>'>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"
                                        aria-hidden="true"></i></span>
                            </div>
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
                        <select class="custom-select custom-select-sm" name="currGradeLevel" required>
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
                    <div class="form-group col-md-4">
                        <label for="teacher">Teacher</label>
                        <input type="text" readonly class="form-control form-control-sm" name="teacher"
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
                <h4>Family Background</h4>
                <hr>
                <div class="pull-right">
                    <button type="button" class="btn btn-sm btn-success" style="width: 150px;" 
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
                    <button type="button" class="btn btn-sm btn-success" style="width: 150px;" 
                            onclick="selectedTab(event, 'tab2', 'tabLink2')">
                            Back
                    </button>
                    <button type="submit" class="btn btn-sm btn-success" style="width: 150px;" name="save">Save</button>
                </div>
                <?php endif; ?>
                <?php if($_SESSION['action']=="edit"): ?>
                <div class="pull-right">
                    <button type="button" class="btn btn-sm btn-success" style="width: 150px;" 
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
    $('#'+tab).css('display', 'block');
    tabLinks = $(".tab").find(".tablinks");
    for (i = 0; i < tabLinks.length; i++) {
        tabLinks[i].className = tabLinks[i].className.replace("active", "");
    }
    $('#'+tabLink).toggleClass('active');
};
</script>
<?php include "../common/footer.php"; ?>