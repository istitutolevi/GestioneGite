<!doctype html>
<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<meta charset="UTF-8">
		<script src="conn_serv.php"></script>
		<title>Benvenuto!</title>
	</head>
	<link href="../styletopnav.css" rel="stylesheet" type="text/css">
	<link href="../style.css" rel="stylesheet" type="text/css">
	<body style="background-color:#2b2a2a;;">
		<div id="main" style="border-style: solid; background-color:white; ">
			<a href="http://www.comune.vignola.mo.it"><img src="../img/vignola_white_logo.png" class="vignolaLogo" style="float: right;"></a>
			<a href="http://www.istitutolevi.it"><img src="../img/logo_levi.png" class="leviLogo" align=left style="height:140px"></a>
		
		<?php
			include('session_admin.php');
			include('script.php3');
			$class = $_SESSION['n_classe'];
		?>
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
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<?php
				echo"<b>Benvenuto ".$_SESSION['n_classe']."</b>";
			?>

		</div>
		</div>

		

    <?php
      include ("../connessione.php");

      $data=$db->query("SELECT * FROM cronologia;")->fetchAll();

      echo "<table><tr><th>Data</th><th>URL</th></tr>";
      foreach($data as $line){
        echo "<tr><td>".$line["data"]."</td>"."<td onclick=\"docx(this)\">".$line["url"]."</td></tr>";
      }
      echo "</tr></table>"
    ?>

		<script>
			function docx(doc){
				var url=doc.innerHTML;
				window.open(url);
			}
		</script>
	</body>
</html>
