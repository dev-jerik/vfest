<?php
    session_start();
    $_SESSION['active_page'] = "admin/staff_files";
    include "../common/header.php";
    include_once '../../model/Config.php';
    include_once '../../model/StaffModel.php';
    $staffModel = new StaffModel($DB_con);

    $error = array();
    $success = "";

    $lastID = $staffModel->getLastID();
    $nextID = $lastID['perID']+1;
 
    if(isset($_POST['save'])) {
        validateFields();
        if (count($GLOBALS['error']) == 0) {
            $staffModel->saveStaff($nextID, $_POST['lastName'], $_POST['firstName'], $_POST['middleName'],
            $_POST['sdob'], $_POST['ssex'], $_POST['sphone'], $_POST['scivilstatus'], $_POST['shome_add'], $_POST['eligibility']);
            $GLOBALS['success'] = "Staff Profile was saved successfully.";
        }
    } else if(isset($_POST['edit'])) {
        validateFields();
        if (count($GLOBALS['error']) == 0) {
            if(isset($_POST['perID'])) {
                $_SESSION['perID'] = $_POST['perID'];
            } 
            $perId = $_SESSION['perID'];
            $staffModel->updateStaff($perId, $_POST['lastName'], $_POST['firstName'], $_POST['middleName'],
            $_POST['sdob'], $_POST['ssex'], $_POST['sphone'], $_POST['scivilstatus'], $_POST['shome_add'], $_POST['eligibility']);
            $GLOBALS['success'] = "Staff Profile was updated successfully.";
        }

    } 
 
    if (isset($_POST['action'])) { // Fix refresh browser
        $_SESSION['action'] = $_POST['action'];
    }
    $action =  $_SESSION['action'];

    $header = "";
    $staff = null;
    if ($action == "add") {
        $header="Add Staff";
        // Create empty student object
        $staffInfo = array("l_name"=>"", "f_name"=>"", "m_name"=>"", "ssex"=>"m", 
        "sdob"=>"", "sphone"=>"", "scivilstatus"=>"", "shome_add"=>"", "eligibility"=>"");

        $staffBackgroundInfo = array("level"=>"", "perID"=>"", "degree"=>"", "school"=>"", 
        "yrstart"=>"", "yrend"=>"");
    } else if ($action == "edit") {
        $header="Edit Staff";
        // Fix refresh browser
        if(isset($_POST['perID'])) {
            $_SESSION['perID'] = $_POST['perID'];
        } 

        $perId = $_SESSION['perID'];
        
        $staffInfo = $staffModel->getStaffInfo($perId);
        $staffBackgroundInfo = $staffModel->getStaffBackgroundInfo($perId);

        if($staffBackgroundInfo == null){
            $staffBackgroundInfo = array("level"=>"", "perID"=>"", "degree"=>"", "school"=>"", 
            "yrstart"=>"", "yrend"=>"");
        }
    } 
    

    function validateFields() {
        if ($_POST['lastName'] == "") {
            array_push($GLOBALS['error'], "Last Name is required.");
        }
        if ($_POST['firstName'] == "") {
            array_push($GLOBALS['error'], "First Name is required.");
        }
        if ($_POST['sdob'] == "") {
            array_push($GLOBALS['error'], "Birth Date is required.");
        }
        if ($_POST['scivilstatus'] == "") {
            array_push($GLOBALS['error'], "Civil Status is required.");
        }
        if ($_POST['shome_add'] == "0") {
            array_push($GLOBALS['error'], "Home Adress is required.");
        }
        if ($_POST['eligibility'] == "0") {
            array_push($GLOBALS['error'], "Eligibility is required.");
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
            <button class="tablinks active" id="tabLink1">Staff Profile</button>
        </div>
        <div class="tab-cell">
            <button class="tablinks" id="tabLink2">Educational Background</button>
        </div>
        <div class="tab-cell">
            <button class="tablinks" id="tabLink3">Work History</button>
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
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control form-control-sm" name="lastName"
                            value='<?= $staffInfo['l_name'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control form-control-sm" name="firstName"
                            value='<?= $staffInfo['f_name'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="middleName">Middle Name</label>
                        <input type="text" class="form-control form-control-sm" name="middleName"
                            value='<?= $staffInfo['m_name'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="sdob">Birthdate</label>
                        <div class="input-group input-group-sm">
                            <input type="date" class="form-control form-control-plaindate" name="sdob"
                                value='<?= $staffInfo['sdob'] ?>'>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="currGradeLevel" style="display:block;">Gender</label>
                        <div class="btn-group btn-toggle btn-group-sm gender" style="width: 100%">
                            <?php 
                        $activeGender = "'btn btn-primary active'";
                        $inActiveGender = "'btn btn-light'";
                    ?>
                            <input type='text' name="ssex" id="hiddenGender" value="m" hidden />
                            <input type="button" id="male"
                                class=<?php echo ($staffInfo['ssex']=='m')? $activeGender:$inActiveGender; ?>
                                value="Male">
                            <input type="button" id="female"
                                class=<?php echo ($staffInfo['ssex']=='f')? $activeGender:$inActiveGender; ?>
                                value="Female">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="sphone">Phone Number</label>
                        <input type="text" class="form-control form-control-sm" name="sphone"
                            value='<?= $staffInfo['sphone'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="scivilstatus">Civil Status</label>
                        <?php $statusList=array('Single','Married', 'Live in',
                    'Widowed', 'Separate'); ?>
                        <select class="custom-select custom-select-sm" name="scivilstatus" required>
                            <option value="0">Please select status</option>';
                            <?php foreach($statusList as $status): ?>
                            <?php $selected=($status ==  $staffInfo['scivilstatus'])? "selected" : ""; ?>
                            <option <?= $selected ?>><?= $status ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="shome_add">Home Address</label>
                        <input type="text" class="form-control form-control-sm" name="shome_add"
                            value='<?= $staffInfo['shome_add'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="eligibility">Eligibility</label>
                        <input type="text" class="form-control form-control-sm" name="eligibility"
                            value='<?= $staffInfo['eligibility']?>'>
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
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="degree">Degree</label>
                        <input type="text" class="form-control form-control-sm" name="degree"
                            value='<?= $staffBackgroundInfo['degree'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="yrstart">Year Started</label>
                        <input type="text" class="form-control form-control-sm" name="yrstart"
                            value='<?= $staffBackgroundInfo['yrstart'] ?>'>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="yrend">Year Ended</label>
                        <input type="text" class="form-control form-control-sm" name="yrend"
                            value='<?= $staffBackgroundInfo['yrend'] ?>'>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="school">School Name</label>
                        <input type="text" class="form-control form-control-sm" name="school"
                            value='<?= $staffBackgroundInfo['school'] ?>'>
                    </div>
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
                <h4>Work Info</h4>
                
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