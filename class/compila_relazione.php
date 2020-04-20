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

    <?php
    include('../session_class.php');
    $utente = $_SESSION['n_classe'];
    $today = date("d.m.y");
    $sql = "SET @count = 0";
    mysqli_query($con, $sql);
    $sql = "UPDATE `gita_definitiva` SET `gita_definitiva`.`id` = @count:= @count + 1";
    mysqli_query($con, $sql);
    $sql = "SELECT COUNT(*)AS total FROM gita_definitiva";
    $results = mysqli_query($con, $sql);
    $values = mysqli_fetch_assoc($results);
    $I = $values['total'];
    $I = $I + 1;
    ?>
    <title>Compila Relazione</title>
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
                    <a class="nav-link" href="compila_modulo.php">COMPILA MODULO</a>
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
                    <a class="nav-link active" href="compila_relazione.php">COMPILA RELAZIONE</a>
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
                <form class="form-container mt-5" id="compila-modulo" action="exe_compila_relazione.php" method="POST">
                    <div class="form-group">
                        <h1 class="text-center">Compila Relazione</h1>
                        <br>
                        <?php
                        echo "<br>";
                        echo "<a>Meta, Data Gita, Docente Responsabile</a>";
                        echo "<select name=\"selected\" class='form-control' id=\"selected\">";
                        echo "<option value=\"\">Seleziona una gita</option>";

                        $utente = $_SESSION['n_classe'];
                        $sqlquery = "SELECT * FROM gita_definitiva WHERE classe='$utente'";
                        $result = mysqli_query($con, $sqlquery);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $n1a = $row['meta'];
                        $n2a = $row['data_gita'];
                        $n3a = $row['doc_resp'];
                        $n4a = $row['id'];

                        if ($n1a == $p && $n2a == $g && $n3a == $f && $n4a == $h) {
                            unset($n1a);
                            unset($n2a);
                            unset($n3a);
                            unset($n4a);
                        } else {
                            if (!empty($n1a) && !empty($n2a) && !empty($n3a)) {
                                echo "<option     value='" . $n4a . "' >" . $n1a . ", " . $n2a . ", " . $n3a . "</option>";
                                $p = $n1a;
                                $g = $n2a;
                                $f = $n3a;
                                $h = $n4a;
                            }
                        }
                        echo "</select>";
                        ?>
                        <br>
                        <div class="table-responsive">
                            <table class='table table-light table-bordered table-hover'>
                                <tr>
                                    <td scope="row">
                                        Classe/i <input type="text" class="form-control" name="classe"
                                                        placeholder="Inserisci le classi separate da una virgola">
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        Visita guidata/Viaggio d' istruzione a: <input id="prova" type="text"
                                                                                       class="form-control"
                                                                                       name="destinazione">
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        del: <input type="text" class="form-control" name="data">
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        Docente referente: <input type="text" class="form-control" name="doc_ref">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Docenti accompagnatori: <input type="text" class="form-control" name="doc_acc"
                                                                       placeholder="Inserisci i docenti accompagnatori separati da una virgola">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class='table table-light table-bordered table-hover'>
                                <tr>
                                    <td scope="row">
                                        Realizzazione dell'iniziativa:
                                        <br>
                                        <br>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="iniziativa" id="Radios1"
                                                   value="a" checked>
                                            <label class="form-check-label" for="Radios1">
                                                Secondo le previsioni
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="iniziativa" id="Radios2"
                                                   value="b">
                                            <label class="form-check-label" for="Radios2">
                                                Parzialmente realizzata (motivare)
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="iniziativa" id="Radios3"
                                                   value="c">
                                            <label class="form-check-label" for="Radios3">
                                                Non realizzata (motivare)
                                            </label>
                                        </div>
                                        <br>
                                        <textarea id="iniztxtarea" class="form-control" name="iniz_txtarea"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        Risultati conseguiti in relazione agli obiettivi prefissati:
                                        <br>
                                        <br>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="obb" id="Radios1"
                                                   value="a" checked>
                                            <label class="form-check-label" for="Radios1">
                                                Risultati ottenuti secondo gli obiettivi prefissati
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="obb" id="Radios2"
                                                   value="b">
                                            <label class="form-check-label" for="Radios2">
                                                Risultati parzialmente ottenuti
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="obb" id="Radios3"
                                                   value="c">
                                            <label class="form-check-label" for="Radios3">
                                                Risultati non ottenuti (motivare nelle osservazioni)
                                            </label>
                                        </div>
                                        <br>
                                        Osservazioni:<textarea id="obbtxtarea" class="form-control"
                                                               name="osservazioni"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        Comportamento generale degli alunni:
                                        <br>
                                        <br>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="comp" id="Radios1"
                                                   value="a" checked>
                                            <label class="form-check-label" for="Radios1">
                                                Buono
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="comp" id="Radios2"
                                                   value="b">
                                            <label class="form-check-label" for="Radios2">
                                                Discreto, qualche interperanza
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="comp" id="Radios3"
                                                   value="c">
                                            <label class="form-check-label" for="Radios3">
                                                Non sufficiente (motivare)
                                            </label>
                                        </div>
                                        <textarea id="comptxtarea" class="form-control"
                                                  name="comp_textareai"></textarea>
                                        <br>
                                        Alunni da segnalare per un comportamento scorretto (motivare):<textarea
                                                id="comptxtarea1" class="form-control" name="segnala_alunni"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        Segnalazioni positive in relazione ai luoghi, alla sistemazione, al servizio
                                        fornito da agenzie, ditte di trasporto...
                                        <textarea name="segnalazioni_pos_textarea" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        Segnalazioni negative in relazione ai luoghi, alla sistemazione, al servizio
                                        fornito da agenzie, ditte di trasporto...
                                        <textarea name="segnalazioni_neg_textarea" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        Valutazioni generali:
                                        <textarea name="valutazioni_textarea" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        Eventuali disservizi:
                                        <textarea name="disservizi_textarea" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        Gradimento da parte dei destinatari:
                                        <br>
                                        <br>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="grad" id="Radios1"
                                                   value="a" checked>
                                            <label class="form-check-label" for="Radios1">
                                                Buono
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="grad" id="Radios2"
                                                   value="b">
                                            <label class="form-check-label" for="Radios2">
                                                Discreto
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="grad" id="Radios3"
                                                   value="c">
                                            <label class="form-check-label" for="Radios3">
                                                Sufficiente (motivare nelle osservazioni)
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="grad" id="Radios4"
                                                   value="d">
                                            <label class="form-check-label" for="Radios4">
                                                Non gradito (motivare nelle osservazioni)
                                            </label>
                                        </div>
                                        Osservazioni:<textarea id="gradtxtarea" class="form-control"
                                                               name="osservazioni_textarea"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        Firma
                                        <br>
                                        <br>
                                        ____________________
                                    </td>
                                </tr>
                            </table>
                            <input type="submit" id="stampaModulo" class="btn btn-outline-dark btn-lg btn-block mb-1" value="Scarica modulo">
                        </div>
                    </div>
                </form>

            </section>


        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>

</body>
</html>