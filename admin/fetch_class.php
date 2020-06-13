<?php
$connect = mysqli_connect("localhost", "root", "", "vfes_info");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
          SELECT 
          tbl_curriculum.gradelevel As GradeId,
          tbl_curriculum.gradename As Level,
          COUNT(tbl_class.studID) As Total
          FROM tbl_curriculum
          LEFT JOIN tbl_class ON tbl_curriculum.gradelevel = tbl_class.gradelevel
          WHERE tbl_class.SY = '".$search."'
          GROUP BY tbl_curriculum.gradelevel, tbl_curriculum.gradename
  ";

}
else
{
 $query = "
          SELECT 
          tbl_curriculum.gradelevel As GradeId,
          tbl_curriculum.gradename As Level,
          COUNT(tbl_class.studID) As Total
          FROM tbl_curriculum
          LEFT JOIN tbl_class ON tbl_curriculum.gradelevel = tbl_class.gradelevel
          WHERE tbl_class.SY = '2020'
          GROUP BY tbl_curriculum.gradelevel, tbl_curriculum.gradename
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) != 0)
{

 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
      <th class="table-header" width="10%"> # </th>
      <th class="table-header" width="20%">Level</th>
      <th style="text-align:center" class="table-header" width="30%">Number of Students</th>
      <th class="table-header" width="5%" style="text-align:center">Action</th>
    </tr>
 ';

 $ctr = 1;
 while($row = mysqli_fetch_array($result))
 {
  $id = $row["GradeId"];

  while($ctr != $id ){
    for($i=0; $i<9; $i++){
      if ($ctr <= 1){ $level = "Daycare"; }
      else if ($ctr == 2){ $level = "Kinder 1"; }
      else if ($ctr == 3){ $level = "Kinder 2"; }
      else if ($ctr == 4){ $level = "Grade 1"; }
      else if ($ctr == 5){ $level = "Grade 2"; }
      else if ($ctr == 6){ $level = "Grade 3"; }
      else if ($ctr == 7){ $level = "Grade 4"; }
      else if ($ctr == 8){ $level = "Grade 5"; }
      else if ($ctr == 9){ $level = "Grade 6"; }
      $total = 0;
    }
    $output .= '
    <tr>
      <td>'.$ctr.'</td>                                                                  
      <td>'.$level.'</td>                                                                  
      <td style="text-align:center">'.$total.'</td>
      <td style="text-align:center"><a id="edit" href="#" title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>
    </tr>
    ';
    $ctr = $ctr+1;
  }

  $output .= '
  <tr>
    <td>'.$row["GradeId"].'</td>                                                                  
    <td>'.$row["Level"].'</td>                                                                  
    <td style="text-align:center">'.$row["Total"].'</td>
    <td style="text-align:center"><a id="edit" href="#" title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>
  </tr>
  ';
  $ctr = $ctr+1;
 }
 while($ctr != 10 ){
    for($i=0; $i<9; $i++){
      if ($ctr <= 1){ $level = "Daycare"; }
      else if ($ctr == 2){ $level = "Kinder 1"; }
      else if ($ctr == 3){ $level = "Kinder 2"; }
      else if ($ctr == 4){ $level = "Grade 1"; }
      else if ($ctr == 5){ $level = "Grade 2"; }
      else if ($ctr == 6){ $level = "Grade 3"; }
      else if ($ctr == 7){ $level = "Grade 4"; }
      else if ($ctr == 8){ $level = "Grade 5"; }
      else if ($ctr == 9){ $level = "Grade 6"; }
      $total = 0;
    }
    $output .= '
    <tr>
      <td>'.$ctr.'</td>                                                                  
      <td>'.$level.'</td>                                                                  
      <td style="text-align:center">'.$total.'</td>
      <td style="text-align:center"><a id="edit" href="#" title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>
    </tr>
    ';
    $ctr = $ctr+1;
  }


 echo $output;
}
else
{
 echo 'Data Not Found';
}



?>