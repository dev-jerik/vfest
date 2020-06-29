<?php
    session_start();
    $_SESSION['active_page'] = "admin/class_files";
    include "../common/header.php";
    include_once '../../model/Config.php';
    include_once '../../model/ClassModel.php';
    $classModel = new ClassModel($DB_con);

    $year = $_GET['year'];
    $year1 = $year-1;
    $levelId = $_GET['levelId'];
    $level = $_GET['level'];

    $info = $classModel->getClassSubjects($year, $levelId);
    $teacher = $classModel->getClassTeacher($year, $levelId);
    if($teacher == null){
        $teacher = array("perID" => "", "teacher"=>"");
    }
?>

<div class="main">
    <div class="header clearfix" style="border-bottom: 1px solid rgba(0,0,0,.1); margin-bottom: 8px;">
        <div style="float:left">
            <h4 class="text-success">Class Subject List</h4>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="table-responsive">
                    <br>
                    <h5 style="text-align: center"><?php echo $level; ?></h5>
                    <h5 style="text-align: center"><?php echo 'SY: '.$year1.' - '.$year; ?></h5>
                    <br>
                    <h6>Adviser:&nbsp;&nbsp;<?php echo $teacher['teacher']; ?></h6>
                    <table class="table table-sm">
                        <thead style="text-align: center">
                            <tr>
                                <th width="10%"> # </th>
                                <th>Subjects</th>
                                <th width="25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $ctr=0;
                                if($info == null){
                                    echo "<tr><td colspan='3' style='text-align: center'> No subjects assigned in this class</td></tr>";
                                }
                                foreach ($info as $students):  
                                $ctr+=1;
                            ?>
                            <tr>
                                <td style="text-align: center"><?php echo $ctr; ?></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $students['description']; ?></td>
                                <td style='text-align:center'><a id='view' href='#' >Update</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="pull-right">
                    <a type="button" class="btn btn-sm btn-success" style="width: 150px;" href="class_files.php">Back</a>
                </div>
                
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</div>

<!--Script Here-->

<?php include "../common/footer.php"; ?>