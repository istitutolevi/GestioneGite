<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
        <link href="style2020.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
		<script src="conn_serv.php"></script>
		<?php 
			include('session_class.php');
			include('admin/script.php3');
			$utente=$_SESSION['n_classe'];
			array_map('unlink', glob("class/*.docx"));
		?>
		<title>Benvenuto!</title>
	</head>

	<body>
        <?php
        echo"<h1 class=\"home-welcome\">Benvenuto, $utente!</h1>"
        ?>

        <header class="header-section">
            <nav class="header-nav">
                <ul class="main-menu">
                    <li><a href = "class_home.php" class="active">HOME</a></li>
                    <li><a href = "class/proposte.php">MANDA PROPOSTA</a></li>
                    <li><a href = "class/compila_modulo.php">COMPILA MODULO</a></li>
                    <li><a href = "class/stampa_modulo.php">STAMPA MODULO</a></li>
                    <li><a href = "class/gestisci_utente.php">GESTISCI UTENTE</a></li>
                    <li><a href = "class/gestisci_proposte.php">GESTISCI PROPOSTE</a></li>
                    <li><a href = "class/compila_relazione.php">COMPILA RELAZIONE</a></li>
                    <li><a href = "class/contattaci.php">CONTATTACI</a></li>
                    <li><a href = "Log_out.php">LOGOUT</a></li>
                </ul>
            </nav>
        </header>

        <img src="img/gran_angolo.png" class="img">
        <a href="http://www.istitutolevi.it"><img src="img/logo_levi.png" class="leviLogo"></a>
        <a href="http://www.comune.vignola.mo.it"><img src="img/vignola_white_logo.png" class="vignolaLogo"></a>
	</body>
</html>