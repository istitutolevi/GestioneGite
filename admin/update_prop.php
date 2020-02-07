<?php
		
	include ('../conn_serv.php');
	include ('session_admin.php');

	//$class_name		= addslashes($_POST['class']); 
	$destinazione 	= addslashes($_POST["destinazione"]);
	$doc_acc 		= addslashes($_POST["doc_acc"]);
	$doc_sost 		= addslashes($_POST["doc_sost"]);
	$obiettivi 		= addslashes($_POST["Obiettivi1"]);
	$per_data 		= addslashes($_POST["per_data"]);
	$data_cdc 		= addslashes($_POST["data_cdc"]);
	$id 			= addslashes($_POST['id']);

	
	/*$sql = "SELECT `Indirizzo` FROM `users` WHERE `class_name`='$class_name'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$Indirizzo = $row['Indirizzo'];*/
	
	$sql = "UPDATE `proposte` SET `meta`='$destinazione', `docenti_acc` ='$doc_acc', `docenti_sost` = '$doc_sost', `obbiettivi` = '$obiettivi', `periodo_data` = '$per_data', `data_cdc` = '$data_cdc' WHERE `id` = '$id'";
	mysqli_query($con, $sql);
	
	$sql = "SET @count = 0";
	mysqli_query($con,$sql);
	
	$sql = "UPDATE `proposte` SET `proposte`.`id` = @count:= @count + 1";
	mysqli_query($con,$sql);
	
	header("Location: ../admin_home.php")
?>