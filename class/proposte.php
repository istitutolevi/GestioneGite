<html>
	<head>
        <link href="../style2020.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../bootstrap.min.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script type="text/javascript" src="jquery-3.2.0.min.js"></script>

		<title>
			compilazione modulo
		</title>

	</head>

	<?php
			include('../session_class.php');
			$n_classe=$_SESSION['n_classe'];
			$today = date("d.m.y");
	?>

	<body class="body-background" onload="myFunction()">

            <header class="header-section">
                <nav class="header-nav">
                    <ul class="main-menu">
                        <li><a href = "../class_home.php" class="active">HOME</a></li>
                        <li><a href = "proposte.php">MANDA PROPOSTA</a></li>
                        <li><a href = "compila_modulo.php">COMPILA MODULO</a></li>
                        <li><a href = "stampa_modulo.php">STAMPA MODULO</a></li>
                        <li><a href = "gestisci_utente.php">GESTISCI UTENTE</a></li>
                        <li><a href = "gestisci_proposte.php">GESTISCI PROPOSTE</a></li>
                        <li><a href = "compila_relazione.php">COMPILA RELAZIONE</a></li>
                        <li><a href = "contattaci.php">CONTATTACI</a></li>
                        <li><a href = "../Log_out.php">LOGOUT</a></li>
                    </ul>
                </nav>
            </header>

		<form action="exe_proposte.php" method="POST">
			<div class="form-proposta">

				<h1>MANDA PROPOSTA</h1>
                <br>
							
				<input type="text" class="text-proposta" name="destinazione" placeholder="Destinazione">
				<input type="text" class="text-proposta" name="doc_acc" placeholder="Inserisci i docenti accompagnatori separandoli con una virgola">
				<input type="text" class="text-proposta" name="doc_sost"  placeholder="Inserisci i docenti sostituti separandoli con una virgola">
				<textarea name="Obiettivi1" class="textarea-proposta" placeholder="Obiettivi didattici"></textarea>
				<input type="text" name="per_data" class="text-proposta"  placeholder="Periodo Data">
				<input type="text" name="data_cdc" id="cur_data" class="text-proposta"  placeholder="Data odierna Consiglio di Classe">
				<br>
				<input type="submit" id="invia" class="form-proposta-btn base-btn" value="INVIA" >
				<br>
                <br>
				<a>*Per inserire nuove proposte inviare e ritornare su proposte</a>
			</div>
		</form>
		<script type="text/javascript">
			function myFunction() {
                const now = new Date();
                const day = ("0" + now.getDate()).slice(-2);
                const month = ("0" + (now.getMonth() + 1)).slice(-2);
                const today = (day) + "-" + (month) + "-" + now.getFullYear();
                document.getElementById("cur_data").value = today;
			}
		</script>

        <a href="http://www.istitutolevi.it"><img src="../img/logo_levi.png" class="leviLogo"></a>
        <a href="http://www.comune.vignola.mo.it"><img src="../img/vignola_white_logo.png" class="vignolaLogo"></a>
	</body>
</html>