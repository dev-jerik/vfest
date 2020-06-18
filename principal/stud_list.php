<?php
  define("ROW_PER_PAGE",2);
  session_start();
  require "../dao/UserDAO.php";
  $login = new UserDAO;
  $cat = "StudID";

  if(!$login->log_test()){
    header('Location: ../index.php');
  } else {
    $name = $_SESSION['name'];
  }
  $_SESSION['page'] = "students";
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3">
          <div style="margin-left: -15px">
            <?php require ('home_sidebar.php');?>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="main-body">
            <div class="page-header clearfix">
                          <h2 class="pull-left">Students</h2>
                           <div class="pull-right">
                              <!-- <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New Record</button> -->
                              <a  class="btn btn-success" href="add_students.php">Add New Record</a>
                          </div>
                      </div>
                      <div>
                          <form name='frmSearch' action='' method='post'>
                              <input type="text" name="search_text" id="search_text" placeholder="Enter Student's Last name or First name" class="form-control" />
                              <br/>
                              <div id="result"></div>
                          </form>
                      </div>
          </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    $(document).ready(function(){
         load_data();

         function load_data(query)
         {
              $.ajax({
                   url:"fetch_stud.php",
                   method:"POST",
                   data:{query:query},
                   success:function(data)
                   {
                    $('#result').html(data);
                   }
              });
        }
        $('#search_text').keyup(function(){
              var search = $(this).val();
              if(search != '')
              {
                load_data(search);
              }
              else
              {
                load_data();
              }
        });
    });
</script>