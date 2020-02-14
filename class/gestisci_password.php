<html>
	<?php
		include('../conn_serv.php');
		include('session_class.php');
	?>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<title>
			Gestisci utente
		</title>
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
		width:360px;
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

		.successNotification, .failNotification{

			
			left: 50%;
			transform: translate(-50%);
			height: auto;
			width: 350px;
			position: relative;
			border-radius: 5px;
			color: white;
			font-size: 15px;
			padding: 10px;
			text-align: center;
		}

		.failNotification{

			background-color: #c50000a8;
		}

		.successNotification{

			background-color: #00c558a8;
		}

	</style>
	<link href="../styletopnav.css" rel="stylesheet" type="text/css">
	<link href="../style.css" rel="stylesheet" type="text/css">
	<body class="background" style="background-image: url('../img/background.png');">
		<div id="main" style="border-style: solid; background-color:white; ">
			<a href="http://www.comune.vignola.mo.it"><img src="../img/vignola_white_logo.png" class="vignolaLogo" style="float: right;"></a>
			<a href="http://www.istitutolevi.it"><img src="../img/logo_levi.png" class="leviLogo" align=left style="height:140px"></a>
		
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<?php
				echo"<b>Benvenuto ".$_SESSION['n_classe']."</b>";
			?>
			<
		</div>
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
		<div id="main1">
		</div>
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

			function AlertIt() {
				alert ("coming soon")
			}
			
			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
				document.getElementById("main").style.marginLeft= "0";
				document.getElementById("main1").style.marginLeft = "0px";
				document.getElementById("main2").style.marginLeft = "0px";
			}


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
			<div class="login" style="background-color:white;">
				<h1 align="center" style="color:black">Gestisci password</h1>
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
                    
                    
					echo"password attuale";
					echo"<input type=\"password\" name=\"oldPassword\" value=\"\" required>";
					echo"<br>";
					echo"<br>";
					echo"<br>";
					echo"nuova password";
					echo"<input type=\"password\" name=\"newPassword\" value=\"\" required>";
					echo"<br>";
					echo"<br>";
					echo "ripeti nuova password";
					echo"<input type=\"password\" name=\"newPassword2\" value=\"\" required>";
					echo"<br>";
					echo"<br>";
				?>
				<input type="submit" class="button buttonh button1" value="aggiorna password" style="width:100%; height:40px;"
			</div>
		</form>
		
		
		
		
	</body>
</html>