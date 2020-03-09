<html>
	<head>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="../style2020.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../bootstrap.min.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <?php
		    include('../session.php');
	    ?>
			
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

    <body class="cmodulo-body" onload="myFunction()" >
        <a href="http://www.comune.vignola.mo.it"><img src="../img/vignola_white_logo.png" class="vignolaLogo"></a>
        <a href="http://www.istitutolevi.it"><img src="../img/logo_levi.png" class="leviLogo" align=left></a>

        <header class="header-section">
            <nav class="header-nav">
                <ul class="main-menu">
                    <li><a href = "../class_home.php" class="active">HOME</a></li>
                    <li><a href = "proposte.php">MANDA PROPOSTA</a></li>
                    <li><a href = "compila_modulo.php">COMPILA MODULO</a></li>
                    <li><a href = "stampa_modulo.php">STAMPA MODULO</a></li>
                    <li><a href = "gestisci_utente.php">GESTISCI UTENTE</a></li>
                    <li><a href = "gestisci_proposte.php">GESTISCI PROPOSTE</a></li>
                    <li><a href = "compila_relazione.php">COMPILA RELAZIONE</a></li>
                    <li><a href = "contattaci.php">CONTATTACI</a></li>
                    <li><a href = "../Log_out.php">LOGOUT</a></li>
                </ul>
            </nav>
        </header>
		 
		<form action="exe_compila_relazione.php" method="post" class="crelazione-form">
		    <div class="crelazione1">
			    <h1>COMPILA RELAZIONE</h1>

                <?php
				echo"<br>";
				echo"<a>Meta, Data Gita, Docente Responsabile</a>";
				echo"<select name=\"selected\" id=\"selected\">";
				echo"<option value=\"\">Seleziona una gita</option>";

				$utente=$_SESSION['n_classe'];
				$sqlquery ="SELECT * FROM gita_definitiva WHERE classe='$utente'";
				$result = mysqli_query($con, $sqlquery);
				$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
				$n1a = $row['meta'];
				$n2a = $row['data_gita'];
				$n3a = $row['doc_resp'];
				$n4a = $row['id'];
				
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
			<div class ="crelazione2"> <!--1122px      -->
                <table>
                    <tr>
                        <td>
                            Classe/i <input type="text"  name="classe">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Visita guidata/Viaggio d' istruzione a:  <input id="prova"  type="text" name="destinazione"> <label> del:  <input type="text" name="data"></label>
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
                <br>
				<table>
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
							<textarea  id="iniztxtarea" name="iniz_txtarea"></textarea>
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
							Osservazioni:<textarea id="obbtxtarea" name="osservazioni"></textarea>
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
							<textarea id="comptxtarea" name="comp_textarea"></textarea>
							Alunni da segnalare per un comportamento scorretto (motivare):
							<br>
							<textarea id="comptxtarea1" name="segnala_alunni"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Segnalazioni positive in relazione ai luoghi, alla sistemazione, al servizio fornito da agenzie, ditte di trasporto... 
							<textarea name="segnalazioni_pos_textarea"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Segnalazioni negative in relazione ai luoghi, alla sistemazione, al servizio fornito da agenzie, ditte di trasporto... 
							<textarea name="segnalazioni_neg_textarea"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Valutazioni generali:
							<textarea name="valutazioni_textarea"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Eventuali disservizi:
							<textarea name="disservizi_textarea"></textarea>
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
							Osservazioni:<textarea id="gradtxtarea" name="osservazioni_textarea"></textarea>
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

			<input type="submit" id="stampaModulo" class="crelazione-btn base-btn" value="Scarica modulo">
		</form>
	</body>
</html>