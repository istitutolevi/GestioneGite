<?php
	include('session_admin.php');
	include('../conn_serv.php');
	$sql = "SET @count = 0";
	mysqli_query($con,$sql);
	$sql = "UPDATE `proposte` SET `proposte`.`id` = @count:= @count + 1";
	mysqli_query($con,$sql);
	$sql1="SELECT COUNT(id) AS conteggio FROM proposte";
	$results=mysqli_query($con,$sql1);
	$values=mysqli_fetch_assoc($results);
	$I=$values['conteggio'];
	$I=$I+1;
	
	for($A=0;$A<$I;$A++)
	{
		$sql="DELETE FROM proposte WHERE id = '$A'"; 
		mysqli_query($con,$sql);
	}
	
	header("Location: ../admin_home.php")
?>
	