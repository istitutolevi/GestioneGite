 <?php
	include ('../conn_serv.php');
	include ('session_class.php');

	$class_name		=	$_SESSION['n_classe'];
	
    $destinazione	= 	strtoupper($_POST["destinazione"]);
    $doc_acc 		= 	strtoupper($_POST["doc_acc"]);
    $doc_sost 		= 	strtoupper($_POST["doc_sost"]);
    $obiettivi 		= 	strtoupper($_POST["Obiettivi1"]);
    $per_data 		= 	strtoupper($_POST["per_data"]);
    $data_cdc 		= 	strtoupper($_POST["data_cdc"]);
	
	$destinazione 	= addslashes($destinazione); 	
	$doc_acc 		= addslashes($doc_acc);
	$doc_sost 		= addslashes($doc_sost);
	$obiettivi 		= addslashes($obiettivi);
	$per_data 		= addslashes($per_data);
	$data_cdc 		= addslashes($data_cdc);
	
	$sql 			= "SELECT `Indirizzo` FROM `users` WHERE `class_name`='$class_name'";
	$result 		= mysqli_query($con, $sql);
	$row 			= mysqli_fetch_array($result, MYSQLI_ASSOC);
	$Indirizzo 		= $row['Indirizzo'];

	$sql 			= " CREATE TABLE IF NOT EXISTS `proposte` (
		`id` int(8) NOT NULL AUTO_INCREMENT,
		`classe_name` varchar(8) NOT NULL,
		`istituto` varchar(6) NOT NULL,
		`meta` varchar(246) NOT NULL,
		`docenti_acc` varchar(256) NOT NULL,
		`docenti_sost` varchar(256) NOT NULL,
		`obbiettivi` varchar(1024) NOT NULL,
		`periodo_data` varchar(64) NOT NULL,
		`data_cdc` varchar(64) NOT NULL,
		UNIQUE KEY `id` (`id`)
	  )";
	
	mysqli_query($con, $sql);
	
	 $sql 			= " INSERT INTO `proposte` (`classe_name`,`istituto`,`meta`, `docenti_acc`, `docenti_sost`, `obbiettivi`, `periodo_data`, `data_cdc`) VALUES 
	 					('$class_name', '$Indirizzo', '$destinazione', '$doc_acc', '$doc_sost', '$obiettivi', '$per_data', '$data_cdc')";
	
	mysqli_query($con, $sql);
	
	$sql 			= "SET @count = 0";
	mysqli_query($con,$sql);
	
	$sql 			= " UPDATE `proposte` SET `proposte`.`id` = @count:= @count + 1";
	mysqli_query($con,$sql);
    echo '<script>  alert("Proposta Inserita con successo. Se è necessario inserire altre proposte accedere nuovamente al menù Manda Proposta"); window.location.href="../class_home.php";</script>';
	//header("Location: ../class_home.php")
?> 