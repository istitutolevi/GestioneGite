<?php
			include ('session_admin.php');
            include ('script.php3');
            
            if(isset($_POST['Elimina']))
	        {
               
                $host = "localhost";  
                $username = "root";  
                $password = "";  
                $database = "sito_gite_db";  
                $message = "";  
                try  
                {  

                     $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
                     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                     $query = "DROP TABLE sito_gite_db.proposte;";
                     $connect->exec($query); 
                    echo '<script type="text/javascript"> 
                    alert(" Proposte eliminate ") 
                    
                    </script>'; 

                }
                catch(PDOException $error){

                    $message = $error->getMessage();  

                }

	        }
			
		?>

<html>
	<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

		<title>
			Elimina Proposte
		</title>
	</head>
	<link href="../style.css" rel="stylesheet" type="text/css">
	<link href="../styletopnav.css" rel="stylesheet" type="text/css">
	<body class="background" onload="myFunction()">
		<div id="main" style="border-style: solid; background-color:white; ">
			<a href="http://www.comune.vignola.mo.it"><img src="../img/vignola_white_logo.png" class="vignolaLogo" style="float: right;"></a>
			<a href="http://www.istitutolevi.it"><img src="../img/logo_levi.png" class="leviLogo" align=left style="height:140px"></a>
		
		<div id = "mySidenav" class = "sidenav">
			<a href = "javascript:void(0)" class = "closebtn" onclick = "closeNav()">&times;</a>
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
		
		<form action="exe_svuota_proposte.php" method="post"> 
			<div class="login" style="background-color:white;">
			<h1 align="center" style="color:black">Elimina Proposte</h1>
			
			<div>			
				<input type="submit" class="button buttonh1 button1" style="width:100%; height:50px; border-color:black;" value="Elimina" name="Elimina">
			</div>
			</div>	
		</form>
	</body>
</html>