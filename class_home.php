<!doctype html>
<html>
	<head>

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
	<link href="style2020.css" rel="stylesheet" type="text/css">

	<body class="background">
        <div>
			<a href="http://www.comune.vignola.mo.it"><img src="img/vignola_white_logo.png" class="vignolaLogo"></a>
			<a href="http://www.istitutolevi.it"><img src="img/logo_levi.png" class="leviLogo"></a>

		<div class="topnav">
			<a href = "class_home.php">Home								</a>
			<a href = "class/proposte.php">Manda proposta				</a>
			<a href = "class/compila_modulo.php">Compila modulo			</a>
			<a href = "class/stampa_modulo.php">Stampa modulo           </a>
			<a href = "class/gestisci_utente.php">Gestisci utente		</a>
			<a href = "class/gestisci_proposte.php">Gestisci proposte	</a>
			<a href = "class/compila_relazione.php">Compila relazione	</a>
			<a href = "class/contattaci.php">Contattaci					</a>
			<a href = "Log_out.php">Log Out								</a>
	    </div>
	    </div>

		<?php
			echo"<h1>Benvenuto, $utente!</h1>"
        ?>

		<div class="main1">
			<br>
            <img src="img/gran_angolo.png" class="img">
		</div>
	</body>
</html>