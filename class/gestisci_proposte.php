<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<?php
			include('session_class.php');
			$n_classe=$_SESSION['n_classe'];
		?>
		<title>
			Gestisci Proposte
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
		
		
		table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
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

		.topnav{

			top:5px;
		}

	</style>
	</head>
	<link href="../style.css" rel="stylesheet" type="text/css">
	<link href="../styletopnav.css" rel="stylesheet" type="text/css">
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
		<form action="exe_gestisci_proposte.php" method="POST">
			<div class="login" style="background-color:white;">
			<h1 align="center" style="color:black">Gestisci proposte</h1>
        <?php


			// $sql = "SET @count = 0";
			// mysqli_query($con,$sql);
			// $sql = "UPDATE `proposte` SET `proposte`.`id` = @count:= @count + 1";
			// mysqli_query($con,$sql);
			// $sql= "SELECT COUNT(*)AS total FROM proposte";
			// $results=mysqli_query($con,$sql);
			// $values=mysqli_fetch_assoc($results);
			// $I=$values['total'];
			
			?>
			
			 <br>
			<p style='font-size: x-small; font-weight: bold'>Meta, docenti accompagnatori, Data gita</p>
			<select name="selected" style=width:100%>
			
			<?php
		


			$utente=$_SESSION['n_classe'];

				 $sqlquery ="SELECT * FROM proposte WHERE classe_name='$utente'";
				 $result = mysqli_query($con, $sqlquery);


				 while($row = mysqli_fetch_assoc($result)){
				 
					${'n1' . 'a'} = $row['meta'];
					${'n2' . 'a'} = $row['docenti_acc'];
					${'n3' . 'a'} = $row['periodo_data'];
					
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
			<input type="radio" name="gender" value="mostra_proposte"> Mostra le tue Proposte<br>
			<input type="radio" name="gender" value="mod_proposta"> Modifica la Proposta selezionata<br>
			<input type="radio" name="gender" value="del_proposta"> Elimina la proposta selezionata<br>
			<br>
            <input type="submit" class="button buttonh button1" style="width:100%; height:50px; border-color:black;">
        </div>
    </div>	
		</form>
	</body>
</html>