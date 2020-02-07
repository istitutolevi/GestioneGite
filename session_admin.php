<?php
include('conn_serv.php');
$db = mysqli_select_db($con, "users");
session_start();
$user_check=$_SESSION['n_classe'];
$sql=  mysqli_query($con, "SELECT * FROM users WHERE class_name='$user_check'");
$row = mysqli_fetch_assoc($sql);
$login_session =$row["class_name"];;
$sqlquery ="SELECT tipo FROM users WHERE class_name='$user_check'"; 
$result = mysqli_query($con, $sqlquery);
$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
$tipo= $row['tipo'];
if($tipo != '1')
{
	mysqli_close($connection);
	header('Location: index.php');
	session_destroy();
}
if(!isset($login_session)){
mysqli_close($connection);
header('Location: index.php'); 
}
?>