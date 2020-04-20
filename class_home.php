<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/stile.css">
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
    <script src="conn_serv.php"></script>
    <script src="vendor/jquery/jquery.slim.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <?php
    include('session_class.php');
    $utente = $_SESSION['n_classe'];
    array_map('unlink', glob("class/*.docx"));
    ?>

    <title>Benvenuto!</title>
</head>

<body class="body">
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
                <li class="nav-item active">
                    <a class="nav-link active" href="class_home.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="class/proposte.php">MANDA PROPOSTA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="class/compila_modulo.php">COMPILA MODULO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="class/stampa_modulo.php">STAMPA MODULO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="class/gestisci_utente.php">GESTISCI UTENTE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="class/gestisci_proposte.php">GESTISCI PROPOSTE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="class/compila_relazione.php">COMPILA RELAZIONE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="class/contattaci.php">CONTATTACI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Log_out.php">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>