<?php
    session_start();
    $_SESSION['active_page'] = "admin/profile";
    include "../common/header.php";
    include_once '../../model/Config.php';
    include_once '../../model/ProfileModel.php';
    $profileModel = new ProfileModel($DB_con);
    $userID = $_SESSION['user_id'];
    $info = $profileModel->getUserInfo($userID);
?>

<div class="main">
    <div class="header clearfix" style="border-bottom: 1px solid rgba(0,0,0,.1); margin-bottom: 8px;">
        <div style="float:left">
            <h4 class="text-success">My Profile</h4>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="table-responsive">
                    <br>
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th width="40%">Surname</th>                                                                  
                                <td><?php echo $info['l_name']; ?></td>   
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>First Name</th>                                                                  
                                <td><?php echo $info['f_name']; ?></td>   
                            </tr>
                            <tr>
                                <th>Middle Name</th>                                                                  
                                <td><?php echo $info['m_name']; ?></td>   
                            </tr>
                            <tr>
                                <th>Birth Date</th>                                                                  
                                <td><?php echo $info['sdob']; ?></td>   
                            </tr>
                            <tr>
                                <th>Gender</th>                                                                  
                                <td><?php echo $info['ssex']; ?></td>   
                            </tr>
                            <tr>
                                <th>Contact Number</th>                                                                  
                                <td><?php echo $info['sphone']; ?></td>   
                            </tr>
                            <tr>
                                <th>Civil Status</th>                                                                  
                                <td><?php echo $info['scivilstatus']; ?></td>   
                            </tr>
                            <tr>
                                <th>Home Address</th>                                                                  
                                <td><?php echo $info['shome_add']; ?></td>   
                            </tr>
                            <tr>
                                <th>Eligibility</th>                                                                  
                                <td><?php echo $info['eligibility']; ?></td>   
                            </tr>
                            <tr>
                                <th>User Type</th>                                                                  
                                <td><?php echo $info['usercode']; ?></td>   
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td><?php echo $info['username']; ?></td>   
                            </tr>
                            <tr>
                                <th>Password</th>                                                                  
                                <td>
                                <?php
                                for($i=0; $i<strlen($info['password']); $i++)
                                echo '*'; 
                                ?>
                                </td>
                            </tr>  
                        </body> 
                    </table>
                    <div class="pull-right">
                        <a type="button" class="btn btn-sm btn-success" style="width: 150px;" href="profile_edit.php">Update</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</div>

<!--Script Here-->
<?php include "../common/footer.php"; ?>