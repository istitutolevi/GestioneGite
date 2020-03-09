<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="../style2020.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<?php
			include('session_class.php');
			$n_classe=$_SESSION['n_classe'];
			$today = date("d.m.y");
		?>

<body class="cmodulo-body" onload="myFunction()">

<a href="http://www.istitutolevi.it"><img src="../img/logo_levi.png" class="leviLogo"></a>
<a href="http://www.comune.vignola.mo.it"><img src="../img/vignola_white_logo.png" class="vignolaLogo"></a>

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


<div class="container">
    <form id="contact" action="exe_compila_modulo.php" method="post">
        <h3>Autorizzazioni uscita didattica, visita o viaggio di istruzione </h3>
        <br>
        <br>
        <a>Data di compilazione del modulo:</a>
        <fieldset>
            <input type="date" name="data_odierna" id="cur1_data" tabindex="1" required autofocus>
        </fieldset>
        <a>Classe:</a>
        <fieldset>
            <input type="text" name="class_name" id="cdc" tabindex="1" value="<?=$login_session;?>" required autofocus>
        </fieldset>
        <a>Data del consiglio:</a>
        <fieldset>
            <input type="date" name="data_consiglio" id="cur_data" tabindex="2" required>
        </fieldset>
        <a>Meta del viaggio d'istruzione:</a>
        <fieldset>
            <input type="text" name="destinazione" id="meta" tabindex="3" required>
        </fieldset>
        <a>Data del viaggio d'istruzione:</a>
        <fieldset>
            <input type="date" name="data_gita" id="gitadata" tabindex="4" required>
        </fieldset>
        <a>Orario partenza:</a>
        <fieldset>
            <input type="time" name="ora_par" tabindex="5" required>
        </fieldset>
        <a>Orario arrivo:</a>
        <fieldset>
            <input type="time" name="ora_arr" tabindex="6" required>
        </fieldset>
        <a>Mezzo di trasporto:</a>
        <select name="mezzo" required>
            <option value="" selected></option>
            <option value="Autobus">Autobus pubblico</option>
            <option value="Autobus privato">Autobus privato</option>
            <option value="Treno">Treno</option>
            <option value="A piedi">A piedi</option>
        </select>
        <a>Docente responsabile:</a>
        <fieldset>
            <input type="text" name="doc_resp" id="resp" id="name-data" tabindex="7" required autofocus>
        </fieldset>
        <a>Classe:</a>
        <fieldset>
            <input type="text" name="class" tabindex="8" value="<?=$login_session;?>" required autofocus>
        </fieldset>
        <a>Numero di alunni frequentanti:</a>
        <fieldset>
            <input type="number" name="n_alunni" id="nal" min="0" tabindex="9" required autofocus>
        </fieldset>
        <a>2/3 del totale:</a>
        <fieldset>
            <input type="text" name="div_t" id="dt" tabindex="10" readonly autofocus>
        </fieldset>
        <a>Numero di alunni partecipanti:</a>
        <fieldset>
            <input type="number" name="al_p" min="0" tabindex="11" required autofocus>
        </fieldset>
        <a>Docente accompagnatore:</a>
        <fieldset>
            <input type="text" name="doc_acc" id="docapp" tabindex="12" required autofocus>
        </fieldset>
        <br>
        <table id="table-a" class="cmodulo-table">
            <thead>
            <tr>
                <th>
                    INSEGNANTE
                </th>
                <th>
                    DOCENTE SOSTITUTO
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <input type="text" name="ins[]" required>
                </td>
                <td>
                    <input type="text" name="sost[]" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="ins[]" required>
                </td>
                <td>
                    <input type="text" name="sost[]" required>
                </td>
            </tr>
            </tbody>
        </table>
        <br>
        <input type="button" id="addrow-table" value="Aggiungi Riga" class="form-proposta-btn base-btn-black">
        <br>
        <br>
        <h3>ITINERARIO</h3>
        <br>
        <table id="myTable" class="table order-list">
            <thead>
            <tr>
                <td>Data</td>
                <td>Ora</td>
                <td>Descrizione</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <input type="date" id="descdata" name="datIt[]" />
                </td>
                <td>
                    <input type="time" name="ora[]" class="form-control" />
                </td>
                <td>
                    <input type="text" name="descrizione[]"  class="form-control desc"/>
                </td>
                <td>
                    <a class="deleteRow"></a>
                </td>
            </tr>
            </tbody>
        </table>
        <br>
        <input type="button" id="addrow" value="Aggiungi Riga" class="form-proposta-btn base-btn-black"/>
        <br>
        <br>
        <fieldset>
            <input name="submit" type="submit" id="contact-submit" value="Invia modulo" class="form-proposta-btn base-btn-black">
        </fieldset>

    </form>
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
        $("#addrow-table").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><input type=\"text\" name=\"ins[]\" ></td>';
            cols += '<td><input type=\"text\" name=\"sost[]\" ></td>';
            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger " value="Delete"></td>';
            newRow.append(cols);
            $("#table-a").append(newRow);
            counter++;
        });
        $("#table-a").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });

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


</div>
</body>

</html>