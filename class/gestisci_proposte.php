<!doctype html>
<html>
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
    ?>
    <title>Gestisci Proposte</title>
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
                    <a class="nav-link active" href="gestisci_proposte.php">GESTISCI PROPOSTE</a>
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
                <form class="form-container mt-5" id="stampa-modulo" action="exe_gestisci_proposte.php" method="POST">
                    <div class="form-group">
                        <h1 class="text-center">Gestisci Proposte</h1>
                        <br>
                        <a>Meta, docenti accompagnatori, Data gita</a>
                        <select name="selected" class="form-control">

                            <?php
                            $utente = $_SESSION['n_classe'];
                            $sqlquery = "SELECT * FROM proposte WHERE classe_name='$utente'";
                            $result = mysqli_query($con, $sqlquery);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $n1a = $row['meta'];
                                $n2a = $row['docenti_acc'];
                                $n3a = $row['periodo_data'];

                                if ($n1a == $p && $n2a == $g and $n3a == $f) {
                                    unset($n1a);
                                    unset($n2a);
                                    unset($n3a);
                                } else {
                                    if (!empty($n1a) && !empty($n2a) && !empty($n3a)) {
                                        echo "<option     value='" . $n1a . ";" . $n2a . ";" . $n3a . "' >" . $n1a . "; " . $n2a . "; " . $n3a . "</option>";
                                        $p = $n1a;
                                        $g = $n2a;
                                        $f = $n3a;
                                    }
                                }
                            }
                            echo "</select>";
                            echo "<br>";
                            echo "<br>";
                            ?>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="gender" id="Radios1"
                                       value="mostra_proposte" checked>
                                <label class="form-check-label" for="Radios1">
                                    Mostra le tue Proposte
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="gender" id="Radios2"
                                       value="mod_proposta">
                                <label class="form-check-label" for="Radios2">
                                    Modifica la Proposta selezionata
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="gender" id="Radios3"
                                       value="del_proposta">
                                <label class="form-check-label" for="Radios3">
                                    Elimina la proposta selezionata
                                </label>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-outline-dark btn-lg btn-block mb-1">

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