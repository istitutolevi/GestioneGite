<?php
		// header("Location: index.php");
		include("session_admin.php");
	?>
<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<title>
			Registrazione
		</title>
	</head>
	
	<link href="style.css" rel="stylesheet" type="text/css">
	<body style="background-color:#2b2a2a;">
		<form action="registration.php" method="POST">
		<div style="border-style: solid; background-color:white; ">
			<a href="http://www.comune.vignola.mo.it"><img src="img/vignola_white_logo.png" class="vignolaLogo" style="float: right;"></a>
			<a href="http://www.istitutolevi.it"><img src="img/logo_levi.png" class="leviLogo" align=left style="height:140px"></a>
		</div>
		<br>
		<br>
			<div class="login" style="background-color:white;">
					<H1 align="center">
						Registrati
					</H1>
					<br/><br/>
					<input type="text" name="Classe" autofocus style="width:100%; height:30px;" placeholder="Classe*" tabindex="1" required>
					<br/><br/>
					<input type="text" name="Email" style="width:100%; height:30px;" placeholder="Email*" tabindex="2" required>
					<br/><br/>
					<input type="text" name="N_stud" style="width:100%; height:30px;" placeholder="Numero studenti della classe*" tabindex="3" required>
					<br/><br/>
					<select name="indirizzo" style="width:100%;">
						<option value="ITT">	ITT		</option>
						<option value="IPSC">	IPSC	</option>
						<option value="LSSA">	LSSA	</option>
						<option value="IPIA">	IPIA	</option>
					</select>
					<br/><br/>
					<input type="password" name="Password" style="width:100%; height:30px;" placeholder="Password*" tabindex="4" required>
					<br/><br/>
					<input type="password" name="RPassword" style="width:100%; height:30px;" placeholder="Ripeti password*" tabindex="5" required>
					<br/><br/>
					<p style="color:red; font: 12px Verdana, Arial;">*=campi obbligatori</p>
					<br/><br/>
					<input type="submit" class="button buttonh button1" value="Registrati" style="width:49%; height:50px; float:left; border-color:black;" tabindex="6">
					</form>
					
					
					
				
		
	</body>
	
</html>