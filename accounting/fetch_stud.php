<?php
/*$connect = mysqli_connect("localhost", "root","","vfes_info");
$output ='';
$sql = "SELECT stud_id, last_name, first_name, middle_initial * FROM tbl_students WHERE last_name LIKE '%".$_POST["search"]."&'";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){

}
else{
	echo 'Data Not Found';
}*/

//fetch.php


//echo '<script>alert("test")</script>'; 

$connect = mysqli_connect("localhost", "root", "", "vfes_info");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
 	SELECT * FROM tbl_students
 	WHERE last_name LIKE '%".$search."%'
 	OR first_name LIKE '%".$search."%'
 	ORDER BY studID DESC ";
}
else
{

 $query = "
  SELECT * FROM tbl_students ORDER BY studID DESC
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
    	<th class="table-header" width="20%">Student ID</th>
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
    <td>'.$row["studID"].'</td>
    <td>'.$row["last_name"].'</td>
    <td>'.$row["first_name"].'</td>
    <td>'.$row["middle_name"].'</td>
    <td style="text-align:center">
      <a id="viewfees" href="viewstudfees.php?stud_id='.$row["studID"].'" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
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