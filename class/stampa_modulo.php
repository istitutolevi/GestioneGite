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
    <title>Stampa Modulo</title>
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
                    <a class="nav-link active" href="stampa_modulo.php">STAMPA MODULO</a>
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
                <form class="form-container mt-5" id="stampa-modulo" action="exe_stampa_modulo_definitivo.php"
                      method="POST">
                    <div class="form-group">
                        <h1 class="text-center">Stampa Modulo</h1>
                        <br>

                        <?php
                        $sql = "SET @count = 0";
                        mysqli_query($con, $sql);
                        $sql = "UPDATE `gita_definitiva` SET `gita_definitiva`.`id` = @count:= @count + 1";
                        mysqli_query($con, $sql);
                        $sql = "SELECT COUNT(*)AS total FROM gita_definitiva";
                        $results = mysqli_query($con, $sql);
                        $values = mysqli_fetch_assoc($results);
                        $I = $values['total'];
                        $I = $I + 1;

                        echo "<br>";
                        echo "<a>Meta, Data Gita, Docente Responsabile</a>";
                        echo "<select class=\"form-control\" name=\"selected\">";
                        echo "<option value=\"\" disabled selected>Seleziona gita</option>";

                        $utente = $_SESSION['n_classe'];
                        $p = "";
                        $g = "";
                        $f = "";
                        for ($A = 0; $A < $I; $A++) {
                            $sqlquery = "SELECT * FROM gita_definitiva WHERE id='$A' AND classe='$utente'";
                            $result = mysqli_query($con, $sqlquery);
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $n1a = $row['meta'];
                            $n2a = $row['data_gita'];
                            $n3a = $row['doc_resp'];

                            if ($n1a == $p && $n2a == $g and $n3a == $f) {
                                unset($n1a);
                                unset($n2a);
                                unset($n3a);
                            } else {

                                if (!empty($n1a) && !empty($n2a) && !empty($n3a)) {
                                    echo "<option     value='" . $n1a . "||" . $n2a . "||" . $n3a . "' >" . $n1a . ", " . $n2a . ", " . $n3a . "</option>";
                                    $p = $n1a;
                                    $g = $n2a;
                                    $f = $n3a;
                                }
                            }
                        }

                        echo "</select>";
                        echo "<br>";
                        ?>

                        <input type="submit" class="btn btn-outline-dark btn-lg btn-block mb-1" value="Stampa">

                        <?php
                        $percorsoWordProposte = $utente . '.docx';
                        if (file_exists($percorsoWordProposte)) {
                            echo '<br>';
                            $Fname = $utente . ".docx";
                            echo '<a href="' . $utente . '.docx" >SCARICA IL WORD </a>';
                        } else {
                            echo '<br>';
                            echo '<br>';
                            echo '<a>PRIMA CLICCA STAMPA PER PRODURRE IL WORD </a>';
                        }
                        ?>
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