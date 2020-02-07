<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<?php
			include('session_admin.php');
			include ('../conn_serv.php');
		?>
		<title>
			gestione utenti
		</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<style>
		.login{
			width:360px;
			margin:50px auto;
			font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
			border-radius:10px;
			border:2px solid #ccc;
			padding:10px 40px 25px;
			margin-top:50px; 
			}
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
		input[type=text], input[type=password], textarea{
		width:99%;
		padding:10px;
		margin-top:8px;
		border:1px solid #ccc;
		padding-left:5px;
		font-size:16px;
		font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
		}
		 select{
		width:50%;
		padding:10px;
		margin-top:8px;
		border:1px solid #ccc;
		padding-left:5px;
		font-size:16px;
		font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
		}
		</style>
	</head>
	<link href="../style.css" rel="stylesheet" type="text/css">
	<link href="../styletopnav.css" rel="stylesheet" type="text/css">
	<body class="background">
	<div id="main" style="border-style: solid; background-color:white; ">
			<a href="http://www.comune.vignola.mo.it"><img src="../img/vignola_white_logo.png" class="vignolaLogo" style="float: right;"></a>
			<a href="http://www.istitutolevi.it"><img src="../img/logo_levi.png" class="leviLogo" align=left style="height:140px"></a>
		
	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <?php 
		echo"<b>Benvenuto ".$_SESSION['n_classe']."</b>";
	  ?>
	  
	</div>
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
		
		
		$( document ).ready(function() {
				$("#textbox1").hide();
				$("#textbox2").hide();
				$("input:radio[name='gestione_account']").change(function(){  
				if(this.value == 'Change_User_Password' && this.checked){
					$("#textbox1").show();
					$("#textbox2").show();
				}else{
						$("#textbox1").hide();
						$("#textbox2").hide();
				}
				});
			});

	</script>
		<div class="login" style="background-color:white;">
			<form action="exe_cmd.php" method="POST">
				<h1 align="center" style="color:black">Gestione account</h1>
				<?php
					$db = mysqli_select_db($con, "users");
					$sql = "SET @count = 0";
					mysqli_query($con,$sql);
					$sql = "UPDATE `users` SET `users`.`id` = @count:= @count + 1";
					mysqli_query($con,$sql);
					$sql= "SELECT COUNT(tipo)AS total FROM users";
					$results=mysqli_query($con,$sql);
					$values=mysqli_fetch_assoc($results);
					$I=$values['total'];
					$I=$I+1;
					echo"seleziona l'account:";
					echo"<select name=\"selected\" style=width:150px>";
					for($A=0;$A<$I;$A++)
					{
						$sqlquery ="SELECT class_name FROM users WHERE id='$A'"; 
						$result = mysqli_query($con, $sqlquery);
						$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
						$n= $row['class_name'];
						if(!empty($n))
						{	
							echo "<option value='" . $row['class_name'] . "'>" . $row['class_name'] . "</option>";
						}
					}
					echo"</select>";
					echo "<br>";
					echo "<br>";
					echo "seleziona l'azione da compiere:";
					echo "<br>";
					echo "<br>";
					echo"<input type=\"radio\" name=\"gestione_account\" value=\"User_become_admin\"> Nomina Utente Amministratore<br>";
					echo "<br>";
					echo"<input type=\"radio\" name=\"gestione_account\" value=\"User_become_class\"> Nomina utente classe<br>";
					echo "<br>";
					echo"<input type=\"radio\" name=\"gestione_account\" value=\"Delete_User\"> Elimina Utente<br>";
					echo "<br>";
					echo ("<input type=\"radio\" name=\"gestione_account\" id=\"radio\" value=\"Change_User_Password\"> Cambia password utente<br>");
					echo ("<input type=\"text\" name=\"pass1\" placeholder=\"Nuova Password\" id=\"textbox1\">"); 
					echo ("<br>");
					echo ("<input type=\"text\" name=\"pass2\" placeholder=\"Ripeti nuova password\" id=\"textbox2\">");
					
				?>
				<br>
				<br>
				<input type="submit" class="button buttonh button1" style="width:100%; height:50px;border-color:black;" value="Esegui"  >
			</form>
		</div>
	</body>
</html>