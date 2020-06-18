<?php
require "modalfees.php";

$connect = mysqli_connect("localhost", "root", "", "vfes_info");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
 	SELECT * FROM tbl_schoolfees
 	WHERE description LIKE '%".$search."%'
 	ORDER BY code DESC ";
}
else
{

 $query = "
  SELECT * FROM tbl_schoolfees ORDER BY code DESC
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
    	<th class="table-header" width="20%">Code</th>
      	<th class="table-header">Description</th>
      	<th class="table-header">Amount</th>
        <th class="table-header" width="10%" colspan="2" style="text-align:center">Action</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["code"].'</td>
    <td>'.$row["description"].'</td>
    <td>'.$row["amount"].'</td>
    <td style="text-align:center">
      <a id="viewfees" data-toggle="modal" data-target="#upschoolFees"?code='.$row["code"].'" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
    </td>
    <td style="text-align:center">
      <a id="viewfees" href="deleteSF.php?code='.$row["code"].'" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
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