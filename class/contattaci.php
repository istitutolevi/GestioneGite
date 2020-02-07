<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
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
		
		
		body{
		    background-size:cover;
		    background-repeat:no-repeat;
		}
		
		span.email {
			color: yellow;
			text-decoration: none;
		}
	</style>
	</head>
	<link href="../styletopnav.css" rel="stylesheet" type="text/css">
	<body class="background" onload="myFunction()">
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

			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
				document.getElementById("main").style.marginLeft= "0";
				document.getElementById("main1").style.marginLeft = "0px";
				
			
			}
			
			function AlertIt() {
			alert ("coming soon")
			}
				
			function myFunction() {
				var now = new Date();

				var day = ("0" + now.getDate()).slice(-2);
				var month = ("0" + (now.getMonth() + 1)).slice(-2);
				var today = (day) + "-" + (month) + "-" + now.getFullYear() ;

				document.getElementById("cur_data").value = today;
				document.getElementById("cur1_data").value = today;
			}
			
		</script>
		<div style="text-align:center; color:white; font-size:22px;">
			<!-- Per contattarci scrivi una mail a claudillo@hotmail.it scrivendo il problema , la classe e l'indirizzo (ITT, IPIA...).
			<br>
			Altrimenti chiamare o mandare un messaggio a 3920757777. -->
			Per qualsiasi informazione o problema scrivi a <a href="mailto:viaggi@istitutolevi.edu.it"><span class="email"> viaggi@istitutolevi.edu.it</span></a>
		</div>
	</body>
</html>