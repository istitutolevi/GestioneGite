<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/stile.css">
    <link rel="stylesheet" href="../bootstrap.min.css" type="text/css">
    <script src="../conn_serv.php"></script>
    <script src="../vendor/jquery/jquery.slim.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <?php
    include('../session_class.php');
    $utente = $_SESSION['n_classe'];
    $today = date("d.m.y");
    ?>

    <title>Manda Proposta</title>
</head>

<body class="bg">
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
                    <a class="nav-link active" href="proposte.php">MANDA PROPOSTA</a>
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
                <form class="form-container mt-5" id="gestione-proposte" action="exe_proposte.php"
                      method="POST">
                    <div class="form-group">
                        <h1 class="text-center">Manda Proposta</h1>
                        <br>
                        <input type="text" class="form-control" name="destinazione" placeholder="Destinazione">
                        <br>
                        <input type="text" class="form-control" name="doc_acc"
                               placeholder="Inserisci i docenti accompagnatori separandoli con una virgola">
                        <br>
                        <input type="text" class="form-control" name="doc_sost"
                               placeholder="Inserisci i docenti sostituti separandoli con una virgola">
                        <br>
                        <textarea name="Obiettivi1" class="form-control"
                                  placeholder="Obiettivi didattici"></textarea>
                        <br>
                        <input type="text" name="per_data" class="form-control" placeholder="Periodo Data">
                        <br>
                        <input type="text" name="data_cdc" id="cur_data" class="form-control"
                               placeholder="Data odierna Consiglio di Classe">
                        <br>
                        <input type="submit" id="invia" class="btn btn-outline-dark btn-lg btn-block mb-1"
                               value="INVIA">
                        <br>
                        <a class="text-danger">*Per inserire nuove proposte inviare e ritornare su proposte</a>
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