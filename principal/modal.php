
<!-- ===============================================Edit User Profile======================== -->
<div class="modal fade" id="editProfile" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit My Profile</h4>
            </div>
            <div class="modal-body">
                <div id="account-edit">
                    <form class="form-horizontal" name='myForm' role="form" action="#" onsubmit="return validateForm()" method="POST">
                        <input name='userid' value="<?php echo $id; ?>" hidden>
                        <input name='utype' value="user" hidden>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Surname </label>
                            <div class="col-sm-6">
                                <input type="text" id="fname" class="form-control" name="fname" value="<?php echo $info[1]; ?>" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> First Name </label>
                            <div class="col-sm-6">
                                <input type="text" id="mname" class="form-control" name="mname" value="<?php echo $info[2]; ?>" placeholder="Optional" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Middle Name </label>
                            <div class="col-sm-6">
                                <input type="text" id="lname" class="form-control" name="lname" value="<?php echo $info[3]; ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Birth Date </label>
                            <div class="col-sm-6">
                                <div class="input-group date" data-provide="datepicker" data-date-format='yyyy-mm-dd' data-date-todayHighlight=true data-date-autoclose=true >
                                    <input type="text" class="form-control date-picker" id="date" name="date" value="<?php echo $info[4]; ?>" required>
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Gender </label>
                            <div class="col-sm-6">
                                <?php
                                    if($info[5] == 'm') { echo '<input checked type="radio" id="male" name="gender" value="m"> Male&nbsp;&nbsp;'; }
                                    else { echo '<input type="radio" id="male" name="gender" value="m"> Male&nbsp;&nbsp;'; }

                                    if($info[5] == 'f') { echo '<input checked type="radio" id="female" name="gender" value="f"> Female&nbsp;&nbsp;'; }
                                    else { echo '<input type="radio" id="female" name="gender" value="f"> Female&nbsp;&nbsp;'; }

                                    if($info[5] == 'o') { echo '<input checked type="radio" id="other" name="gender" value="o"> Other&nbsp;&nbsp;'; }
                                    else { echo '<input type="radio" id="other" name="gender" value="o"> Other&nbsp;&nbsp;'; }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Contact Number </label>
                            <div class="col-sm-6">
                                <input type="text" id="lname" class="form-control" name="lname" value="<?php echo $info[6]; ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Civil Status </label>
                            <div class="col-sm-6">
                                <select class="form-control"  name='scivilstatus'>
                                    <option selected><?php echo $info[7]; ?></option>
                                    <option disabled>-------</option>
                                    <option>Single</option>
                                    <option>Married</option>
                                    <option>Live In</option>
                                    <option>Widowed</option>
                                    <option>Separate</option>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Home Address </label>
                            <div class="col-sm-6">
                                <input type="text" id="mname" class="form-control" name="mname" value="<?php echo $info[8]; ?>" placeholder="Optional" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Eligibility </label>
                            <div class="col-sm-6">
                                <input type="text" id="lname" class="form-control" name="lname" value="<?php echo $info[9]; ?>" required />
                            </div>
                        </div>
                        <br>
                        <center><button type="submit" class="btn btn-success" name="updateProfile">Update</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===============================================Edit User Account======================== -->
<div class="modal fade" id="editAccount" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit My Profile</h4>
            </div>
            <div class="modal-body">
                <div id="account-edit">
                    <form class="form-horizontal" name='myForm' role="form" action="#" onsubmit="return validateForm()" method="POST">
                        <input name='userid' value="<?php echo $id; ?>" hidden>
                        <input name='utype' value="user" hidden>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Username </label>
                            <div class="col-sm-6">
                                <input type="text" id="uname" class="form-control" name="uname" value="<?php echo $info[0]; ?>" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Current Password </label>
                            <div class="col-sm-6">
                                <input type="password" id="currentPword" class="form-control" name="currentPword" value="<?php echo $info[10]; ?>" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> New Password </label>
                            <div class="col-sm-6">
                                <input type="password" id="newPword" class="form-control" name="newPword" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Re-type Password </label>
                            <div class="col-sm-6">
                                <input type="password" id="retypePword" class="form-control" name="retypePword" required />
                            </div>
                        </div>
                        <br>
                        <center><button type="submit" class="btn btn-success" name="updateProfile">Update</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===============================================Add Parent/Guardian======================== -->
<div class="modal fade" id="addParent" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Parents/Guardian</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <form action="../controller/connect.php?func=addParent" name="myForm" method='POST'>
                            <table border='0' width='100%'>
                                <tr>
                                    <th height='50px' width='25%'>Role:</th>
                                    <td>
                                        <select class="form-control" id="sel1" name="role">
                                            <option value='1'>Father</option>
                                            <option value='2'>Mother</option>
                                            <option value='3'>Guardian</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th height='50px'>Last Name:</th>
                                    <td><input type="text" class="form-control" name="p_lname" id="pname" ></td>
                                </tr>
                                <tr>
                                    <th height='50px'>First Name:</th>
                                    <td><input type="text" class="form-control" name="p_fname" id="pname" ></td>
                                </tr>
                                <tr>
                                    <th height='50px'>Middle Name:</th>
                                    <td><input type="text" class="form-control" name="p_mname" id="pname"></td>
                                </tr>
                                <tr>
                                    <th height='50px'>Gender:</th>
                                    <td>
                                        <label class="radio-inline"><input type="radio" name="sex" value="M" >Male</label>
                                        <label class="radio-inline" style=" margin-left: 50px"><input type="radio" name="sex" value="F" >Female</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th height='50px'>Occupation:</th>
                                    <td><input type="text" class="form-control" name="occupation" id="pname" ></td>
                                </tr>
                                <tr>
                                    <th height='50px'>Connected to VSU?:</th>
                                    <td>
                                        <label class="radio-inline"><input type="radio" name="VsuConnect" value="y"  onclick="viewInfo(this.value)">Yes</label>
                                        <label class="radio-inline" style=" margin-left: 50px"><input type="radio" name="VsuConnect" value="n" onclick="viewInfo(this.value)">No</label>
                                    </td>
                                </tr>
                                <tr id="VSUconnected1"></tr>
                                <tr id="VSUconnected2"></tr>
                                <tr id="VSUconnected3"></tr>
                            </table>
                            <br>
                            <center><button type="submit" class="btn btn-success" name="addParent">Add</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ===============================================Add Siblings======================== -->
<div class="modal fade" id="addSiblings" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Siblings</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <form action="../controller/studget.php?func=addSiblings" name="myForm" method='POST'>
                            <table border='0' width='100%'>
                                <tr>
                                    <th height='50px'>Name:</th>
                                    <td><input type="text" class="form-control" name="s_name" id="pname" required></td>
                                </tr>
                                <tr>
                                    <th height='50px'>Birth date:</th>
                                    <td>
                                        <div class="input-group date" data-provide="datepicker" data-date-format='yyyy-mm-dd' data-date-todayHighlight=true data-date-autoclose=true >
                                            <input type="text" class="form-control date-picker" id="s_bdate" name="s_bdate" value="<?php echo $year."-".$month."-".$day ?>">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <center><button type="submit" class="btn btn-success" name="addSiblings">Add</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ===============================================Add Last School Attended======================== -->
<div class="modal fade" id="addLastSchool" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Last School Attended</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <form action="../controller/connect.php?func=addLastSchool" name="myForm" method='POST'>
                            <table border='0' width='100%'>
                                <tr>
                                    <th height='50px'>School Name:</th>
                                    <td><input type="text" class="form-control" name="schoolName" id="pname" required></td>
                                </tr>
                                <tr>
                                    <th height='50px'>School Address:</th>
                                    <td><input type="text" class="form-control" name="schoolAdd" id="pname" required></td>
                                </tr>
                            </table>
                            <br>
                            <center><button type="submit" class="btn btn-success" name="addLastSchool">Add</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ===============================================Add Educational Background======================== -->
<div class="modal fade" id="addEB" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Educational Background</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <form action="../controller/connect.php?func=addLastSchool" name="myForm" method='POST'>
                            <table border='0' width='100%'>
                                <tr>
                                    <th height='50px'>Degree:</th>
                                    <td><input type="text" class="form-control" name="degree" id="degree" required></td>
                                </tr>
                                <tr>
                                    <th height='50px'>School Graduated:</th>
                                    <td><input type="text" class="form-control" name="school" id="school" required></td>
                                </tr>
                                <tr>
                                    <th>Length of Service</th>
                                </tr>
                                <tr>
                                    <th height='50px'>Year Started:</th>
                                    <td><input type="text" class="form-control" name="yrstart" id="yrstart" required></td>
                                </tr>
                                <tr>
                                    <th height='50px'>Year End:</th>
                                    <td><input type="text" class="form-control" name="yrend" id="yrend" required></td>
                                </tr>
                            </table>
                            <br>
                            <center><button type="submit" class="btn btn-success" name="addEB">Add</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ===============================================Add Service Record======================== -->
<div class="modal fade" id="addSR" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Service Record</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <form action="../controller/connect.php?func=addLastSchool" name="myForm" method='POST'>
                            <table border='0' width='100%'>
                                <tr>
                                    <th height='50px'>Date Started:</th>
                                    <td><input type="text" class="form-control" name="date_started]" id="date_started" required></td>
                                </tr>
                                <tr>
                                    <th height='50px'>Postion:</th>
                                    <td><input type="text" class="form-control" name="postion" id="position" required></td>
                                </tr>
                                 <tr>
                                    <th height='50px'>Monthly Salary:</th>
                                    <td><input type="text" class="form-control" name="postion" id="position" required></td>
                                </tr>
                                
                            </table>
                            <br>
                            <center><button type="submit" class="btn btn-success" name="addSR">Add</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- =============================================== Add Class Subject ======================== -->
<div class="modal fade" id="addClassSubject" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Subjects for <?php echo $level; ?></h4>
            </div>
            <div class="modal-body">
                <div id="account-edit">
                    <form class="form-horizontal" name='myForm' role="form" action="#" onsubmit="return validateForm()" method="POST">
                        <?php
                            $ctrInfo = 0;
                            if($info[0] != '0') { 
                                $ctrInfo = count($info); 
                            }
                            $num = 8 - $ctrInfo;
                            $ctr = 1;
                            while($num != 0){
                                echo '
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Subject '.$ctr.' </label>
                                        <div class="col-sm-8"><input name="subject'.$ctr.'"></div>
                                    </div>
                                ';
                                $num--;
                                $ctr++;
                            }
                        ?>
                        <br>
                        <center><button type="submit" class="btn btn-success" name="updateProfile">Add</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =============================================== Edit Class Subject ======================== -->
<div class="modal fade" id="editClassSubject" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Subjects for <?php echo $level; ?></h4>
            </div>
            <div class="modal-body">
                <div id="account-edit">
                    <form class="form-horizontal" name='myForm' role="form" action="#" onsubmit="return validateForm()" method="POST">
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Subject </label>
                            <div class="col-sm-6">
                                <input type="text" id="subjectName" class="form-control" name="subjectName" value="<?php echo $info[0]; ?>" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Number of Hour </label>
                            <div class="col-sm-6">
                                <input type="text" id="subjectHour" class="form-control" name="subjectHour"  required/>
                            </div>
                        </div>
                        <br>
                        <center><button type="submit" class="btn btn-success" name="updateProfile">Update</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function viewInfo(str) {
        if (str == "n") {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("VSUconnected1").innerHTML = xmlhttp.responseText;
                    document.getElementById("VSUconnected2").innerHTML = xmlhttp.responseText;
                    document.getElementById("VSUconnected3").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET", "../controller/VSUconnectedInfo.php?func=ajaxNo", true);
            xmlhttp.send();
        } else {
            var xmlhttp1 = new XMLHttpRequest();
            xmlhttp1.onreadystatechange = function() {
                if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
                    document.getElementById("VSUconnected1").innerHTML = xmlhttp1.responseText;
                }
            };
            xmlhttp1.open("GET", "../controller/VSUconnectedInfo.php?func=ajaxYes1", true);
            xmlhttp1.send();

            var xmlhttp2 = new XMLHttpRequest();
            xmlhttp2.onreadystatechange = function() {
                if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
                    document.getElementById("VSUconnected2").innerHTML = xmlhttp2.responseText;
                }
            };
            xmlhttp2.open("GET", "../controller/VSUconnectedInfo.php?func=ajaxYes2", true);
            xmlhttp2.send();

            var xmlhttp3 = new XMLHttpRequest();
            xmlhttp3.onreadystatechange = function() {
                if (xmlhttp3.readyState == 4 && xmlhttp3.status == 200) {
                    document.getElementById("VSUconnected3").innerHTML = xmlhttp3.responseText;
                }
            };
            xmlhttp3.open("GET", "../controller/VSUconnectedInfo.php?func=ajaxYes3", true);
            xmlhttp3.send();
        }
    }
</script>