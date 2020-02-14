<html>
	<head>
        <link rel="stylesheet" href="../bootstrap.min.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<title>
			compilazione modulo
		</title>
		<script type="text/javascript" src="jquery-3.2.0.min.js"></script>

	</head>
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
		#main2 {
			transition: margin-left .5s;
			padding: 16px;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}
		.login{
			width: 460px !important;
		margin:50px auto;
		font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
		border-radius:10px;
		border:2px solid #ccc;
		padding:10px 40px 25px;
		margin-top:50px; 
		}
		input[type=text], input[type=password], select, textarea{
		width:99%;
		padding:10px;
		margin-top:8px;
		border:1px solid #ccc;
		padding-left:5px;
		font-size:16px;
		font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
		}
		body{
		    background-size:cover;
		    background-repeat:no-repeat;
		}
		label{
			color:white;
			
		}
	</style>
	<?php
			include('session_class.php');
			$n_classe=$_SESSION['n_classe'];
			$today = date("d.m.y");
		
		?>
	<link href="../style.css" rel="stylesheet" type="text/css">
	<link href="../styletopnav.css" rel="stylesheet" type="text/css">
	<body class="background" onload="myFunction()" style="background-image: url('../img/background.png');">
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
		<div id="main1">
			
		</div>
		<form action="exe_proposte.php" method="POST">
			<div class="login" style="background-color: rgba(0,0,0,0.5);">
				<!--<select name="indirizzo" style="width:100%;">
					<option value="ITT">	ITT	</option>
					<option value="IPSC">	IPSC	</option>
					<option value="LSSA">	LSSA		</option>
					<option value="IPIA">	IPIA		</option>
				</select>
				<br>-->
				<h1 align="center" style="color:white">Manda Proposta</h1>
							
				<input type="text" class="form-control form-control-lg" name="destinazione" placeholder="Destinazione" style="width:100%;">

				
				<input type="text" class="form-control form-control-lg" name="doc_acc" placeholder="Inserisci i docenti accompagnatori separandoli con una virgola" style="width:100%;">

				
				<input type="text" class="form-control form-control-lg" name="doc_sost"  placeholder="Inserisci i docenti sostituti separandoli con una virgola" style="width:100%;">

				
				<textarea name="Obiettivi1" class="form-control form-control-lg" placeholder="Obiettivi didattici" style="width:100%;"></textarea>

				
				<input type="text" name="per_data" class="form-control form-control-lg"  placeholder="Periodo Data" style="width:100%;">
					
				<input type="text" name="data_cdc" id="cur_data" class="form-control form-control-lg"  placeholder="Data odierna Consiglio di Classe" style="width:100%;">
				<br>

				<input type="submit" id="invia" class="btn btn-success" value="Invia" style="width:100%; height:50px;">
				<br>
                <br>
				<a style="color:red; font-size:14px;">*Per inserire nuove proposte inviare e ritornare su proposte</a>
			</div>
		</form>
		<script type="text/javascript">
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
				document.getElementById("main2").style.marginLeft = "250px";
				
			}

			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
				document.getElementById("main").style.marginLeft= "0";
				document.getElementById("main1").style.marginLeft = "0px";
				document.getElementById("main2").style.marginLeft = "0px";
			}
			
			function myFunction() {
				var now = new Date();

				var day = ("0" + now.getDate()).slice(-2);
				var month = ("0" + (now.getMonth() + 1)).slice(-2);
				var today = (day) + "-" + (month) + "-" + now.getFullYear() ;

				document.getElementById("cur_data").value = today;
				
			}
			
			function AlertIt() {
		alert ("coming soon")
		}
			
		</script>
			
	</body>
</html>