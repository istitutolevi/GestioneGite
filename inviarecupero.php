 <!doctype html>
<!--<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<meta charset="UTF-8">
		<title>
			Invio Richiesta
		</title>
	</head>
	<link href="style.css" rel="stylesheet" type="text/css">
	<body background="img/back.jpg">
			<div style="border-style: solid; background-color:white; ">
				<a href="http://www.comune.vignola.mo.it"><img src="img/vignola_white_logo.png" class="vignolaLogo" style="float: right;"></a>
				<a href="http://www.istitutolevi.it"><img src="img/logo_levi.png" class="leviLogo" align=left style="height:140px"></a>
			</div>
		<div class="login" style="background-color:white;">
		<?php/*
		
			$mail=$_POST['email'];
			$mailC=$_POST['emailC'];
			
			if ($mail != $mailC || empty($mail) || empty($mailC)){
				echo ("Email non coincidenti");
				echo ("<br>");
				echo ("<a href=\"recuperapsw.html\"> Ritorna a recupera password </a>");
			}
			else{
					echo ("Email coincidenti, verra' contattata dall' amministratore sul suo recupero");
					echo ("<br>");
					echo ("<a href=\"index.php\"> Ritorna alla home </a>");
					$conn = mysqli_connect("127.0.0.1", "root", "");
					$db = mysqli_select_db($conn, "users");
					$query = mysqli_query($conn, "SELECT password, id FROM users WHERE Email='$mail'");
					
					while($row = mysqli_fetch_object($query)){
						$psw=$row->password;
						$id1=$row->id;
						$sql= "INSERT INTO `passworddimenticate` (`id`, `email`, `password`) VALUES ('$id1','$mail', '$psw')";
						$conn->query($sql);
						//quest'istruzione mi prende la password ora devo solo riuscire a mandarla alla zinnamosca
						//echo $row->password;
						
					}
			}
		
		
		?>
		</div>
	</body>
</html>