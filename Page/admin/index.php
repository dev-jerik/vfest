<?php
	session_start();
	$_SESSION['active_page'] = "admin/home";
    include "../common/header.php";
?>

<div class="main">
    <h2 class="text-success">Home</h2>
</div>

<?php include "../common/footer.php";?>