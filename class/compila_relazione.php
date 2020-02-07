<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<?php
		include('../session.php');
	?>
	<style>
		body {
			font-family: "Lato", sans-serif;
			overflow: auto !important;
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
			padding: 0px !important;
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

		.divModulo{
			
				left: 50%;
				transform: translate(-50%);
				top: 30px;
				width: 793px;
				background-color: white;
				position: relative;
				padding: 15px;
				border-radius: 10px;
				margin-bottom: 50px;
		}

		.login{

				background-color: white;
				/* float: left; */
				position: relative;
				width: 793;
				padding: 15px;
				border-radius: 10px;
				top: 30px;
				margin-top:0px !important;
		}
		#stampaModulo{

			margin-bottom: 40px;
    margin-top: 30px;
    position: relative;
    width: 10%;
    height: 50px;
    left: 50% !important;
    transform: translate(-50%);
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
			
		<script>
			$( document ).ready(function() {
				$("#iniztxtarea").hide();
				$("input:radio[name='iniziativa']").change(function(){  
				if(this.value == 'b' && this.checked || this.value == 'c' && this.checked){
					$("#iniztxtarea").show();
				}else{
						$("#iniztxtarea").hide();
						$("#iniztxtarea").val("");
				}
				});
			});
			
			$( document ).ready(function() {
				$("#obbtxtarea").hide();
				$("input:radio[name='obb']").change(function(){  
				if(this.value == 'c' && this.checked){
					$("#obbtxtarea").show();
				}else{
						$("#obbtxtarea").hide();
						$("#obbtxtarea").val("");
				}
				});
			});
			
			$( document ).ready(function() {
				$("#comptxtarea").hide();
				$("input:radio[name='comp']").change(function(){  
				if(this.value == 'c' && this.checked){
					$("#comptxtarea").show();
				}else{
						$("#comptxtarea").hide();
						$("#comptxtarea").val("");
				}
				});
			});
			
			$( document ).ready(function() {
				$("#comptxtarea1").hide();
				$("input:radio[name='comp']").change(function(){  
				if(this.value == 'c' && this.checked){
					$("#comptxtarea1").show();
				}else{
						$("#comptxtarea1").hide();
						$("#comptxtarea1").val("");
				}
				});
			});
			
			$( document ).ready(function() {
				$("#gradtxtarea").hide();
				$("input:radio[name='grad']").change(function(){  
				if(this.value == 'c' && this.checked || this.value == 'd' && this.checked){
					$("#gradtxtarea").show();
				}else{
						$("#gradtxtarea").hide();
						$("#gradtxtarea").val("");
				}
				});
			});
			
			/*$('select').on('change', function() {
			  $("#prova").attr("value", "ciao");
			});*/
			
			$(document).ready(function(){ /* PREPARE THE SCRIPT */
			$("#selected").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
			var id = $(this).val(); /* GET THE VALUE OF THE SELECTED DATA */
			var data = 'id='+ id;
			  

			    $.ajax({ /* THEN THE AJAX CALL */
				type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
				url: "get-data.php", /* PAGE WHERE WE WILL PASS THE DATA */
				data: data, /* THE DATA WE WILL BE PASSING */
				success: function(result){ /* GET THE TO BE RETURNED DATA */
				  $("#show").html(result); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
				}
			  });

			});
		  });
		</script>
	</head>
	<?php
			$n_classe=$_SESSION['n_classe'];
			$today = date("d.m.y");
			
			$sql = "SET @count = 0";
			mysqli_query($con,$sql);
			$sql = "UPDATE `gita_definitiva` SET `gita_definitiva`.`id` = @count:= @count + 1";
			mysqli_query($con,$sql);
			$sql= "SELECT COUNT(*)AS total FROM gita_definitiva";
			$results=mysqli_query($con,$sql);
			$values=mysqli_fetch_assoc($results);
			$I=$values['total'];
			$I=$I+1;
		?>
		<link href="../styletopnav.css" rel="stylesheet" type="text/css">
		<link href="../style.css" rel="stylesheet" type="text/css">
	<body class="background" onload="myFunction()">
		<div id="main" style="border-style: solid; background-color:white; height:90px; ">
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
		
	
		
		
		
		 
		<form action="exe_compila_relazione.php" method="post">
		<div class="login">
			<h1 align="center" style="color:black">Compila relazione</h1>
			<?php
				echo"<br>";
				echo"<a style='font-size: x-small; font-weight: bold'>Meta, Data Gita, Docente Responsabile</a>";
				echo"<select name=\"selected\" id=\"selected\" style=width:100%>";
				echo"<option value=\"\">seleziona una gita</option>";
				$utente=$_SESSION['n_classe'];
				

				
				$sqlquery ="SELECT * FROM gita_definitiva WHERE classe='$utente'";

				$result = mysqli_query($con, $sqlquery);
				$row= mysqli_fetch_array($result, MYSQLI_ASSOC);

				${'n1' . 'a'} = $row['meta'];
				${'n2' . 'a'} = $row['data_gita'];
				${'n3' . 'a'} = $row['doc_resp'];
				${'n4' . 'a'} = $row['id'];
				
				if($n1a == $p && $n2a == $g && $n3a == $f && $n4a == $h)
				{
					unset($n1a);
					unset($n2a);
					unset($n3a);
					unset($n4a);
				}
				else
				{

				if( !empty($n1a) && !empty($n2a) && !empty($n3a)   )
				{
					echo "<option     value='" . $n4a ."' >" . $n1a .", ".$n2a.", " .$n3a. "</option>";
					$p = $n1a;
					$g = $n2a;
					$f = $n3a;
					$h = $n4a;
				}
				}
				
			
			echo"</select>";
			?>


			</div>
			<div class ="divModulo"> <!--1122px      -->
				
					<div id="show">
			  <table border="1" style="width:100%;font-size:13px;">
				<tr>
					<td>
						Classe/i <input type="text"  name="classe"> 
					</td>
				</tr>
				<tr>
					<td>
						Visita guidata/Viaggio d' istruzione a:  <input id="prova"  type="text" name="destinazione"> <label style="float:right"> del:  <input type="text" name="data"></label> 
					</td>
				</tr>
				<tr>
					<td>
						Docente referente: <input type="text" name="doc_ref">
					</td>
				</tr>
				<tr>
					<td>
						Docenti accompagnatori: <input type="text" name="doc_acc">
					</td>
				</tr>
			</table>
				</div>
				<table border="1" style="width:100%;height:700px;font-size:13px ;">
					<tr>
						<td>
							Realizzazione dell'iniziativa:
							<br>
							<input type="radio" name="iniziativa" checked="checked" value="a"/> secondo le previsioni 
							<br>
							<input type="radio" name="iniziativa" value="b"/> parzialmente realizzata (motivare)
							<br>
							<input type="radio" name="iniziativa"  value="c"/> non realizzata (motivare)
							<br>
							<textarea style="width:100%;" id="iniztxtarea" name="iniz_txtarea"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Risultati conseguiti in relazione agli obiettivi prefissati:
							<br>
							<input type="radio" name="obb" checked="checked" value="a"/>risultati ottenuti secondo gli obiettivi prefissati
							<br>
							<input type="radio" name="obb" value="b"/>risultati parzialmente ottenuti
							<br>
							<input type="radio" name="obb" value="c"/>risultati non ottenuti (motivare nelle osservazioni)
						</td>
					</tr>
					<tr>
						<td>
							Osservazioni:<textarea style="width:100%" id="obbtxtarea" name="osservazioni"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Comportamento generale degli alunni:
							<br>
							<input type="radio" name="comp" checked="checked" value="a"/>Buono
							<br>
							<input type="radio" name="comp" value="b"/>discreto, qualche interperanza
							<br>
							<input type="radio" name="comp" value="c"/>non sufficiente (motivare)
							<br>
							<textarea id="comptxtarea" style="width:100%" name="comp_textarea"></textarea>
							Alunni da segnalare per un comportamento scorretto (motivare):
							<br>
							<textarea id="comptxtarea1" style="width:100%" name="segnala_alunni"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Segnalazioni positive in relazione ai luoghi, alla sistemazione, al servizio fornito da agenzie, ditte di trasporto... 
							<textarea style="width:100%" name="segnalazioni_pos_textarea"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Segnalazioni negative in relazione ai luoghi, alla sistemazione, al servizio fornito da agenzie, ditte di trasporto... 
							<textarea style="width:100%" name="segnalazioni_neg_textarea"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Valutazioni generali:
							<textarea style="width:100%" name="valutazioni_textarea"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Eventuali disservizi:
							<textarea style="width:100%" name="disservizi_textarea"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Gradimento da parte dei destinatari:
							<br>
							<input type="radio" name="grad" checked="checked" value="a"/>Buono
							<br>
							<input type="radio" name="grad" value="b"/>discreto
							<br>
							<input type="radio" name="grad" value="c"/>sufficiente (motivare nelle osservazioni)
							<br>
							<input type="radio" name="grad" value="d"/>non gradito (motivare nelle osservazioni)
						</td>
					</tr>
					<tr>
						<td>
							Osservazioni:<textarea style="width:100%;" id="gradtxtarea" name="osservazioni_textarea"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Firma
							<br>
							____________________
						</td>
					</tr>
				</table>
			</div>

			
			<input type="submit" id="stampaModulo" class="button buttonh button1" value="scarica modulo">
		</form>
	</body>
</html>