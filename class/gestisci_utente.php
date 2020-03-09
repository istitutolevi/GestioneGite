<html>

    <?php
		include('../conn_serv.php');
		include('session_class.php');
	?>

	<head>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="../style2020.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../bootstrap.min.css" type="text/css">

        <title>
			Gestisci utente
		</title>
	</head>


    <body class="body-background">

        <a href="http://www.comune.vignola.mo.it"><img src="../img/vignola_white_logo.png" class="vignolaLogo"</a>
        <a href="http://www.istitutolevi.it"><img src="../img/logo_levi.png" class="leviLogo"></a>

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

        <div class="gestisci-utente-form">
		    <form action="exe_gestisci_utente.php" method="post">
                <h1>GESTISCI UTENTE</h1>
                <?php
                    $utente = $_SESSION['n_classe'];
                    $sql="SELECT * FROM users WHERE class_name='$utente'";
                    $result = mysqli_query($con, $sql);
                    $row= mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $Email = $row['Email'];
                    $n_stud = $row['Num_studenti'];
					
                    echo"Nome utente";
                    echo"<input type=\"text\" name=\"utente\" value=\"$utente\" class=\"gestisci-utente-input\">";
                    echo"<br>";
                    echo"<br>";
                    echo"Email";
                    echo"<input type=\"text\" name=\"email\" value=\"$Email\" class=\"gestisci-utente-input\">";
                    echo"<br>";
                    echo"<br>";
                    echo"Numero studenti";
                    echo"<input type=\"text\" name=\"n_stud\" value=\"$n_stud\" class=\"gestisci-utente-input\">";
                    echo"<br>";
                    echo"<br>";
                ?>
				<input type="submit" class="form-proposta-btn base-btn" value="Aggiorna dati">
                <br>
                <br>
		    </form>

            <a href="gestisci_password.php"><button class="form-proposta-btn base-btn" >Gestisci password</button></a>
        </div>
	</body>
</html>