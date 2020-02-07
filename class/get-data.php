<?php
	include('../conn_serv.php');
	if(!empty($_POST["id"]))
	{
		$id = $_POST["id"];
		$sql = "SELECT * FROM `gita_definitiva` WHERE `id` = '$id'";
		$results=mysqli_query($con,$sql);
		$row= mysqli_fetch_array($results, MYSQLI_ASSOC);
		
		$classe = $row['classe'];
		$destinazione = $row['meta'];
		$data = $row['data_gita'];
		$doc_ref = $row['doc_resp'];
		$doc_acc = $row['doc_accom'];
		
		echo"<div id=\"tabella\">";
			echo"<table border=\"1\" style=\"width:100%;font-size:13px ;\">";
				echo"<tr>";
					echo"<td>";
						echo"Classe/i <input type=\"text\" value=\"$classe\" name=\"classe\">";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"Visita guidata/Viaggio d' istruzione a:  <input id=\"prova\" value=\"$destinazione\" type=\"text\" name=\"destinazione\"> <label style=\"float:right\"> del:  <input type=\"text\" value=\"$data\" name=\"data\"></label> ";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"Docente referente: <input type=\"text\" value=\"$doc_ref\" name=\"doc_ref\">";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"Docenti accompagnatori: <input type=\"text\" value=\"$doc_acc\" name=\"doc_acc\">";
					echo"</td>";
				echo"</tr>";
			echo"</table>";
		echo"</div>";
	}
	else
	{
	echo"<table border=\"1\" style=\"width:100%;font-size:13px ;\">";
				echo"<tr>";
					echo"<td>";
						echo"Classe/i <input type=\"text\"  name=\"classe\"> ";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"Visita guidata/Viaggio d' istruzione a:  <input id=\"prova\"  type=\"text\" name=\"destinazione\"> <label style=\"float:right\"> del:  <input type=\"text\" name=\"data\"></label> ";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"Docente referente: <input type=\"text\"  name=\"doc_ref\">";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"Docenti accompagnatori: <input type=\"text\"  name=\"doc_acc\">";
					echo"</td>";
				echo"</tr>";
			echo"</table>";
	}
?>