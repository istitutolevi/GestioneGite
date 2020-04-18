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
    <title>Gestisci Password</title>
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

<script type="text/javascript">
    function updated() {
        var e = document.createElement('div');
        e.innerHTML = "Password aggiornata con successo!";
        e.setAttribute("class", "successNotification");
        document.getElementsByTagName("body")[0].appendChild(e);
    }

    function failed(x) {
        console.log(x);
        var e = document.createElement('div');
        e.innerHTML = x;
        e.setAttribute("class", "failNotification");
        document.getElementsByTagName("body")[0].appendChild(e);
    }
</script>

<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <section class="row justify-content-center">
                <form class="form-container mt-5" id="stampa-modulo" action="exe_gestisci_utente.php" method="POST">
                    <div class="form-group">
                        <h1 class="text-center">Gestisci Password</h1>
                        <br>
                        <?php
                        //handlo la notifica dell'update password
                        if (isset($_SESSION["passwordUpdate"])) {
                            if ($_SESSION["passwordUpdate"] == "wrong")
                                echo "<script> failed('password sbagliata'); </script>";
                            else if ($_SESSION["passwordUpdate"] == "noMatch")
                                echo "<script> failed('nuove password diverse'); </script>";
                            else if ($_SESSION["passwordUpdate"] == "tooShort")
                                echo "<script> failed('password troppo corta'); </script>";
                            else
                                echo "<script> updated(); </script>";
                            unset($_SESSION["passwordUpdate"]);
                        }

                        $utente = $_SESSION['n_classe'];
                        $sql = "SELECT * FROM users WHERE class_name='$utente'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $Email = $row['Email'];
                        $n_stud = $row['Num_studenti'];

                        echo "Password attuale";
                        echo "<input type=\"password\" class='form-control' name=\"oldPassword\" value=\"\" required>";
                        echo "<br>";
                        echo "Nuova password";
                        echo "<input type=\"password\" class='form-control' name=\"newPassword\" value=\"\" required>";
                        echo "<br>";
                        echo "Ripeti nuova password";
                        echo "<input type=\"password\" class='form-control' name=\"newPassword2\" value=\"\" required>";
                        echo "<br>";
                        echo "<br>";
                        ?>
                        <input type="submit" class="btn btn-outline-dark btn-lg btn-block mb-1"
                               value="aggiorna password">
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