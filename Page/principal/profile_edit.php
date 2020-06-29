<?php
    session_start();
    $_SESSION['active_page'] = "admin/profile";
    include "../common/header.php";
    include_once '../../model/Config.php';
    include_once '../../model/ProfileModel.php';
    include_once '../../model/StaffModel.php';
    $profileModel = new ProfileModel($DB_con);
    $userID = $_SESSION['user_id'];
    $info = $profileModel->getUserInfo($userID);

    $staffModel = new StaffModel($DB_con);

    $error = array();
    $success = "";

    if(isset($_POST['edit'])) {
        validateFields();
        if (count($GLOBALS['error']) == 0) {
            $perId = $_SESSION['user_id'];
            $staffModel->updateStaff($perId, $_POST['l_name'], $_POST['f_name'], $_POST['m_name'],
            $_POST['sdob'], $_POST['ssex'], $_POST['sphone'], $_POST['scivilstatus'], $_POST['shome_add'], $_POST['eligibility']);

            if($_POST['newPword1'] != ""){
                $profileModel->updateUserInfo($perId, $_POST['username'], $_POST['newPword1']);
            }
            $GLOBALS['success'] = "User Profile was updated successfully.";
            $info = $profileModel->getUserInfo($userID);
        }
    } 
    

    function validateFields() {
        if ($_POST['l_name'] == "") {
            array_push($GLOBALS['error'], "Last Name is required.");
        }
        if ($_POST['f_name'] == "") {
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
        if ($_POST['username'] == "") {
            array_push($GLOBALS['error'], "Username is required.");
        }
        if ($_POST['password'] == "") {
            array_push($GLOBALS['error'], "Current password is required.");
        }
        if ($_POST['currentPword'] != $_POST['password']) {
            array_push($GLOBALS['error'], "Current password is incorrect.");
        }
        if ($_POST['newPword1'] != $_POST['newPword2']) {
            array_push($GLOBALS['error'], "New password did not match.");
        }
    }
?>

<div class="main">
    <div class="header clearfix" style="border-bottom: 1px solid rgba(0,0,0,.1); margin-bottom: 8px;">
        <div style="float:left">
            <h4 class="text-success">Update Profile</h4>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="table-responsive">         
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
                    <br>
                    <form method="POST" action="profile_edit.php">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th width='40%'>Surname</th>  
                                    <td><input type="text" class="form-control form-control-sm" name='l_name' value='<?php echo $info['l_name']; ?>'></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>First Name</th>      
                                    <td><input type="text" class="form-control form-control-sm" name='f_name' value='<?php echo $info['f_name']; ?>'></td>
                                </tr>
                                <tr>
                                    <th>Middle Name</th> 
                                    <td><input type="text" class="form-control form-control-sm" name='m_name' value='<?php echo $info['m_name']; ?>'></td> 
                                </tr>
                                <tr>
                                    <th>Birth Date</th>     
                                    <td><input type="date" class="form-control form-control-sm" name='sdob' value='<?php echo $info['sdob']; ?>'></td> 
                                </tr>
                                <tr>
                                    <th>Gender</th>                    
                                    <td>
                                        <div class="btn-group btn-toggle btn-group-sm gender" style="width: 100%">
                                            <?php 
                                                $activeGender = "'btn btn-primary active'";
                                                $inActiveGender = "'btn btn-light'";
                                            ?>
                                            <input type='text' name="ssex" id="hiddenGender" value="m" hidden />
                                            <input type="button" id="male"
                                                class=<?php echo ($info['ssex']=='m')? $activeGender:$inActiveGender; ?>
                                                value="Male">
                                            <input type="button" id="female"
                                                class=<?php echo ($info['ssex']=='f')? $activeGender:$inActiveGender; ?>
                                                value="Female">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Contact Number</th>              
                                    <td><input type="text" class="form-control form-control-sm" name='sphone' value='<?php echo $info['sphone']; ?>'></td>
                                </tr>
                                <tr>
                                    <th>Civil Status</th> 
                                    <td>
                                        <?php $statusList=array('Single','Married', 'Live in',
                                            'Widowed', 'Separate'); ?>
                                        <select class="custom-select custom-select-sm" name="scivilstatus" required>
                                            <option value="0">Please select status</option>';
                                            <?php foreach($statusList as $status): ?>
                                            <?php $selected=($status ==  $info['scivilstatus'])? "selected" : ""; ?>
                                            <option <?= $selected ?>><?= $status ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Home Address</th>                
                                    <td><input type="text" class="form-control form-control-sm" name='shome_add' value='<?php echo $info['shome_add']; ?>'></td>   
                                </tr>
                                <tr>
                                    <th>Eligibility</th>    
                                    <td><input type="text" class="form-control form-control-sm" name='eligibility' value='<?php echo $info['eligibility']; ?>'></td>   
                                </tr>
                                
                            </body> 
                        </table>
                        <hr>
                        <h4>Account</h4>
                         <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>User Type</th>                 
                                    <td><input type="text" class="form-control form-control-sm" name='usercode' value='<?php echo $info['usercode']; ?>' disabled></td>   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th width='40%'>Username</th>    
                                    <td><input type="text" class="form-control form-control-sm" name='username' value='<?php echo $info['username']; ?>'></td>     
                                </tr>
                                <tr>
                                    <th>Current Password <input type='text' name='currentPword' value='<?php echo $info['password']; ?>' hidden></th>    
                                    <td><input type="password" class="form-control form-control-sm" name='password' value='<?php echo $info['password']; ?>'></td>     
                                </tr>
                                <tr>
                                    <th>New Password</th>    
                                    <td><input type="password" class="form-control form-control-sm" name='newPword1' value=''></td>     
                                </tr>
                                <tr>
                                    <th>Re-enter Password</th>    
                                    <td><input type="password" class="form-control form-control-sm" name='newPword2' value=''></td>     
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-sm btn-success" style="width: 150px;"
                            name="edit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
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
</script>

<!--Script Here-->
<?php include "../common/footer.php"; ?>