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
                <div><h3>Name:</h3></div>
                <div><h3>Grade Level:</h3></div>
                      <div class="table-responsive">
                         <table class="table table bordered">
                          <tr>
                            <th class="table-header" width="20%">Code</th>
                              <th class="table-header">Description</th>
                              <th class="table-header">Amount</th>
                              <th class="table-header" width="10%" colspan="2" style="text-align:center">Action</th>
    </tr>
                      
          </div>
                </div>
            </div>
           
        </div>
    </body>
</html>
