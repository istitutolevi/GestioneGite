<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<?php
			include ('session_admin.php');
			include ('script.php3');
			$n_classe = $_SESSION['n_classe'];
		?>
		<title>
			Gestisci proposte
		</title>
	</head>
	<link href="../style.css" rel="stylesheet" type="text/css">
	<link href="../styletopnav.css" rel="stylesheet" type="text/css">
	<body class="background" onload="myFunction()">
		<div id="main" style="border-style: solid; background-color:white; ">
			<a href="http://www.comune.vignola.mo.it"><img src="../img/vignola_white_logo.png" class="vignolaLogo" style="float: right;"></a>
			<a href="http://www.istitutolevi.it"><img src="../img/logo_levi.png" class="leviLogo" align=left style="height:140px"></a>
		
		<div id = "mySidenav" class = "sidenav">
			<a href = "javascript:void(0)" class = "closebtn" onclick = "closeNav()">&times;</a>
			<?php
				echo"<b>Benvenuto ".$_SESSION['n_classe']."</b>";
			?>
			
		</div>
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
		
		<div id="main1">
		</div>
		</div>
		
		<form action="exe_gestisci_proposte.php" method="POST">
			<div class="login" style="background-color:white;">
			<h1 align="center" style="color:black">Seleziona proposte</h1>
			<?php
				$sql = "SET @count = 0";
				mysqli_query($con,$sql);
				
				$sql = "UPDATE `proposte` SET `proposte`.`id` = @count:= @count + 1";
				mysqli_query($con,$sql);
				
				$sql= "SELECT COUNT(*)AS total FROM proposte";
				$results=mysqli_query($con,$sql);
				$values=mysqli_fetch_assoc($results);
				$I=$values['total'];
				$I=$I+1;
				
				echo"<br>";
				echo"<a style='font-size: x-small; font-weight: bold'>Meta, docenti accompagnatori, Data gita</a>";
				echo"<select name=\"selected\" style=width:100%>";
				$utente=$_SESSION['n_classe'];
				for($A=0;$A<$I;$A++)
				{
					
					$sqlquery = "SELECT * FROM proposte WHERE id='$A'";

					$result = mysqli_query($con, $sqlquery);
					$row	= mysqli_fetch_array($result, MYSQLI_ASSOC);

					${'n1' . 'a'} = $row['meta'];
					${'n2' . 'a'} = $row['docenti_acc'];
					${'n3' . 'a'} = $row['periodo_data'];
					${'n4' . 'a'} = $row['classe_name'];
					${'n5' . 'a'} = $row['id'];
					
					if($n1a == $p && $n2a == $g and $n3a == $f && $n4a == $l && $n5a == $t)
					{
						unset($n1a);
						unset($n2a);
						unset($n3a);
						unset($n4a);
						unset($n5a);
					}
					else
					{

					if( !empty($n1a) && !empty($n2a) && !empty($n3a)   )
					{
						$try = addslashes($n2a);
						echo "<option     value='" . $n5a . ";" . $n4a .";". $n1a .";".$try.";".$n3a. "' >" . $n4a .";" . $n1a ."; ".$n2a."; " .$n3a. "</option>";
						$p = $n1a;
						$g = $n2a;
						$f = $n3a;
						$l = $n4a;
						$t = $n5a;
					}
					}
					
				}
				echo"</select>";
				echo "<br>";
				echo "<br>";
			?>
			<div>
				<input type="radio" name="gender" value="mod_proposta"> Modifica la Proposta selezionata<br>
				<input type="radio" name="gender" value="del_proposta"> Elimina la proposta selezionata<br>
				<br>
				<input type="submit" class="button buttonh button1" style="width:100%; height:50px; border-color:black;">
			</div>
			</div>	
		</form>
	</body>
</html>