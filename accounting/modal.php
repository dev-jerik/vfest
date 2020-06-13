
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