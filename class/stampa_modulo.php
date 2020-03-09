<!doctype html>
<html>
	<head>
	<meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="../style2020.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../bootstrap.min.css" type="text/css">

        <?php
		include('../conn_serv.php');
		include('session_class.php');
		$class = $_SESSION['n_classe'];
	?>

	<title>stampa modulo</title>

	</head>

	<body class="body-background">

        <a href="http://www.comune.vignola.mo.it"><img src="../img/vignola_white_logo.png" class="vignolaLogo"></a>
        <a href="http://www.istitutolevi.it"><img src="../img/logo_levi.png" class="leviLogo" align=left></a>

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

		<form action="exe_stampa_modulo_definitivo.php" method="post">
			<div class="stampa-modulo-form">
			<h1>STAMPA MODULO</h1>

             <?php
			$sql = "SET @count = 0";
			mysqli_query($con,$sql);
			$sql = "UPDATE `gita_definitiva` SET `gita_definitiva`.`id` = @count:= @count + 1";
			mysqli_query($con,$sql);
			$sql= "SELECT COUNT(*)AS total FROM gita_definitiva";
			$results=mysqli_query($con,$sql);
			$values=mysqli_fetch_assoc($results);
			$I=$values['total'];
			$I=$I+1;
			
			echo"<br>";
			echo"<a>Meta, Data Gita, Docente Responsabile</a>";
			echo"<select name=\"selected\">";
			echo"<option value=\"\" disabled selected>Seleziona gita</option>";

			$utente=$_SESSION['n_classe'];
             $p = "";
             $g = "";
             $f = "";
			for($A=0;$A<$I;$A++)
			{
			    $sqlquery ="SELECT * FROM gita_definitiva WHERE id='$A' AND classe='$utente'";
				$result = mysqli_query($con, $sqlquery);
				$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
				$n1a = $row['meta'];
				$n2a = $row['data_gita'];
                $n3a = $row['doc_resp'];
				
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
					echo "<option     value='"  . $n1a ."||".$n2a."||" .$n3a. "' >" . $n1a .", ".$n2a.", " .$n3a. "</option>";
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

            <input type="submit" class="form-proposta-btn base-btn" value="Stampa">

			<?php
				$percorsoWordProposte = $class . '.docx';
				if(file_exists($percorsoWordProposte))
				{
					echo'<br>';
					$Fname = $class . ".docx";
					echo'<a href="' . $class . '.docx" >SCARICA IL WORD </a>';
				}
				else
				{	
					echo'<br>';
                    echo'<br>';
					echo'<a>PRIMA CLICCA STAMPA PER PRODURRE IL WORD </a>';					
				}
			?>
            </div>
		</form>
	</body>
</html>