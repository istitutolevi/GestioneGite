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
    $today = date("d.m.y");
    ?>
    <title>Gestisci Utente</title>
</head>

<body class="bg">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
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
                    <a class="nav-link active" href="gestisci_utente.php">GESTISCI UTENTE</a>
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
                <form class="form-container mt-5" id="stampa-modulo" action="exe_gestisci_utente.php" method="POST">
                    <div class="form-group">
                        <h1 class="text-center">Gestisci Utente</h1>
                        <br>
                        <?php
                        $utente = $_SESSION['n_classe'];
                        $sql = "SELECT * FROM users WHERE class_name='$utente'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $Email = $row['Email'];
                        $n_stud = $row['Num_studenti'];

                        echo "Nome utente";
                        echo "<input type=\"text\" name=\"utente\" value=\"$utente\" class=\"form-control\">";
                        echo "<br>";
                        echo "Email";
                        echo "<input type=\"text\" name=\"email\" value=\"$Email\" class=\"form-control\">";
                        echo "<br>";
                        echo "Numero studenti";
                        echo "<input type=\"text\" name=\"n_stud\" value=\"$n_stud\" class=\"form-control\">";
                        echo "<br>";
                        ?>
                        <input type="submit" class="btn btn-outline-dark btn-lg btn-block mb-1" value="Aggiorna dati">
                        <br>
                        <br>
                        <a href="gestisci_password.php" class="text-decoration-none"> <input type="button"
                                                                                             class="btn btn-outline-dark btn-lg btn-block mb-1"
                                                                                             value="Gestisci password"/></a>
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