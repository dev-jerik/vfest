<?php
	session_start();
	$_SESSION['active_page'] = "teacher/home";
    include "../common/header.php";
?>

<div class="main">
    <h2 class="text-success">Teacher Home</h2>
</div>

<?php include "../common/footer.php";?>