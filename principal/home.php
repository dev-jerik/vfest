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
	$_SESSION['page'] = "home";
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
						<center>
							<div class="panel panel-primary">
						      <div class="panel-heading"><h1>Welcome <?php echo $name; ?>!!</h1></div>
						      <div class="panel-body">Panel Content</div>
						    </div>
						</center>
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
                   url:"../controller/fetch.php",
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