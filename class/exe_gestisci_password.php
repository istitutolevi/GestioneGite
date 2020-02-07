<?php

	include('../conn_serv.php');
	include('session_class.php');

	
	$utente_old = $_SESSION['n_classe'];

	$newPassword =  md5($_POST["newPassword"]);
	$oldPassword = md5($_POST["oldPassword"]);

	//verifico correttezza della vecchia password
	$sql= "SELECT `password` FROM users WHERE `class_name` = '$utente_old'";
	$result = mysqli_query($con, $sql);
	$values = mysqli_fetch_assoc($result);

	if (strtolower($values['password']) != $oldPassword) {
			$_SESSION["passwordUpdate"] = "wrong";
	}

	//verifico il formato della nuova password
	else if (strlen($_POST["newPassword"]) <=6) 
		$_SESSION["passwordUpdate"] = "tooShort";

	else if ($_POST["newPassword"] != $_POST["newPassword2"])
		$_SESSION["passwordUpdate"] = "noMatch";

	else {

		//modifico la password se tutto è andato bene
		$sql= "UPDATE users SET `password` = '$newPassword' WHERE `class_name` = '$utente_old'";
		$result = mysqli_query($con, $sql);
		$_SESSION["passwordUpdate"] = "success";
	}
	

	echo"<meta http-equiv=\"refresh\" content=\"0; url=gestisci_password.php\">";

?>

