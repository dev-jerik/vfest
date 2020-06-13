<?php

  if(!$login->log_test()){
    header('Location: ../index.php');
  } else {
    $name = $_SESSION['name'];
    $userCode = $_SESSION['userCode'];
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
      ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 25%;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
      }
      li a {
        line-height: 50px;
        display: block;
        color: #000;
        padding: 8px 16px;
        text-decoration: none;
      }

      li a.active {
        background-color: #555;
        color: white;
      }

      li a:hover:not(.active) {
        background-color: #555;
        color: white;
      }
    </style>
  </head>

  <body>
    <nav>
      <ul class="list-unstyled components">
        <nav id="sidebar">
          <div class="sidebar-profile">
            <div class="">
            <h1><center> <i class="fa fa-user-circle"></i></center> </h1>
          </div>
          <div class="">
            <center><?php echo $userCode; ?></center>
          </div>
          </div>
          <li>
            <?php
              if($_SESSION['page'] == "home"){
                echo '<a class="active" href="home.php"><i id="sidebarIcon"></i>Home</a>';
              } else {
                echo '<a href="home.php"><i id="sidebarIcon"></i>Home</a>';
              }
            ?>
          </li>
          <li>
            <?php
              if($_SESSION['page'] == "students"){
                echo '<a class="active" href="stud_list.php><i id="sidebarIcon"></i>Student Files</a>';
              } else {
                echo '<a href="stud_list.php"><i id="sidebarIcon"></i>Student Files</a>';
              }
            ?>
          </li>
          <li>
            <?php
              if($_SESSION['page'] == "staffs"){
                echo '<a class="active" href="staff.php"><i id="sidebarIcon"></i>School Staff Files</a>';
              } else {
                echo '<a href="staff.php"><i id="sidebarIcon"></i>School Staff Files</a>';
              }
            ?>
          </li>
          <li>
            <?php
              if($_SESSION['page'] == "class"){
                echo '<a class="active" href="#"><i id="sidebarIcon"></i>Class Files</a>';
              } else {
                echo '<a href="#"><i id="sidebarIcon"></i>Class Files</a>';
              }
            ?>
          </li>
          <li>
            <?php
              if($_SESSION['page'] == "profile"){
                echo '<a class="active" href="myprofile.php"><i id="sidebarIcon"></i>My Profile</a>';
              } else {
                echo '<a href="myprofile.php"><i id="sidebarIcon"></i>My Profile</a>';
              }
            ?>
          </li>
          <li>
            <a href="../controller/logout.php" name="logout" id="sidebarIcon">Log out</a>
          </li>
          <div class="navFooter">

          </div>
        </nav>
      </ul>
    </nav>
  </body>
</html> 
