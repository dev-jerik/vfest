<?php
    include_once '../../model/Config.php';
    include_once '../../model/UserModel.php';

    $user = new UserModel($DB_con);

    if (!$user->isLoggedIn()) {
        header('Location: ../../index.php');
    }  
    /**
     * Url validation based on the user_code and the access url.
     * Teacher user cannot access the admin resources.
     * Admin user cannot access the teacher resources.
     * 
     * Attempting to do so, the system will redirect to the home page of the login user based on the user_code.
     */
    $user->checkUrl();
    
    if(isset($_GET['logout'])){
        if($user->doLogout()){
            header("Location: ../../index.php");  
        }
    }
      //  die($_SESSION['active_page']);

?>
<!Doctype html>
<html>

<head>
    <title>VSU-VFEST</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../assets/images/vsu_logo2.png">
    <link rel="stylesheet" href="../../assets/css/bootstrap4.5.min.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../assets/css/customCss.css">
    <link rel="stylesheet" href="../../assets/css/pageCss.css">
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap4.5.min.js"></script>
</head>

<body>
    <!--Wrapper-->
    <div id="wrapper">
        <div class="sidenav">
            <div class="sidebar-profile">
                <div class="text-center">
                    <i class="fa fa-user-circle"></i><br />
                    <small><?php echo strtoupper($_SESSION['user_code']) ?></small>
                </div>
            </div>

            <!-- Admin Menu -->
            <?php if($_SESSION['user_code'] == "admin"): ?>
            <a href="index.php" class=<?php echo ($_SESSION['active_page'] == "admin/home")? "active":"";?>> Home
            </a>
            <a href="student_files.php"
                class=<?php echo ($_SESSION['active_page'] == "admin/student_files")? "active":"";?>>Student
                Files</a>
            <a href="staff_files.php"
                class=<?php echo ($_SESSION['active_page'] == "admin/staff_files")? "active":"";?>>School Staff 
                Files</a>
            <a href="#classfiles">Class Files</a>
            <?php endif; ?>
            <!-- END of Admin Menu -->

            <?php if($_SESSION['user_code'] == "teacher"): ?>
            <a href="index.php" class=<?php echo ($_SESSION['active_page'] == "teacher/home")? "active":"";?>>
                Home </a>
            <a href="#classfiles"
                class=<?php echo ($_SESSION['active_page'] == "teacher/class_files")? "active":"";?>>Class
                Files</a>
            <a href="#leaverequest">Leave Request</a>
            <a href="#myprofile">My Profile</a>
            <?php endif; ?>

            <form>
                <button type=submit name="logout" class="logout text-left">Logout</button>
            </form>
        </div>
    </div>
