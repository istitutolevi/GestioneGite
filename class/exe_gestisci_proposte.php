<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
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
	<link href="../style.css?v=<?php echo time();?>" rel="stylesheet" type="text/css">
	<link href="../styletopnav.css?v=<?php echo time();?>" rel="stylesheet" type="text/css">
	</head>
	<body class="background" onload="myFunction()">
	<div id="main" style="border-style: solid; background-color:white; ">
			<a href="http://www.comune.vignola.mo.it"><img class="leviLogo" src="../img/logo_levi.png" style="height: 140px;"></a>
			<a href="http://www.istitutolevi.it"><img class="vignolaLogo" src="../img/vignola_white_logo.png" align=right></a>
		</div>
		<div class="topnav">
		<a href="../class_home.php">Home </a>
		<a href="proposte.php">Manda proposta </a>
		<a href="compila_modulo.php">Compila modulo </a>
		<a href="stampa_modulo.php">Stampa modulo</a>
		<!--<a href="javascript:AlertIt();" ;>Gestisci modulo </a>-->
		<a href="gestisci_utente.php">Gestisci utente </a>
		<a href="gestisci_proposte.php">Gestisci proposte </a>
		<a href="compila_relazione.php">Compila relazione </a>
		<a href="contattaci.php">Contattaci </a>		
		<a href="../Log_out.php">Log Out </a>
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
			$action = $_POST['gender'];
			if($action == "mostra_proposte")
			{
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
					$sql = "SELECT * FROM `proposte` WHERE `classe_name` = '$class' AND `id` = '$A'";
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
			}
			else
				if($action == "mod_proposta")
				{
					$selected = $_POST['selected'];
					$array=explode(';',$selected);

					$array[0] = mysqli_real_escape_string($con,$array[0]);
					$array[1] = mysqli_real_escape_string($con,$array[1]);
					$array[2] = mysqli_real_escape_string($con,$array[2]);

					$sql = "SELECT * FROM `proposte` WHERE `classe_name` = '$class' AND `meta` = '$array[0]' AND `docenti_acc` = '$array[1]' AND `periodo_data` = '$array[2]' ";//completare


					$result = mysqli_query($con, $sql);
					$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
					
					$meta = $row['meta'];
					$doc_acc = $row['docenti_acc'];
					$doc_sost = $row['docenti_sost'];
					$obb = $row['obbiettivi'];
					$data = $row['periodo_data'];
					$data_cdc = $row['data_cdc'];
					$id = $row['id']; 
										
					
					echo"<form action=\"update_prop.php\" method=\"POST\">";
						echo"<div class=\"login\" style=\"background-color:white;\">";
							echo"<input type=\"hidden\" name=\"id\" value=\"$id\">";
							echo"<input type=\"text\" name=\"destinazione\" placeholder=\"destinazione\" value=\"$meta\" style=\"width:100%;\">";
							echo"<br>";
							echo"<br>";
							echo"<input type=\"text\" name=\"doc_acc\" placeholder=\"Inserisci i docenti accompagnatori separandoli con una virgola\" value=\"$doc_acc\" style=\"width:100%;\">";
							echo"<br>";
							echo"<br>";
							echo"<input type=\"text\" name=\"doc_sost\"  placeholder=\"Inserisci i docenti sostituti separandoli con una virgola\" value=\"$doc_sost\" style=\"width:100%;\">";
							echo"<br>";
							echo"<br>";
							echo"<textarea name=\"Obiettivi1\" placeholder=\"Obiettivi didattici\"  style=\"width:100%;\">$obb</textarea>";
							echo"<br>";
							echo"<br>";
							echo"<input type=\"text\" name=\"per_data\"  placeholder=\"Periodo Data\" value=\"$data\" style=\"width:100%;\">";
							echo"<br>";
							echo"<br>";	
							echo"<input type=\"text\" name=\"data_cdc\"  placeholder=\"Data odierna Consiglio di Classe\" value=\"$data_cdc\" style=\"width:100%;\">";
							echo"<br>";
							echo"<br>";
							echo"<input type=\"submit\" class=\"button buttonh button1\" value=\"Invia\" style=\"width:100%; height:50px;\">";
							echo"<br>";
							echo"<br>";
							echo"<a style=\"color:red; font-size:12px;\">*Per inserire nuove proposte inviare e ritornare su proposte</a>";
						echo"</div>";
					echo"</form>";
				}
				else
					if($action == "del_proposta")
					{
						try{
						$selected = $_POST['selected'];
						$array=explode(';',$selected);

						$sql = "DELETE FROM `proposte` WHERE `classe_name` = '$class' AND `meta` = '$array[0]' AND `docenti_acc` = '$array[1]' AND `periodo_data` = '$array[2]' ";
						$result = mysqli_query($con, $sql);
						//header("Location: ../class_home.php");
						}
						catch(Exception $e){

							echo "<p>errore nella cancellazione della proposta</p>";
							
						}
						echo "
						<div class='login'>
							<form action='../class_home.php'>
							<h1>proposta cancellata correttamente</h1>
								<input type='submit' value='home'>
							</form>
						</div>";
					}
		?>
	</body>
</html>