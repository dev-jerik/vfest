<?php
	define("ROW_PER_PAGE",2);
	session_start();
	require "../dao/UserDAO.php";
	$login = new UserDAO;

	if(!$login->log_test()){
		header('Location: ../index.php');
	} else {
		$name = $_SESSION['name'];
	}
	$_SESSION['page'] = "class";
?>

<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" href="../bootstrap/css/main.css">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
		<script src="../bootstrap/js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<style type="text/css">
			.disable {
				pointer-events: none;
        		cursor: default;
			}
		</style>
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
	                        <h2 class="pull-left">View Classes</h2>
                   		</div>
	                    <div>
	                    	<div class="container-fluid">
								<div class="row">
									<div class="col-sm-3"></div>
									<div class="col-sm-6">
				                        <form name='frmSearch' action='' method='post'>
				                        	<table width="100%">
				                        		<tr>
				                        			<th width='25%'>Input School Year</th>
				                        			<td>
				                        				<select class="form-control"  name="search_text" id="search_text">
															<option value='2020' selected>2020</option>
															<option value='2019'>2019</option>
															<option value='2018'>2018</option>
						                                </select>
				                        			</td>
				                        		</tr>
				                        	</table>
				                            <br/>
				                            <div id="result"></div>
				                        </form>
				                    </div>
									<div class="col-sm-3"></div>
			                    </div>
		                    </div>
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
                   url:"fetch_class.php",
                   method:"POST",
                   data:{query:query},
                   success:function(data)
                   {
                    $('#result').html(data);
                   }
              });
        }
        $('#search_text').change(function(){
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