<html>
<?php
$jump = 1; // 1 = disabilitato 0 = abilitato
if ($jump == 0)
{
	$e1=$_POST['email'];
	$e2=$_POST['emailC'];
	if($e1 == $e2)
	{
		$Mail=$e1;
		if(empty($Mail))
		{
			$error = "hai dimenticato: "."\n";
			if(empty($Mail))
			{
				$error = $error . "la mail ";
			}
			echo "$error";
		}
		
		else
		{
			$subject = "Recupero password";
			$message = "Salve "."\n"."clicca sul link per recuperare la tua password.";
			$headers = "From: no-reply@progetto_scuola.it" . "\r\n" .
			"X-Mailer: PHP/" . phpversion();

			mail($Mail, $subject, $message, $headers);

			echo "Messaggio inviato con successo a ".$Nome." ".$Cognome.".";
			header("Location: index.php");
		}
	}
	else
		echo"le email non corriscondono"; 	
}
else
{
	header("Location: index.php");
}
?>
</html>