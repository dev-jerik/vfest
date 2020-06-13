<?php
  define("ROW_PER_PAGE",2);
  session_start();
  require "../dao/UserDAO.php";
  $cat = "StudID";
  $view = new UserDAO;

  $info = $view->getStudInfo($_SESSION['id']);
  $data = $view->getparentInfo($_SESSION['id']);
  $for = $view->getsiblingsInfo($_SESSION['id']);

 
  $_SESSION['page'] = "home";
  $day = date("d");
  $month = date("m");
  $year = date("Y");
  $siblingCtr = 0;
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    </head>
    <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <form name="frmUser" method="post" action="studget_info.php?func=editStud">
            <div class="modal-header">
              <header align="center">
                <td><h3>VISCA FOUNDATION ELEMENTARY SCHOOL</h3></td>
                <h4>Baybay City, Leyte</h4>
                <h4>Application for Enrollment</h4>
              </header>
            </div>
            <h3>Student Profile</h3>
            <div>
              <table border='0' width='100%'>
                <tr height='10px'><td></td></tr>
                <tr>
                  <th>Student ID:</th>
                  <th width='10px'></th>
                  <th>Last Name:</th>
                  <th width='10px'></th>
                  <th>First Name:</th>
                  <th width='10px'></th>
                  <th>Middle Name:</th>
                </tr>
                <tr>
                  <td><input class="form-control" type='text' name='studID' value="<?php echo $info[13]; ?>" ></td>
                  <th width='10px'></th>
                                  <td><input class="form-control" type='text' name='last_name' value="<?php echo $info[0]; ?>"></td>
                  <th width='10px'></th>
                                  <td><input class="form-control" type='text' name='first_name' value="<?php echo $info[1]; ?>"></td>
                  <th width='10px'></th>
                                  <td><input class="form-control" size='10px' type='text' name='middle_name'value="<?php echo $info[2]; ?>"></td>
                </tr>
                <tr>
                  <th>Birthdate:</th>
                  <th width='10px'></th>
                  <th>Birth Place:</th>
                  <th width='10px'></th>
                  <th>Religion:</th>
                  <th width='10px'></th>
                  <th>Phone Number:</th>
                </tr>
                <tr>
                                <td>
                    <div class="input-group date" data-provide="datepicker" data-date-format='yyyy-mm-dd' data-date-todayHighlight=true data-date-autoclose=true>
                        <input type="text" class="form-control date-picker" id="date" name="dob" value="<?php echo $year."-".$month."-".$day; echo $data[5];?>"required>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                                </td>
                  <th width='10px'></th>
                                <td><input class="form-control"  size='30px' type='text' name='pob' value="<?php echo $info[6]; ?>"></td>
                  <th width='10px'></th>
                                <td>
                                    <select class="form-control"  name='religion' value="<?php echo $info[7]; ?>">
                                        <option>Catholic</option>
                                        <option>Protestant</option>
                                        <option>Islam</option>
                                        <option>Iglesia ni Cristo</option>
                                        <option>Baptist</option>
                                        <option>Sventh Day Adventist</option>
                                        <option>Methodist</option>
                                        <option>UCCP</option>
                                        <option>Jehova's Witness</option>
                                        <option>Others</option>
                                    </select> 
                                </td>
                                <th width='10px'></th>
                                <td><input class="form-control"  size='30px' type='text' name='phone' value="<?php echo $info[12]; ?>"></td>
                </tr>
                <tr>
                  <th>Address:</th>
                  <th width='10px'></th>
                  <th>Current Grade Level:</th>
                  <th width='10px'></th>
                  <th>Gender</th>
                  <th width='10px'></th>
                  <th>Teacher:</th>
                </tr>
                <tr>
                                <td><input class="form-control"  size='30px' type='text' id-="fam_add"name='fam_add' value="<?php echo $info[11]; ?>"></td>
                  <th width='10px'></th>
                  <td>
                                    <select class="form-control"  name='currgrd_level' value="<?php echo $info[10]; ?>">
                                        <option>Daycare</option>
                                        <option>K1</option>
                                        <option>K2</option>
                                        <option>Grade 1</option>
                                        <option>Grade 2</option>
                                        <option>Grade 3</option>
                                        <option>Grade 4</option>
                                        <option>Grade 5</option>
                                        <option>Grade 6</option>
                                    </select> 
                                </td>
                                <th width='10px'></th>
                                  <td><input type="radio" id="male" name="gender" value="m"> Male
                     <input type="radio" id="female" name="gender" value="f"> Female
                      <input type="radio" id="other" name="gender" value="other"> Other
                  <th width='10px'></th>
                                  <td><input class="form-control"  size='30px' type='text' name='teacher'></td>
                </tr>
              </table>
            </form>
            <form name="frmfamily" method="post" action="studget_info.php?func=editparent">
              <hr>
              <h3>Family Background</h3>
              <h4>Parents/Guardian</h4>
              <table border='1px'  width='100%'>
                <tr align='center'>
                  <th width='15%' style='text-align: center'>Role</th>
                  <th width='35%' style='text-align: center'>Name</th>
                  <th style='text-align: center'>Occupation</th>
                  <th width='100px' style='text-align: center'>Connected to VSU?</th>
                  <th style='text-align: center' colspan='2'>Action</th>
                </tr>
                <tr align='center'>
                  <td style='text-align: center'><input type="role" name="role" value="<?php echo $data[11]; ?>" ></td>
                  <td style='text-align: center' width='50%'><input  name="plast_name" value="<?php echo $data[0]; ?>" ><input  name="pfirst_name" value="<?php echo $data[1]; ?>" ><input name="pmiddle_name" value="<?php echo $data[2]; ?>" ></td>
                  <td style='text-align: center' ><input  name="pfirst_name" value="<?php echo $data[4]; ?>" ></td>
                  <td style='text-align: center'><input name="middle_name" value="<?php echo $data[5]; ?>" ></td>
                    <td width='50px' style="text-align:center">
                      <a id="delete" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
              </table>
              <button align='right' data-toggle='modal' data-target='#addParent'>Add Parents/Guardian</button>
            </form>
             <form name="sibs" method="post" action="studget_info.php?func=editSibs">
              <br><br>
              <h4>Siblings</h4>
              <table border='1px' width='100%'>
                <tr align='center'>
                  <th width='3%' style='text-align: center'>#</th>
                  <th width='35%' style='text-align: center'>Name</th>
                  <th width='35%' style='text-align: center'>Date of Birth</th>
                  <th width='10%' style='text-align: center' colspan='2'>Action</th>
                </tr>
                <tr id="addSiblings1" height="30px">
                  <td style="text-align: center">1</td>
                  <td style="text-align: center"><input  name="givenName" size="75" value="<?php echo $for[0]; ?>" ></td>
                  <td>
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-todayHighlight=true data-date-autoclose=true >
                                <input type="text" class="form-control date-picker" id="s_bdate1" name="s_bdate1" placeholder="yyyy-mm-dd" value="<?php echo $for[1]; ?>">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </td>
                  <td width="50px" style="text-align:center" colspan="2">
                      <a id="add" href="#" onclick="addRow('sib1')" title="add">Add</a>
                    </td>
                </tr>
                <tr id="addSiblings2">
                  <td style="text-align: center">2</td>
                  <td style="text-align: center"><input class="form-control"  size="30px" type="text" id="s_name2" name="s_name2"></td>
                  <td>
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-todayHighlight=true data-date-autoclose=true >
                                <input type="text" class="form-control date-picker" id="s_bdate2" name="s_bdate2" placeholder="yyyy-mm-dd">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </td>
                  <td width="50px" style="text-align:center" colspan="2">
                      <a id="add" href="#" onclick="addRow('sib2')" title="add">Add</a>
                    </td>
                </tr>
                <tr id="addSiblings3">
                  <td style="text-align: center">3</td>
                  <td style="text-align: center"><input class="form-control"  size="30px" type="text" id="s_name3" name="s_name3"></td>
                  <td>
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-todayHighlight=true data-date-autoclose=true >
                                <input type="text" class="form-control date-picker" id="s_bdate3" name="s_bdate3" placeholder="yyyy-mm-dd">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </td>
                  <td width="50px" style="text-align:center" colspan="2">
                      <a id="add" href="#" onclick="addRow('sib3')" title="add">Add</a>
                    </td>
                </tr>
                <tr id="addSiblings4">
                  <td style="text-align: center">4</td>
                  <td style="text-align: center"><input class="form-control"  size="30px" type="text" id="s_name4" name="s_name4"></td>
                  <td>
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-todayHighlight=true data-date-autoclose=true >
                                <input type="text" class="form-control date-picker" id="s_bdate4" name="s_bdate4" placeholder="yyyy-mm-dd" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </td>
                  <td width="50px" style="text-align:center" colspan="2">
                      <a id="add" href="#" onclick="addRow('sib4')" title="add">Add</a>
                    </td>
                </tr>
                <tr id="addSiblings5">
                  <td style="text-align: center">5</td>
                  <td style="text-align: center"><input class="form-control"  size="30px" type="text" id="s_name5" name="s_name5"></td>
                  <td>
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-todayHighlight=true data-date-autoclose=true >
                                <input type="text" class="form-control date-picker" id="s_bdate5" name="s_bdate5" placeholder="yyyy-mm-dd" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </td>
                  <td width="50px" style="text-align:center" colspan="2">
                      <a id="add" href="#" onclick="addRow('sib5')" title="add">Add</a>
                    </td>
                </tr>
              </table>
              <hr>
              <h3>Last School Attended</h3>
              <table border='1px' width='100%'>
                <tr align='center'>
                  <th width='35%' style='text-align: center'>School Name</th>
                  <th width='35%' style='text-align: center'>School Address</th>
                  <th width='10%' style='text-align: center' colspan='2'>Action</th>
                </tr>
                <tr align='center'>
                  <td style='text-align: center'><input name="last_school" size="80" value="<?php echo $info[8]; ?>"/></td>
                  <td style='text-align: center'><input name="school_add" size="50" value="<?php echo $info[9]; ?>"/></td>
                    <td width='50px' style="text-align:center">
                      <a id="delete" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
              </table>
              <button align='right' data-toggle='modal' data-target='#addLastSchool'>Add School</button>
              <hr><br>
              <div class="pull-right">
                <button type="submit" class="btn btn-success" name="update">Update Record</button>
                              <a  class="btn btn-danger" href="students.php">Back</a>
                          </div>
                          <br><br><br><br>
            </div>
            <?php 
              require "modal.php";
                ?>
          </form>
        </div>
      </div>
    </div>  
    </body>
</html>