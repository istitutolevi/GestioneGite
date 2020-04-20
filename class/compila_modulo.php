<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Benvenuto!</title>
    <link rel="stylesheet" href="../css/stile.css">
    <link rel="stylesheet" href="../bootstrap.min.css" type="text/css">
    <script src="../conn_serv.php"></script>
    <script src="../vendor/jquery/jquery.slim.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <?php
    include('../session_class.php');
    $utente = $_SESSION['n_classe'];
    $today = date("d.m.y");
    ?>
    <title>Compila Modulo</title>
</head>

<body class="bg" onload="myFunction()">
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <?php
            echo "<h1>Benvenuto, $utente!</h1>"
            ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse dropdown" id="navbarResponsive">
            <ul class="navbar-nav ml-5">
                <li class="nav-item">
                    <a class="nav-link" href="../class_home.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="proposte.php">MANDA PROPOSTA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="compila_modulo.php">COMPILA MODULO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="stampa_modulo.php">STAMPA MODULO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestisci_utente.php">GESTISCI UTENTE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestisci_proposte.php">GESTISCI PROPOSTE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="compila_relazione.php">COMPILA RELAZIONE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contattaci.php">CONTATTACI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Log_out.php">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <section class="row justify-content-center">
                <form class="form-container mt-5" id="compila-modulo" action="exe_compila_modulo.php" method="POST">
                    <div class="form-group">
                        <h1 class="text-center">Compila Modulo</h1>
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

                        <h6 class="text-center">Autorizzazioni uscita didattica, visita o viaggio di istruzione </h6>
                        <br>
                        <a class="text-center">Data di compilazione del modulo:</a>
                        <fieldset>
                            <input type="date" class="form-control" name="data_odierna" id="cur1_data" tabindex="1"
                                   required autofocus>
                        </fieldset>
                        <br>
                        <a>Classe:</a>
                        <fieldset>
                            <input type="text" class="form-control" name="class_name" id="cdc" tabindex="1"
                                   value="<?= $login_session; ?>" required autofocus>
                        </fieldset>
                        <br>
                        <a>Data del consiglio:</a>
                        <fieldset>
                            <input type="date" class="form-control" name="data_consiglio" id="cur_data" tabindex="2"
                                   required>
                        </fieldset>
                        <br>
                        <a>Meta del viaggio d'istruzione:</a>
                        <fieldset>
                            <input type="text" class="form-control" name="destinazione" id="meta" tabindex="3" required>
                        </fieldset>
                        <br>
                        <a>Data del viaggio d'istruzione:</a>
                        <fieldset>
                            <input type="date" class="form-control" name="data_gita" id="gitadata" tabindex="4"
                                   required>
                        </fieldset>
                        <br>
                        <a>Orario partenza:</a>
                        <fieldset>
                            <input type="time" class="form-control" name="ora_par" tabindex="5" required>
                        </fieldset>
                        <br>
                        <a>Orario arrivo:</a>
                        <fieldset>
                            <input type="time" class="form-control" name="ora_arr" tabindex="6" required>
                        </fieldset>
                        <br>
                        <a>Mezzo di trasporto:</a>
                        <select class="form-control" name="mezzo" required>
                            <option value="" selected></option>
                            <option value="Autobus">Autobus pubblico</option>
                            <option value="Autobus privato">Autobus privato</option>
                            <option value="Treno">Treno</option>
                            <option value="A piedi">A piedi</option>
                        </select>
                        <br>
                        <a>Docente responsabile:</a>
                        <fieldset>
                            <input type="text" class="form-control" name="doc_resp" id="resp" id="name-data"
                                   tabindex="7" required autofocus>
                        </fieldset>
                        <br>
                        <a>Classe:</a>
                        <fieldset>
                            <input type="text" class="form-control" name="class" tabindex="8"
                                   value="<?= $login_session; ?>" required autofocus>
                        </fieldset>
                        <br>
                        <a>Numero di alunni frequentanti:</a>
                        <fieldset>
                            <input type="number" class="form-control" name="n_alunni" id="nal" min="0" tabindex="9"
                                   required autofocus>
                        </fieldset>
                        <br>
                        <a>2/3 del totale:</a>
                        <fieldset>
                            <input type="text" class="form-control" name="div_t" id="dt" tabindex="10" readonly
                                   autofocus>
                        </fieldset>
                        <br>
                        <a>Numero di alunni partecipanti:</a>
                        <fieldset>
                            <input type="number" class="form-control" name="al_p" min="0" tabindex="11" required
                                   autofocus>
                        </fieldset>
                        <br>
                        <a>Docente accompagnatore:</a>
                        <fieldset>
                            <input type="text" class="form-control" name="doc_acc" id="docapp" tabindex="12" required
                                   autofocus>
                        </fieldset>
                        <br>

                        <div class="table-responsive">
                            <table id="table-a" class="table table-light table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="w-50">
                                        INSEGNANTE
                                    </th>
                                    <th scope="col" class="w-50">
                                        DOCENTE SOSTITUTO
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <input scope="row" class="form-control" type="text" name="ins[]" required>
                                    </td>
                                    <td>
                                        <input scope="row" class="form-control" type="text" name="sost[]" required>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <br>
                        <input type="button" id="addrow-table" value="Aggiungi Riga"
                               class="btn btn-outline-dark btn-lg btn-block mb-1">
                        <br>
                        <br>
                        <h1 class="text-center">ITINERARIO</h1>
                        <br>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-light table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="w-50">Data</th>
                                    <th scope="col" class="w-50">Ora</th>
                                    <th scope="col" class="w-50">Descrizione</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <input scope="row" class="form-control" type="date" id="descdata"
                                               name="datIt[]"/>
                                    </td>
                                    <td>
                                        <input scope="row" class="form-control" type="time" name="ora[]"
                                               class="form-control"/>
                                    </td>
                                    <td>
                                        <input scope="row" class="form-control" type="text" name="descrizione[]"
                                               class="form-control desc"/>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <input type="button" id="addrow" value="Aggiungi Riga"
                               class="btn btn-outline-dark btn-lg btn-block mb-1"/>
                        <br>
                        <br>
                        <fieldset>
                            <input name="submit" type="submit" id="contact-submit" value="Invia modulo"
                                   class="btn btn-outline-dark btn-lg btn-block mb-1">
                        </fieldset>


                        <script>
                            $("#docapp").on("change", function () {
                                var da = $("#docapp").val();
                                var respo = $("#resp").val();
                                if (da.search(respo) != -1) {
                                    alert("Non puoi inserire il responsabile negli accompagnatori");
                                }
                            });
                            $("#nal").on("change", function () {
                                var a = $("#nal").val();
                                var b = Math.ceil((parseInt(a) / 3) * 2);
                                $("#dt").val(b);

                            });
                            $("#addrow-table").on("click", function () {
                                var newRow = $("<tr>");
                                var cols = "";

                                cols += '<td><input scope=\"row\" class=\"form-control\" type=\"text\" name=\"ins[]\" ></td>';
                                cols += '<td><input scope=\"row\" class=\"form-control\" type=\"text\" name=\"sost[]\" ></td>';
                                cols += '<td><input scope=\"row\" class=\"form-control btn btn-danger\" type=\"button\" value=\"Elimina\"></td>';
                                newRow.append(cols);
                                $("#table-a").append(newRow);
                                counter++;
                            });
                            $("#table-a").on("click", ".btn-danger", function (event) {
                                $(this).closest("tr").remove();
                                counter -= 1
                            });

                            $(document).ready(function () {
                                var counter = 0;
                                $("#addrow").on("click", function () {
                                    var newRow = $("<tr>");
                                    var cols = "";
                                    var text = $("#gitadata").val();
                                    cols += '<td><input type=\"date\" scope=\"row\" class=\"form-control\" name="datIt[]" value="' + text + '"/></td>';
                                    cols += '<td><input type=\"time\" scope=\"row\" class=\"form-control\" name="ora[]"/></td>';
                                    cols += '<td><input type=\"text\" scope=\"row\" class=\"form-control\" name="descrizione[]"/></td>';
                                    cols += '<td><input type=\"button\" scope=\"row\" class=\"form-control btn btn-danger\" value=\"Elimina\"></td>';
                                    newRow.append(cols);
                                    $("#myTable").append(newRow);
                                    counter++;
                                });
                                $("#myTable").on("click", ".btn-danger", function (event) {
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

                            $("#gitadata").change(function () {
                                var text = $("#gitadata").val();
                                $("#descdata").val(text);
                            });
                        </script>

                </form>

            </section>

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>

</body>
</html>