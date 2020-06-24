<?php
    session_start();
    $_SESSION['active_page'] = "admin/class_files";
    include "../common/header.php";
    include_once '../../model/Config.php';
    include_once '../../model/ClassModel.php';
    $classModel = new ClassModel($DB_con);
    $classList = $classModel->getClassLevelList();
    $overallTotal=0;
?>

<div class="main">
    <div class="header clearfix" style="border-bottom: 1px solid rgba(0,0,0,.1); margin-bottom: 8px;">
        <div style="float:left">
            <h4 class="text-success">View Classes</h4>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="form-group">
                    <h6>Select School Year</h6>
                    <select class="form-control form-control-sm"  name="searchYear" id="searchYear">
                        <?php
                        $yearList = $classModel->getSchoolYears();
                        foreach ($yearList as $years):  ?> 
                            <option value="<?php echo $years['year']; ?>"><?php echo $years['year']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <table style="text-align:center" class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th width='10%'>#</th>
                            <th width='25%'>Level</th>
                            <th>Number of Students</th>
                            <th colspan="2">View</th>
                        </tr>
                    </thead>
                    <tbody id="classList">
                        <?php 
                        foreach ($classList as $class):  ?>
                        <tr>
                            <td><?php echo $class['gradelevel']; ?></td>
                            <td><?php echo $class['gradename']; ?></td>
                            <td><?php 
                                $year = date("Y");
                                $totalStudent = $classModel->getTotalStudent($year, $class['gradelevel']);
                                echo $totalStudent['total']; 
                                $overallTotal+=$totalStudent['total'];
                            ?></td>
                            <td><a id="viewStudents" href="class_view_students.php?year=<?php echo $year; ?>&levelId=<?php echo $class['gradelevel']; ?>&level=<?php echo $class['gradename']; ?>">Students</a></td>
                            <td><a id="viewSubjects" href="#">Subjects</a></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan='5'>
                                <hr>
                                <div class="form-group">
                                    <div style="float:left">
                                        <h5 class="text-success">Total Number of Students:</h5>
                                    </div>
                                    <div style="float:right">
                                        <h5><?php echo $overallTotal; ?></h5>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</div>

<!--Script Here-->
<script>
$(document).ready(function() {
    $(document).on("change", "#searchYear", function() {
        var searchValue = $(this).val();
        $.post("../../model/ClassService.php", {
                search: searchValue,
                action: "searchClass"
            },
            function(data) {
                $("#classList").html(data);
            }
        );
    });
});
</script>
<?php include "../common/footer.php"; ?>