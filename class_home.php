<!doctype html>
<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<meta charset="UTF-8">
		<script src="conn_serv.php"></script>
		<?php 
			include('session_class.php');
			include('admin/script.php3');
			$utente=$_SESSION['n_classe'];
			array_map('unlink', glob("class/*.docx"));
		?>
		<title>Benvenuto!</title>
	</head>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="styletopnav.css?v=<?php echo time();?>" rel="stylesheet" type="text/css">
	<body class="background" style="overflow:hidden; background-image: url('img/background.png');">
	
		<div id="main" style="border-style: solid; background-color:white; ">
			<a href="http://www.comune.vignola.mo.it"><img src="img/vignola_white_logo.png" class="vignolaLogo" style="float: right;"></a>
			<a href="http://www.istitutolevi.it"><img src="img/logo_levi.png" class="leviLogo" style="height:140px" align=left></a>	
		
		<div class="topnav">
			<a href = "class_home.php">Home								</a>
			<a href = "class/proposte.php">Manda proposta						</a>
			<a href = "class/compila_modulo.php">Compila modulo			</a>
			<a href = "class/stampa_modulo.php">Stampa modulo</a>
			<!--<a href = "javascript:AlertIt();";>Gestisci modulo			</a>-->
			<a href = "class/gestisci_utente.php">Gestisci utente		</a>
			<a href = "class/gestisci_proposte.php">Gestisci proposte	</a>
			<a href = "class/compila_relazione.php">Compila relazione	</a>
			<a href = "class/contattaci.php">Contattaci					</a>
			<a href = "Log_out.php">Log Out								</a>
	</div>
	</div>
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<?php
				echo"<b>Benvenuto ".$_SESSION['n_classe']."</b>";
			?>
			
		</div>
		<?php
			echo"<h1 style=\"text-align: center; color:white; position: absolute; left: 50%; transform:translate(-50%,-100%);\">Benvenuto, $utente!</h1>"
			?>
		<div id="main1">
			<br>

		<br>
		<br>

		</div>
		<?php
			if (isset($_POST["updatedData"]))
				echo "<p height='35 px' color='green'> dati aggiornati correttamente </p>";
		?>
	</body>
</html>