<!doctype html>
<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<meta charset="UTF-8">
		<script src="conn_serv.php"></script>
		<?php 
			include('session_admin.php');
			include('admin/script.php3');
			$utente=$_SESSION['n_classe'];
			array_map('unlink', glob("admin/*.docx"));
		?>
		<title>Benvenuto!</title>
	</head>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="styletopnav.css" rel="stylesheet" type="text/css">
	<body class="background">
		<div id="main" style="border-style: solid; background-color:white; ">
			<a href="http://www.comune.vignola.mo.it"><img src="img/vignola_white_logo.png" class="vignolaLogo" style="float: right;"></a>
			<a href="http://www.istitutolevi.it"><img src="img/logo_levi.png" class="leviLogo" style="height:140px" align=left></a>
		
	
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<?php 
				echo"<b>Benvenuto ".$_SESSION['n_classe']."</b>";
			?></div>
			<div class="topnav">
			<a href="admin_home.php">Home</a>
			<a href="admin/stampa_proposte.php">Stampa Proposte</a>
			<a href="admin/mostra_proposte.php">Mostra Proposte</a>
			<a href="admin/gestisci_proposte.php">Gestisci proposte</a>
			<a href="admin/stampa_proposte_alle_famiglie.php">Stampa Proposte alle famiglie</a>
			<a href="javascript:AlertIt();">Contatta utente</a>
			<a href="admin/gestione_account.php">Gestisci Utenti</a>
			<a href="admin/reset_password.php">Reset Password</a>
			<a href = "admin/elimina_proposte.php">Elimina Proposte</a>
			<a href = "sign_in.php">Registrazione</a>
			<a href="Log_out.php">Log Out</a>
			</div>
			</div>
		
		<div id="main1">
		
			
			<?php
				echo"<h1 style=\"text-align: center; color:white;\">Benvenuto, $utente!</h1>"
			?>
			<a style="font-size:20px; color:white;">Sei stato loggato con successo come utente amministratore!</a>
			<br>
			<br>
			<img src="img/gran_angolo.png" style="width:100%; height:100%;"align="middle" title="Istituto Primo Levi di Vignola">
			<br>
			<br>
			<div class="panel">
				<div class="panel-body" style="width:100%">
					<p class="text-center" style="color:white;">Studenti referenti del progetto Lyskevych Igor e Degliesposti Claudio</p>
				</div>
			</div>
		</div>
	</body>
</html>