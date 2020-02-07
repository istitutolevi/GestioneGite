<?php
include("loginserv.php");

if(isset($_POST['registration']))
	{
		header("Location: sign_in.php");

	}

?>
 
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8"> 
		<title>
			Login
		</title>
	</head>
	<link href="style.css?v=<?php echo time();?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<link href="styletopnav.css?v=<?php echo time();?>" rel="stylesheet" type="text/css">
	<body class="background">
			<a href="http://www.comune.vignola.mo.it"><img src="img/vignola_white_logo.png" class="vignolaLogo" style="float: right;"></a>
			<a href="http://www.istitutolevi.it"><img src="img/logo_levi.png" class="leviLogo" align=left style="height:140px"></a>
		</div>
		<br>
		<br>
		<div class="login" style="background-color:#2b2a2a;">
			<p align="center" style="color:#fff;text-transform:uppercase;" >Login</p>
			<form action="" method="post" style="text-align:center;">
				<input  type="text" class="inputLogin" placeholder="Username" id="class_name" name="class_name"><br/><br/>
				<input type="password" class="inputLogin" placeholder="Password" id="password" name="password"><br/><br/>
				<!--<a href="sign_in.php">Non possiedi ancora un account?</a><br/><br/>
				<a href="recuperapsw.html">Hai dimenticato la password?</a><br/><br/>-->
				<input type="submit" class="button buttonh button1" style="width:104%;  height:50px; border-color:black;" value="LOGIN" name="submit">
				<span><?php echo $error; ?></span>
			</form>
		</div>
	</body>
</html>