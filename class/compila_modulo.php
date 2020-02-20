<html>

<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="../style2020.css" rel="stylesheet" type="text/css">
	<style>

		*, ::after, ::before {
			box-sizing: initial !important;
		}
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

		.sidenav a:hover,
		.offcanvas a:focus {
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
			padding: 16px;
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
			.sidenav {
				padding-top: 15px;
			}

			.sidenav a {
				font-size: 18px;
			}
		}


		body {
			background-size: cover;
			background-repeat: no-repeat;
		}

		.modulo {

			width: 793px;
			height: 100%;
			background-color: white;
			/* float: right; */
			position: relative;
			left: 50%;
			transform: translate(-50%);
			padding: 15px;
			border-radius: 15px;
			margin-top: 40px;
		}

		.itinerario {

			position: relative;
			height: 100px;
			border-radius:0px;
			margin-top: 0px !important;
			max-width: 793px;
			min-width: 793px;
			min-height: 100px;
		}

		.divItinerario {

			margin-bottom:100px;
		}

		input.inviaModulo {}

		.button {
			cursor: pointer;
			left:50%;
			transform:translate(-50%);
			height:30px;
			width: 120px;
			position:relative;
			margin-top:10px;
		}

		.buttonh:hover {
			background-color: #4CAF50;
			/* Green */
			color: white;
		}


		.button1 {
			background-color: white;
			color: black;
			border: 2px solid #4CAF50;
			/* Green */
		}

		.addRow{

			background-color: #d0d0d0 !important;
			width: 150px !important;
			left: 50%;
			position: relative;
			transform: translate(-50%);
			padding: 5px !important;
			height:35px;
		}


		form input[type="text"], form input[type="time"]{
			margin-bottom: 2px;
			padding: 0 !important;
			padding-left: 10px !important;
		}

	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
			include('session_class.php');
			$n_classe=$_SESSION['n_classe'];
			$today = date("d.m.y");
		?>

<body class="background" onload="myFunction()" style="background-image: url('../img/background.png');">
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


	<script>
		function myFunction() {
			var now = new Date();
			var day = ("0" + now.getDate()).slice(-2);
			var month = ("0" + (now.getMonth() + 1)).slice(-2);
			var today = (day) + "-" + (month) + "-" + now.getFullYear();

			document.getElementById("cur_data").value = today;
			document.getElementById("cur1_data").value = today;
		}
	</script>
	

	<form action="exe_compila_modulo.php" method="post">

		<div class="modulo">
			<!--1122px      -->
			<img src="../img/Intestazione_scuola.png" style="width:100%">
			<br>
			Prot. __________
			<div style="float:right">
				Vignola <input type="text" name="data_odierna" id="cur1_data">
			</div>
			<br>
			<br>
			<div align="center">
				<strong>Autorizzazioni uscita didattica, visita o viaggio di istruzione</strong>
			</div>
			<br>
			Il consiglio della classe
			<?php echo "<input type=\"text\" name=\"class_name\" id=\"cdc\" value=$login_session style=\"width:155px\" readonly>";?>
			in data <input type="date" name="data_consiglio" style="width:165px" id="cur_data" required><br> ha deliberato la seguente visita di istruzione:<br>
			Meta <input type="text" name="destinazione" id="meta" required>
			Data <input type="date" name="data_gita" id="gitadata" required><br>
			Orario partenza: <input type="time" name="ora_par" required></br>
			Orario arrivo: <input type="time" name="ora_arr"required>

			<br>

			Mezzo di trasporto:
			<select name="mezzo" required>
				<option value="" selected></option>
				<option value="Autobus">Autobus pubblico</option>
				<option value="Autobus privato">Autobus privato</option>
				<option value="Treno">Treno</option>
				<option value="A piedi">A piedi</option>
			</select>

			<br>
			Docente responsabile: <input id="resp" type="text" name="doc_resp" id="name-data" required>
			<br>
			<br>
			<table border="1" style="width:100%">
				<tr>
					<td>
						Classe
					</td>
					<td>
						N. alunni frequentanti:
					</td>
					<td>
						2/3 del totale:
					</td>
					<td>
						N. alunni partecipanti:
					</td>
				</tr>
					<tr>
						<td>
						 <input type="text" name="class" style="width:92%" value="<?=$login_session;?>" readonly>
						 </td>
						<td>
						 <input id="nal" type="number" name="n_alunni" style="width:92%" required>
						 </td>
						<td>
						 <input id="dt" type="number" name="div_t" style="width:92%" readonly>
						 </td>
						<td>
						 <input type="number" name="al_p" style="width:92%" required>
						</td>
					</tr>
			</table>
			<?php
			/*
			<br>
			Totale studenti partecipanti: <input type="text" name="n_stud" required>
			*/
			?>
			<br>
			Docenti accompagnatori: <input id="docapp" type="text" name="doc_acc" required><span style="color:red">*Non inserire nuovamente il docente responsabile</span>
			<br>
			<br>
			Gli insegnanti sottoscritti si impegnano a accompagnare gli studenti delle classi sotto elencate, assumendo la
			responsabilita della vigilanza secondo le norme vigenti:
			<br>
			<br>
			<table border="1" style="width:100%" id="table-a">
				<tr>
					<td>
						INSEGNANTE
					</td>
					<td>
						FIRMA INSEGNANTE
					</td>
					<td>
						DOCENTE SOSTITUTO
					</td>
					<td>
						FIRMA SOSTITUTO
					</td>
				</tr>

						<tr>
						<td>
						 <input type="text" name="ins[]" style="width:92%"required>
						 </td>
						<td>
						<a style="width:100%"></a><input type="text" name="fir_ins[]" style="width:92%"readonly>
						 </td>
						<td>
						 <input type="text" name="sost[]" style="width:92%"required>
						 </td>
						<td>
						<a style="width:100%"></a><input type="text" name="fir_sost[]" style="width:92%"readonly>
						 </td>
						</tr>
						<tr>
						<td>
						 <input type="text" name="ins[]" style="width:92%"required>
						 </td>
						<td>
						<a style="width:100%"></a><input type="text" name="fir_ins[]" style="width:92%"readonly>
						 </td>
						<td>
						 <input type="text" name="sost[]" style="width:92%"required>
						 </td>
						<td>
						<a style="width:100%"></a><input type="text" name="fir_sost[]" style="width:92%"readonly>
						 </td>
						</tr>
			</table>


				<input type="button" class="btn btn-lg btn-block addRow" id="addrow-table" value="Aggiungi Riga" style="margin:20px;"/>

			<script>
			$("#docapp").on("change", function() {
				var da = $("#docapp").val();
				var respo = $("#resp").val();
				if(da.search(respo) != -1 ) {
					alert ("Non puoi inserire il responsabile negli accompagnatori");
				}
			});
				$("#nal").on("change", function () {
						var a = $("#nal").val();
						var b = Math.ceil((parseInt(a)/3)*2);
						$("#dt").val(b);
						
				});
				$("#nal").on("change", function () {
						var a = $("#nal").val();
						var b = Math.ceil((parseInt(a)/3)*2);
						$("#dt").val(b);
						
				});
				$("#addrow-table").on("click", function () {
					var newRow = $("<tr>");
					var cols = "";

					cols += '<td><input type=\"text\" name=\"ins[]\" style=\"width:92%;\"></td>';
					cols += '<td><input type=\"text\" name=\"fir_ins[]\" style=\"width:92%\"></td>';
					cols += '<td><input type=\"text\" name=\"sost[]\" style=\"width:92%\"></td>';
					cols += '<td><input type=\"text\" name=\"fir_sost[]\" style=\"width:92%\"></td>';

					cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger " value="Delete" style="margin-left:20px;border-top:none;"></td>';
					newRow.append(cols);
					$("#table-a").append(newRow);
					counter++;
				});

				$("#table-a").on("click", ".ibtnDel", function (event) {
		        $(this).closest("tr").remove();
		        counter -= 1
		    });
			</script>

			<br>
			Firma del docente responsabile
			<div style="float:right">
				Il Dirigente Sclastico
			</div>
			<br>
			_________________________
			<div style="float:right">
				Dott. Stefania Giovanetti
			</div>
		<br>
		<br>
		</div>

		</table>
		<div class="divItinerario modulo">
			 <!--<textarea class="itinerario modulo "
				placeholder="Inserire l'itinerario della gita. N.B. ogni punto dovrà essere preceduto da - (meno)"
				name="itinerario"></textarea>-->
				<h2 style="left: 3%; position:relative;">Itinerario</h2>
				<div class="container">
    <table id="myTable" class=" table order-list">
    <thead>
        <tr>
            <td>data</td>
            <td>ora</td>
            <td>descrizione</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td >
                <input type="date" id="descdata" name="datIt[]" />
            </td>
            <td>
                <input type="time" name="ora[]" class="form-control" />
            </td>
            <td>
                <input type="text" name="descrizione[]"  class="form-control desc"/>
            </td>
            <td><a class="deleteRow"></a>

            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn btn-lg btn-block addRow" id="addrow" value="Aggiungi Riga" />
            </td>
        </tr>
        <tr>
        </tr>
    </tfoot>
</table>
</div>

		</div>
		</div>
		<input type="submit" value="Invia Modulo" class="button1 button buttonh btn  btn-success" style="top:-70px;height:50px;width:200px;">

	</form>

	<script>
	$(document).ready(function () {
    var counter = 0;
	
    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";
        var text = $("#gitadata").val();
cols += '<td><input type="date"  name="datIt[]" value="'+text+ '"/></td>';
        cols += '<td><input type="time" class="form-control" name="ora[]"/></td>';
        cols += '<td><input type="text" class="form-control desc" name="descrizione[]"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
$("#gitadata").change(function(){
  var text = $("#gitadata").val();
  $("#descdata").val( text );

});


	</script>
</body>

</html>