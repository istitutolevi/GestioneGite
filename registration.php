<html>
	<body>
		<?php
		include('conn_serv.php');
							
				$Classe		= $_POST['Classe'];
				$Indirizzo	= $_POST['indirizzo'];
				$Password	= $_POST['Password'];
				$RPassword	= $_POST['RPassword'];
				$N_stud		= $_POST['N_stud'];
				$Email		= $_POST['Email'];
				$sql = "SELECT * FROM users ";

				$result = mysqli_query($con, $sql);
				$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
				$rows = mysqli_num_rows($result); 
				
				while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){
					
				if($Classe == $row['class_name']){

					
					echo '<script>
					var answer = confirm("E già stata inserita una classe con questo nome");
					if (answer)
					window.location.replace("sign_in.php");
					else
					window.location.replace("sign_in.php");</script>' ;
					
				
				}
				else if(/*strlen($Password) <=6*/false ){
					echo '<script>
					var answer = confirm("La password deve essere più lunga di 6 caratteri");
					if (answer)
					window.location.replace("sign_in.php");
					else
					window.location.replace("sign_in.php");</script>' ;


				}

				}

			
				if($Password != $RPassword || empty($Password) || empty($RPassword))
				{
					echo("Hai inserito delle password non valide o che non coincidono.");
					echo("<br>");
					echo"<a href=sign_in.php>Torna alla registrazione</a>";
				}
				
				{
					if(empty($Classe))
					{
						echo("hai lasciato dei campi vuoti");
						echo("<br>");
						echo"<a href=sign_in.php>Torna alla registrazione</a>";
					}
					else
					{
						include('conn_serv.php');
						echo"connessione avvenuta con successo";
						echo("<br>");
						$sql= "INSERT INTO `users` (`id`, `class_name`, `password`, `Num_studenti`, `email`, `Indirizzo`) VALUES (NULL, '$Classe', MD5('$Password'), '$N_stud', '$Email', '$Indirizzo')";
						if (($con->query($sql))) 
						{
							echo "La classe è stata già registrata";
							echo("<br>");
							echo"<a href=sign_in.php>Torna alla registrazione</a>";
							header("Location: admin_home.php");
						}
					}
				}
			
		?>
	</body>
</html>