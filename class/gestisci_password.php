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
        <a href="http://www.comune.vignola.mo.it"><img src="../img/vignola_white_logo.png" class="vignolaLogo"></a>
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

		<script type="text/javascript">
			function updated(){
				var e = document.createElement('div');
				e.innerHTML = "Password aggiornata con successo!";
				e.setAttribute("class", "successNotification");
				document.getElementsByTagName("body")[0].appendChild(e);
			}

			function failed(x){
				console.log(x);
				var e = document.createElement('div');
				e.innerHTML = x;
				e.setAttribute("class", "failNotification");
				document.getElementsByTagName("body")[0].appendChild(e);
			}
        </script>

        <form action="exe_gestisci_password.php" method="post">
			<div class="gestisci-password-form">
				<h1>GESTISCI PASSWORD</h1>

                <?php
					//handlo la notifica dell'update password
					if (isset($_SESSION["passwordUpdate"])){
						if($_SESSION["passwordUpdate"] == "wrong")
							echo "<script> failed('password sbagliata'); </script>";
						else if ($_SESSION["passwordUpdate"] == "noMatch")
							echo "<script> failed('nuove password diverse'); </script>";
						else if ($_SESSION["passwordUpdate"] == "tooShort")
							echo "<script> failed('password troppo corta'); </script>";
						else 
							echo "<script> updated(); </script>";
							unset($_SESSION["passwordUpdate"]);
					}

					$utente = $_SESSION['n_classe'];
					$sql="SELECT * FROM users WHERE class_name='$utente'";
					$result = mysqli_query($con, $sql);
					$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
					$Email = $row['Email'];
					$n_stud = $row['Num_studenti'];
                    
					echo"Password attuale";
					echo"<input type=\"password\" name=\"oldPassword\" value=\"\" required>";
					echo"<br>";
					echo"<br>";
					echo"Nuova password";
					echo"<input type=\"password\" name=\"newPassword\" value=\"\" required>";
					echo"<br>";
					echo"<br>";
					echo "Ripeti nuova password";
					echo"<input type=\"password\" name=\"newPassword2\" value=\"\" required>";
					echo"<br>";
					echo"<br>";
				?>

                <input type="submit" class="form-proposta-btn base-btn" value="aggiorna password">
			</div>
		</form>
	</body>
</html>