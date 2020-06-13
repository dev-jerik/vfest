<?php
$connect = mysqli_connect("localhost", "root", "", "vfes_info");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT tbl_curriculum.gradename As Level, tbl_subjects.description As Subjects
  FROM tbl_subjects, tbl_gradesubjects, tbl_curriculum
  WHERE tbl_subjects.subID = tbl_gradesubjects.subID 
  AND tbl_curriculum.gradelevel = tbl_gradesubjects.gradelevel
  ";
}
else
{

 $query = "
  SELECT tbl_curriculum.gradename As Level, tbl_subjects.description As Subjects
  FROM tbl_subjects, tbl_gradesubjects, tbl_curriculum
  WHERE tbl_subjects.subID = tbl_gradesubjects.subID 
  AND tbl_curriculum.gradelevel = tbl_gradesubjects.gradelevel
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
      <th class="table-header" width="10%"> # </th>
      <th class="table-header" width="20%">Level</th>
      <th class="table-header" width="30%">Subjects</th>
      <th class="table-header" width="5%" style="text-align:center">Action</th>
    </tr>
 ';
 $ctr = 1;
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
    <tr>
      <td>'.$ctr.'</td> 
      <td>'.$row["Level"].'</td>                                                                  
      <td>'.$row["Subjects"].'</td>  
      <td style="text-align:center"><a id="edit" href="updatestaff.php" title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>
    </tr>
  ';
  $ctr++;
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}



?>