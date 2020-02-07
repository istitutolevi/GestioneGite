<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<?php
			include('session_admin.php');
			include('script.php3');
			$n_classe = $_SESSION['n_classe'];
		?>
		<title>
			Gestisci proposte
		</title>
		
	</head>
	<link href="../style.css" rel="stylesheet" type="text/css">
	<body background="../img/back.jpg" onload="myFunction()">
		<div id="main" style="border-style: solid; background-color:white; ">
			<a href="http://www.comune.vignola.mo.it"><img src="../img/vignola_white_logo.png" class="vignolaLogo" style="float: right;"></a>
			<a href="http://www.istitutolevi.it"><img src="../img/logo_levi.png" class="leviLogo" align=left style="height:140px"></a>
		
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<?php
				echo"<b>Benvenuto ".$_SESSION['n_classe']."</b>";
			?>
			<a href="../class_home.php">Home</a>
			<a href="proposte.php">Manda proposta</a>
			<a href="compila_modulo.php">Compila modulo</a>
			<a href="stampa_modulo.php">Stampa modulo</a>
			<!--<a href="javascript:AlertIt();">Gestisci modulo</a>-->
			<a href="gestisci_utente.php">Gestisci utente</a>
			<a href="gestisci_utente.php">Gestisci utente</a>
			<a href="gestisci_proposte.php">Gestisci proposte</a>
			<a href="contattaci.php">Contattaci</a>
			<a href="../Log_out.php">Log Out</a>
		</div>
		</div>
		
		<div id="main1">
			<span style="font-size:30px;cursor:pointer; color:white;" onclick="closemenu()">&#9776; Menu</span>
		</div>
		<?PHP
			$class = $_SESSION['n_classe'];
			$action = $_POST['gender'];
		
			if($action == "mod_proposta")
			{
				$selected = $_POST['selected'];
				$array=explode(';',$selected);
				
				$sql = "SELECT * FROM `proposte` WHERE `id` = '$array[0]' AND `classe_name` = '$array[1]' ";
				$result = mysqli_query($con, $sql);
				$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
				
				$meta 		= $row['meta'];
				$doc_acc 	= $row['docenti_acc'];
				$doc_sost 	= $row['docenti_sost'];
				$obb 		= $row['obbiettivi'];
				$data 		= $row['periodo_data'];
				$data_cdc 	= $row['data_cdc'];
				$id 		= $row['id'];
									
				
				echo"<form action=\"update_prop.php\" method=\"POST\">";
					echo"<div class=\"login\" style=\"background-color:white;\">";
						echo"<input type=\"hidden\" name=\"id\" value=\"$id\">";
						echo"<input type=\"hidden\" name=\"class\" value=\"$array[0]\">";
						echo"<input type=\"text\" name=\"destinazione\" placeholder=\"destinazione\" value=\"$meta\" style=\"width:100%;\">";
						echo"<br>";
						echo"<br>";
						echo"<input type=\"text\" name=\"doc_acc\" placeholder=\"Inserisci i docenti accompagnatori separandoli con una virgola\" value=\"$doc_acc\" style=\"width:100%;\">";
						echo"<br>";
						echo"<br>";
						echo"<input type=\"text\" name=\"doc_sost\"  placeholder=\"Inserisci i docenti sostituti separandoli con una virgola\" value=\"$doc_sost\" style=\"width:100%;\">";
						echo"<br>";
						echo"<br>";
						echo"<textarea name=\"Obiettivi1\" placeholder=\"Obiettivi didattici\"  style=\"width:100%;\">$obb</textarea>";
						echo"<br>";
						echo"<br>";
						echo"<input type=\"text\" name=\"per_data\"  placeholder=\"Periodo Data\" value=\"$data\" style=\"width:100%;\">";
						echo"<br>";
						echo"<br>";	
						echo"<input type=\"text\" name=\"data_cdc\"  placeholder=\"Data odierna Consiglio di Classe\" value=\"$data_cdc\" style=\"width:100%;\">";
						echo"<br>";
						echo"<br>";
						echo"<input type=\"submit\" class=\"button buttonh button1\" value=\"Invia\" style=\"width:100%; height:50px;\">";
						echo"<br>";
						echo"<br>";
						echo"<a style=\"color:red; font-size:12px;\">*Per inserire nuove proposte inviare e ritornare su proposte</a>";
					echo"</div>";
				echo"</form>";
			}
			else
				if($action == "del_proposta")
				{
					$selected = $_POST['selected'];
					echo $selected;
					$array = explode(';',$selected);
					$sql = "DELETE FROM `proposte` WHERE `id` = '$array[0]' AND `classe_name` = '$array[1]'";
					$result = mysqli_query($con, $sql);
					header("Location: ../admin_home.php");
				}
		?>
	</body>
</html>