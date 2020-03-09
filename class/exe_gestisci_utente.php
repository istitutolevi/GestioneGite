<?php
	include('../conn_serv.php');
	include('session_class.php');

	$utente_old = $_SESSION['n_classe'];
	$utente	= $_POST['utente'];
	$Email	= $_POST['email'];
	$n_stud	= $_POST['n_stud'];
	$sql= " UPDATE users 
				SET `class_name` = '$utente', `Email` = '$Email', `Num_studenti` = '$n_stud' 
					WHERE `class_name` = '$utente_old'";
	$result = mysqli_query($con, $sql);
	$sql1="SELECT COUNT(id) AS conteggio FROM proposte";
	$results=mysqli_query($con,$sql1);
	$values=mysqli_fetch_assoc($results);
	$I=$values['conteggio'];
	$I=$I+1;
	for($A=1;$A<$I;$A++)
		{
			$sql = "UPDATE `proposte` set `proposte`.`classe_name`='$utente' where `proposte`.`classe_name`='$utente_old '";
			mysqli_query($con,$sql);
		}
	$sql1="SELECT COUNT(id) AS conteggio FROM gita_definitiva";
	$results=mysqli_query($con,$sql1);
	$values=mysqli_fetch_assoc($results);
	$I=$values['conteggio'];
	$I=$I+1;
	for($A=1;$A<$I;$A++)
		{
			$sql = "UPDATE `gita_definitiva` set `gita_definitiva`.`classe`='$utente' where `gita_definitiva`.`classe`='$utente_old '";
			mysqli_query($con,$sql);
		}
		$_SESSION['n_classe'] = $utente;
	//da fare : mandare un POST a Gestisci utente con la notifica del success
	echo"<meta http-equiv=\"refresh\" content=\"0; url=../class_home.php\">";
	function failUpdate(){
		//da fare : mandare un POST a Gestisci utente con la notifica del fail
		echo "<meta http-equiv=\"refresh\" content=\"0; url=../gestisci_utente.php\">";
	}
?>

