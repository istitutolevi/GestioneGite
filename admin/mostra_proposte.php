<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<?php
			include('session_admin.php');
			$n_classe=$_SESSION['n_classe'];
		?>
		<title>
			Mostra Proposte
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
		
		input[type=text], input[type=password], select, textarea{
		width:99%;
		padding:10px;
		margin-top:8px;
		border:1px solid #ccc;
		padding-left:5px;
		font-size:16px;
		font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
		}
		
		table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
	}

	td, tr {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
		background-color:white;
	}
	th{
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
		background-color:gray;
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
	<link href="../styletopnav.css" rel="stylesheet" type="text/css">
	<body class="background" onload="myFunction()">
	
		<div id="main" style="border-style: solid; background-color:white; ">
			<a href="http://www.comune.vignola.mo.it"><img src="../img/vignola_white_logo.png" class="vignolaLogo" style="float: right;"></a>
			<a href="http://www.istitutolevi.it"><img src="../img/logo_levi.png" class="leviLogo" align=left style="height:140px"></a>
		
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<?php 
			echo"<b>Benvenuto ".$_SESSION['n_classe']."</b>";
			?></div>
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
			</div>
		
		
		<div id="main1">
		
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
		<?PHP
			$class = $_SESSION['n_classe'];
			$sql1="SELECT COUNT(id) AS conteggio FROM proposte";
			$results=mysqli_query($con,$sql1);
			$values=mysqli_fetch_assoc($results);
			$I=$values['conteggio'];
			$I = $I + 1;
			
			echo "<table >";
			echo"<tr>";
					echo "<th>";
						echo "Classe";
					echo "</th>";
					echo "<th>";
						echo"Destinazione";
					echo "</th>";
					echo "<th>";
						echo"Docenti accompagnatori";
					echo "</th>";
					echo "<th>";
						echo"Docenti sostituti";
					echo "</th>";
					echo "<th>";
						echo"Periodo data";
					echo "</th>";
					echo "<th>";
						echo"Data C.d.C.";
					echo "</th>";
				echo "</tr>";
			for($A=1;$A<$I;$A++)
			{
				$sql = "SELECT * FROM `proposte` WHERE `id` = '$A'";
				$result = mysqli_query($con, $sql);
				$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
				if(!empty($row))
				{
				echo"<tr>";
					echo "<td>";
						echo $row['classe_name'];
					echo "</td>";
					echo "<td>";
						echo$row['meta'];
					echo "</td>";
					echo "<td>";
						echo$row['docenti_acc'];
					echo "</td>";
					echo "<td>";
						echo$row['docenti_sost'];
					echo "</td>";
					echo "<td>";
						echo$row['periodo_data'];
					echo "</td>";
					echo "<td>";
						echo$row['data_cdc'];
					echo "</td>";
				echo "</tr>";
				unset($row);
				}
				unset($row);
			}
			echo "</table>";
		?>
	</body>
</html>