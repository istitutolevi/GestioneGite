<html>
	<head>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="../style2020.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../bootstrap.min.css" type="text/css">

        <?php
			include('session_class.php');
			$n_classe=$_SESSION['n_classe'];
		?>

        <title>
			Gestisci Proposte
		</title>
	</head>

	<body class="body-background" onload="myFunction()">
        <a href="http://www.comune.vignola.mo.it"><img class="leviLogo" src="../img/logo_levi.png" ></a>
        <a href="http://www.istitutolevi.it"><img class="vignolaLogo" src="../img/vignola_white_logo.png"></a>

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

		<form action="exe_gestisci_proposte.php" method="POST" class="gestisci-proposte-form">
			<h1 align="center">GESTISCI PROPOSTE</h1>
            <br>
			<a>Meta, docenti accompagnatori, Data gita</a>
			<select name="selected" class="gestisci-proposte-select">
			
			<?php
			    $utente=$_SESSION['n_classe'];
				 $sqlquery ="SELECT * FROM proposte WHERE classe_name='$utente'";
				 $result = mysqli_query($con, $sqlquery);

				 while($row = mysqli_fetch_assoc($result)){
					$n1a = $row['meta'];
					$n2a = $row['docenti_acc'];
					$n3a = $row['periodo_data'];
					
					if($n1a == $p && $n2a == $g and $n3a == $f)
					{
						unset($n1a);
						unset($n2a);
						unset($n3a);
					}
					else
					{
					    if( !empty($n1a) && !empty($n2a) && !empty($n3a)   )
					        {
						        echo "<option     value='"  . $n1a .";".$n2a.";".$n3a. "' >" . $n1a ."; ".$n2a."; " .$n3a. "</option>";
						        $p = $n1a;
						        $g = $n2a;
						        $f = $n3a;
					        }
					}
				 }
			    echo"</select>";
			    echo "<br>";
			    echo "<br>";
			?>
            <div>
			    <input type="radio" name="gender" value="mostra_proposte" > Mostra le tue Proposte<br>
			    <input type="radio" name="gender" value="mod_proposta"> Modifica la Proposta selezionata<br>
			    <input type="radio" name="gender" value="del_proposta"> Elimina la proposta selezionata<br>
			    <br>
                <input type="submit" class="form-proposta-btn base-btn" >
            </div>
		</form>
	</body>
</html>