<?php
$connect = mysqli_connect("localhost", "root", "", "vfes_info");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tbl_personproof
  WHERE l_name LIKE '%".$search."%'
  OR f_name LIKE '%".$search."%'
  ORDER BY perID DESC ";
}
else
{

 $query = "
  SELECT * FROM tbl_personproof ORDER BY perID DESC
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
      <th class="table-header" width="20%">Staff ID</th>
        <th class="table-header">Last Name</th>
        <th class="table-header">First Name</th>
        <th class="table-header">Middle Name</th>
        <th class="table-header" width="10%" colspan="2" style="text-align:center">Action</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["perID"].'</td>
    <td>'.$row["l_name"].'</td>
    <td>'.$row["f_name"].'</td>
    <td>'.$row["m_name"].'</td>
    <td style="text-align:center">
      <a id="edit" href="staffprofile.php" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
    </td>
    <td style="text-align:center">
      <a id="delete" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
    </td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}



?>