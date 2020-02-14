<!doctype html>
<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<meta charset="UTF-8">
	<?php 
		include('../conn_serv.php');
		include('session_class.php');
		$class = $_SESSION['n_classe'];
	?>
	<title>Benvenuto!</title>
	<style>
	body {
		font-family: "Lato", sans-serif;
	}

	.sidenav {
		height: 100%;
		width: 0;
		position: fixed;
		z-index: 1;
		top: 0;
		left: 0;
		background-color: #111;
		overflow-x: hidden;
		transition: 0.5s;
		padding-top: 60px;
	}

	.sidenav a {
		padding: 8px 8px 8px 32px;
		text-decoration: none;
		font-size: 25px;
		color: #818181;
		display: block;
		transition: 0.3s
	}

	.sidenav b {
		padding: 8px 8px 8px 32px;
		text-decoration: none;
		font-size: 25px;
		color: #818181;
		display: block;
		transition: 0.3s
	}
	
	.sidenav a:hover, .offcanvas a:focus{
		color: #f1f1f1;
	}

	.sidenav .closebtn {
		position: absolute;
		top: 0;
		right: 25px;
		font-size: 36px;
		margin-left: 50px;
	}

	#main {
		transition: margin-left .5s;
		padding: 16px;
	}
	#main1 {
		transition: margin-left .5s;
		padding: 16px;
	}

	@media screen and (max-height: 450px) {
	  .sidenav {padding-top: 15px;}
	  .sidenav a {font-size: 18px;}
	}
	body{
		    background-size:cover;
		    background-repeat:no-repeat;
			}
	.login{
			width:360px;
			margin:50px auto;

			border-radius:10px;
			border:2px solid #ccc;
			padding:10px 40px 25px;
			margin-top:50px;
	}
	</style>
	</head>
	<link href="../style.css" rel="stylesheet" type="text/css">
	<link href="../styletopnav.css" rel="stylesheet" type="text/css">
	<body class="background" style="background-image: url('../img/background.png');">
		<div id="main" style="border-style: solid; background-color:white; ">
			<a href="http://www.comune.vignola.mo.it"><img src="../img/vignola_white_logo.png" class="vignolaLogo" style="float: right;"></a>
			<a href="http://www.istitutolevi.it"><img src="../img/logo_levi.png" class="leviLogo" align=left style="height:140px"></a>
		
		<div class="topnav">
			<a href = "../class_home.php">Home								</a>
			<a href = "proposte.php">Manda proposta						</a>
			<a href = "compila_modulo.php">Compila modulo			</a>
			<a href = "stampa_modulo.php">Stampa modulo</a>
			<!--<a href = "javascript:AlertIt();";>Gestisci modulo			</a>-->
			<a href = "gestisci_utente.php">Gestisci utente		</a>
			<a href = "gestisci_proposte.php">Gestisci proposte	</a>
			<a href = "compila_relazione.php">Compila relazione	</a>
			<a href = "contattaci.php">Contattaci					</a>
			<a href = "../Log_out.php">Log Out								</a>
	</div>
	</div>
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<?php
				echo"<b>Benvenuto ".$_SESSION['n_classe']."</b>";
			?>
			
		</div>
		
	<script>
		var a = 0;
		function closemenu() {
			
			if (a % 2 == 0){
				openNav();
				a++;
			}
			else{
				closeNav();
				a++;
			}
		
		
		
		}
		function openNav() {
			document.getElementById("mySidenav").style.width = "250px";
			document.getElementById("main").style.marginLeft = "250px";
			document.getElementById("main1").style.marginLeft = "250px";
			
		}
		
		function AlertIt() {
			alert ("coming soon")
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
			document.getElementById("main").style.marginLeft= "0";
			document.getElementById("main1").style.marginLeft = "0px";
			
		}
	</script>
		<form action="exe_stampa_modulo_definitivo.php" method="post">
			<div class="login" style="background-color:white;">
			<h1 align="center" style="color:black">Stampa modulo</h1>
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
			echo"<a style='font-size: x-small; font-weight: bold'>Meta, Data Gita, Docente Responsabile</a>";
			echo"<select name=\"selected\" style=width:100%>";
			echo "<option value=\"\" disabled selected>Seleziona gita</option>";
			$utente=$_SESSION['n_classe'];
			for($A=0;$A<$I;$A++)
			{
				
				$sqlquery ="SELECT * FROM gita_definitiva WHERE id='$A' AND classe='$utente'";

				$result = mysqli_query($con, $sqlquery);
				$row= mysqli_fetch_array($result, MYSQLI_ASSOC);

				${'n1' . 'a'} = $row['meta'];
				${'n2' . 'a'} = $row['data_gita'];
				${'n3' . 'a'} = $row['doc_resp'];
				
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
        <div style="text-align:center">
            <input type="submit" class="button buttonh button1" value="Stampa" style="width:100%; height:50px; border-color:black;">
        </div>
		<div style="text-align:center;">
			<?php
				$percorsoWordProposte=$class . '.docx';
				if(file_exists($percorsoWordProposte))
				{
					echo'<br>';
					$Fname = $classe + ".docx";
					echo'<a href="' . $class . '.docx" style="color:red;" >SCARICA IL WORD </a>';
				}
				else
				{	
					echo'<br>';
					echo'<a>PRIMA CLICCA STAMPA PER PRODURRE IL WORD </a>';					
				}
			?>
			
		</div>
    </div>	
		</form>
	</body>
</html>