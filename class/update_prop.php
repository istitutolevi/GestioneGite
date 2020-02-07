<?php
		
	include ('../conn_serv.php');
	include ('session_class.php');

	$class_name=$_SESSION['n_classe']; 
	$destinazione1 = strtoupper($_POST["destinazione"]);
	$doc_acc1 = strtoupper($_POST["doc_acc"]);
	$doc_sost1 = strtoupper($_POST["doc_sost"]);
	$obiettivi1 = strtoupper($_POST["Obiettivi1"]);
	$per_data1 = strtoupper($_POST["per_data"]);
	$data_cdc1 = strtoupper($_POST["data_cdc"]);
	$id = $_POST['id'];
	
	$destinazione1 = addslashes($destinazione1);
	$doc_acc1 = addslashes($doc_acc1);
	$doc_sost1 = addslashes($doc_sost1);
	$obiettivi1 = addslashes($obiettivi1);
	$per_data1 = addslashes($per_data1);
	$data_cdc1 = addslashes($data_cdc1);

	$sql = "SELECT `Indirizzo` FROM `users` WHERE `class_name`='$class_name'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$Indirizzo = $row['Indirizzo'];
	$sql = "UPDATE `proposte` SET `classe_name` = '$class_name',`istituto` ='$Indirizzo' ,`meta`='$destinazione1', `docenti_acc` ='$doc_acc1', `docenti_sost` = '$doc_sost1', `obbiettivi` = '$obiettivi1', `periodo_data` = '$per_data1', `data_cdc` = '$data_cdc1' WHERE `id` = '$id'";
	mysqli_query($con, $sql);
	$sql = "SET @count = 0";
	mysqli_query($con,$sql);
	$sql = "UPDATE `proposte` SET `proposte`.`id` = @count:= @count + 1";
	mysqli_query($con,$sql);
	header("Location: ../class_home.php")
?>