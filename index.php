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
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
	<body class="body-background">
        <a href="http://www.comune.vignola.mo.it"><img src="img/vignola_white_logo.png" class="vignolaLogo"></a>
        <a href="http://www.istitutolevi.it"><img src="img/logo_levi.png" class="leviLogo" ></a>
		<br>
		<br>
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
                            <button class="base-btn" name="submit">Login</button>
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