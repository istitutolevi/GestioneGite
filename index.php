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
        <link href="style2020.css" rel="stylesheet" type="text/css">
		<meta charset="UTF-8">

		<title>
			Login
		</title>
	</head>
	<link href="style.css?v=<?php echo time();?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
	<link href="styletopnav.css?v=<?php echo time();?>" rel="stylesheet" type="text/css">
	<body class="body-background">
        <a href="http://www.comune.vignola.mo.it"><img src="img/vignola_white_logo.png" class="vignolaLogo" style="float: right;"></a>
        <a href="http://www.istitutolevi.it"><img src="img/logo_levi.png" class="leviLogo" align=left style="height:140px"></a>
		<br>
		<br>
		<!--<div class="login" style="background-color: rgba(0,0,0,0.5);">
			<form action="" method="post" style="text-align:center;">
				<input  type="text" class="form-control form-control-lg" placeholder="Username" id="class_name" name="class_name" style="width:100%;"><br/>
				<input type="password" class="form-control form-control-lg" placeholder="Password" id="password" name="password" style="width:100%;"><br/>-->
				<!--<a href="sign_in.php">Non possiedi ancora un account?</a><br/><br/>
				<a href="recuperapsw.html">Hai dimenticato la password?</a><br/><br/>-->
				<!--<input type="submit" class="btn btn-success" style="width:100%;  height:45px; " value="LOGIN" name="submit">
				<span><?php echo $error; ?></span>
			</form>
		</div>-->

        <section class="login-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login-text">
                            <h2>Benvenuto!</h2>
                            <p>Inscerisci Username e Password negli appositi campi per effettuare il login. Per qualunque problema contattare l'indirizzo email viaggi@istitutolevi.edu.it</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form class="login-form" action="" method="post">
                            <input type="text" placeholder="Username" id="class_name" name="class_name">
                            <input type="password" placeholder="Password" id="password" name="password">
                            <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>-->
                            <button class="login-btn" name="submit">Login</button>
                            <br>
                            <br>
                            <span class="span"><?php echo $error; ?></span>
                        </form>
                    </div>
                </div>
            </div>
        </section>
	</body>
</html>