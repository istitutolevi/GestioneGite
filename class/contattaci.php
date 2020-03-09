<html>
	<head>

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="../style2020.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../bootstrap.min.css" type="text/css">
		<title>
			Contattaci
		</title>
		<?php
			include('session_class.php');
			$n_classe=$_SESSION['n_classe'];
		?>
		<title>
			Gestisci proposte
		</title>

	</head>
	<body class="body-background" onload="myFunction()" >
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


			

		<div class="contattaci-div">
			Per qualsiasi informazione o problema scrivi a <a href="mailto:viaggi@istitutolevi.edu.it"><span> viaggi@istitutolevi.edu.it</span></a>
		</div>
	</body>
</html>