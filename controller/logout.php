<?php
	session_start();
	include "../dao/ConnectionDAO.php";

	$out = new ConnectionDAO;
	session_destroy();
	session_unset(); 

	if($out->closeConnection()){
		header("Location: ../index.php");
	}

?>