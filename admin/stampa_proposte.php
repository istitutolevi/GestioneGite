<!doctype html>
<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<meta charset="UTF-8">
		<script src="conn_serv.php"></script>
		<title>Benvenuto!</title>
	</head>

	<link href="../style.css" rel="stylesheet" type="text/css">
	<link href="../styletopnav.css" rel="stylesheet" type="text/css">
	<body class="background">
		<div id="main" style="border-style: solid; background-color:white; ">
			<a href="http://www.comune.vignola.mo.it"><img src="../img/vignola_white_logo.png" class="vignolaLogo" style="float: right;"></a>
			<a href="http://www.istitutolevi.it"><img src="../img/logo_levi.png" class="leviLogo" align=left style="height:140px"></a>
		
		<?php
			include('session_admin.php');
			include('script.php3');
			$class = $_SESSION['n_classe'];
		?>
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<?php
				echo"<b>Benvenuto ".$_SESSION['n_classe']."</b>";
			?></div>
			<div class="topnav">
			<a href="../admin_home.php">Home</a>
			<a href="stampa_proposte.php">Stampa Proposte</a>
			<a href="mostra_proposte.php">Mostra Proposte</a>
			<a href="gestisci_proposte.php">Gestisci proposte</a>
			<a href="stampa_proposte_alle_famiglie.php">Stampa Proposte alle famiglie</a>
			<a href="javascript:AlertIt();">Contatta utente</a>
			<a href="gestione_account.php">Gestisci Utenti</a>
			<a href = " reset_password.php">Reset Password</a>
			<a href = " elimina_proposte.php">Elimina Proposte</a>
			<a href = "../sign_in.php">Registrazione</a>
			<a href="../Log_out.php">Log Out</a>
			</div>
			</div>
			
		
		<div id="main1">
		
		</div>

		<!--form action="exe_stampa_proposte.php" method="POST"-->
			<div style="text-align:center">
				<input type="submit" class="button buttonh button1" value="Stampa" style="width:25%; height:50px; border-color:black;" onclick="A()">
			</div>
		<!--/form-->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script>
			function A(){
				$.ajax({
					url: "exe_stampa_proposte.php",
					complete: function(){
						alert("Documento Creato");
						location.reload();
					}
				});
			}
		</script>

		<div style="text-align:center;">
			<?php
				$percorsoWordProposte = 'Proposte_Istituto_Primo_Levi.docx';
				if(file_exists($percorsoWordProposte))
				{
					echo'<br>';
					echo'<a href="Proposte_Istituto_Primo_Levi.docx" style="color:red;">SCARICA IL WORD </a>';
				}
				else
				{
					echo'<br>';
					echo'<p style="color:white">PRIMA CLICCA STAMPA PER PRODURRE IL WORD </p>';
				}
			?>
			<div style="text-align:center">
				<br>
				<a href="crono.php">
					<input type="button" class="button buttonh2" value="Mostra Cronologia" style="width:25%; height:50px; border-color:black;">
				</a>
			</div>
		</div>
	</body>
</html>
